<?php

	header('Access-Control-Allow-Origin: *');

	session_start();

	require "./vendor/autoload.php";

	$client = new MongoDB\Client;

	$main_db = $client -> main_itec;

	$accounts = $main_db -> accounts;

	$products = $main_db -> products;

	$query = "";

	$data = "";

	$split_data_pattern = ";;;";

	$admin_account = "mr_admin@admin.com";

	if(isset($_GET['q'])) $query = $_GET['q'];

	if(isset($_POST['d'])) $data = explode($split_data_pattern, $_POST['d']);



	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



	function base64ToImage($base64_string, $output_file) {
	    $file = fopen($output_file, "wb");

	    $data = explode(',', $base64_string);

	    fwrite($file, base64_decode($data[1]));
	    fclose($file);

	    return $output_file;
}


	if($query == "yBuMKjnrVEeKN5Hf78zr")//register query
	{
		$account_type = $data[0];
		$email = $data[1];
		$firstname = $data[2];
		$lastname = $data[3];
		$phone_number = $data[4];
		$address = $data[5];
		$specific_type = $data[6];
		$password = $data[7];

		$password = hash('sha256', $password);

		//email_check
		$qry = $accounts -> findOne([
			'email' => $email 
		]);

		if(!isset($qry['_id']))
		{

			//echo "1";

			$specific_type_in_database = "account_type";
			if($account_type == "1") $specific_type_in_database = "selling_buyer_type";
			$accounts -> insertOne([
				'email' => $email,
				'firstname' => $firstname,
				'lastname' => $lastname,
				'phone_number' => $phone_number,
				'address' => $address,
				$specific_type_in_database => $specific_type,
				'account_status' => '0',
				'password' => $password,
				'auth_token' => '0'
			]);

		}
		else
		{
			echo "0";
		}


	}
	if($query == "dQZ9ryLPwLZJTyHOoKhK")//login query
	{
		$email = $data[0];
		$password = hash('sha256', $data[1]);

		$qry = $accounts -> findOne([
			'email' => $email 
		]);

		if(isset($qry['_id']))
		{
			if($qry['password'] == $password)
			{

				$auth_token = generateRandomString(30);

				$accounts->updateOne(
				    [ 'email' => $email ],
				    [ '$set' => [ 'auth_token' => $auth_token ]]
				);

				echo $auth_token;

			}
			else
			{
				echo "1";
			}
		}
		else
		{
			echo "0";
		}

		
	}
	if($query == "wE3f3iF31Ji1eBe91rh9")//create new product
	{
		$product_category = $data[0];
		$product_title = $data[1];
		$product_quantity = $data[2];
		$product_price = $data[3];
		$product_images = $data[4];
		$product_owner = $data[5];
		$product_description = $data[6];

		$qry = $accounts -> findOne([
			'auth_token' => $product_owner
		]);

		if(isset($qry['_id']))
		{
			if(isset($qry['selling_buyer_type']))
			{
				$images_in_base64_array = explode("#", $product_images);
				$images_to_database_array = "";
				for ($i=0; $i < sizeof($images_in_base64_array) - 1; $i++) { 
					$new_image_name = generateRandomString(30).".jpg";
					$new_image_name2 = "/var/www/html/product_images/".$new_image_name;
					base64ToImage($images_in_base64_array[$i],$new_image_name2);
					$images_to_database_array .= "./product_images/".$new_image_name.";" ;
				}
				$images_to_database_array = substr($images_to_database_array, 0, -1);
				$products -> insertOne([
					'posted_by' => $qry['email'],
					'product_category' => $product_category,
					'product_title' => $product_title,
					'product_quantity' => $product_quantity,
					'product_price' => $product_price,
					'product_images' => $images_to_database_array,
					'product_description' => $product_description,
					'product_target_market' => $qry['selling_buyer_type'],
					'product_owner_address' => $qry['address']
				]);
			}

		}


	}
	if($query == "EUYaObPjxWXwC7fbjERn")//display account type and the account type value
	{
		$auth_token = $data[0];
		$qry = $accounts = findOne([
			'auth_token' => $auth_token
		]);
		if(isset($qry['_id']))
		{
			if(isset($qry['account_type'])) echo "buyer"."//".$qry['account_type'];
			if(isset($qry['selling_buyer_type'])) echo "seller"."//".$qry['selling_buyer_type'];
		}
	}
	if($query == "lJpJRukjAo83WZgfGIQd")//search query
	{
		$auth_token = $data[0];
		$category = $data[1];
		$product_target_market = $data[2];
		$skip = intval($data[3]);
		$limit = intval($data[4]);
		$cursor = "";
		if($auth_token == "0")
		{

			$cursor = $products->find(
		    [
		        'product_category' => $category
		    ],
		    [
		        'limit' => $limit,
		        'skip' => $skip
		    ]
		);

			foreach ($cursor as $key) {
			$img_array = explode(";", $key['product_images']);
			$final_product_image = $img_array[0];
			echo $final_product_image.";;;".$key['product_title'].";;;".$key['product_description'].";;;".$key['_id'].";;;".$key['posted_by'].";;;".$key['product_owner_address']."###";
		}

		}
		else
		{
			$qry = $accounts -> findOne([
				'auth_token' => $auth_token
			]);
			//echo $qry['account_type'];
			if(isset($qry['account_type'])) $product_target_market = $qry['account_type'];
			$cursor = $products->find(
		    [
		        'product_category' => $category,
		        'product_target_market' => $product_target_market,
		    ],
		    [
		        'limit' => $limit,
		        'skip' => $skip
		    ]
		);

			foreach ($cursor as $key) {
			$img_array = explode(";", $key['product_images']);
			$final_product_image = $img_array[0];
			echo $final_product_image.";;;".$key['product_title'].";;;".$key['product_description'].";;;".$key['_id'].";;;".$key['posted_by'].";;;".$key['product_owner_address']."###";
		}

		}

	}

	if($query == "aawgmyLYDFSvn2Hrvmry")//product details query
	{
		$product_id = $data[0];
		$qry = $products -> findOne([
			'_id' => new MongoDB\BSON\ObjectID( $product_id )
		]);
		if(isset($qry['_id']))
		{
			$qry2 = $accounts -> findOne([
				'email' => $qry['posted_by']
			]);
			if(isset($qry2['_id']))
			{
				echo $qry['product_images'].";;;".$qry['product_title'].";;;".$qry['product_description'].";;;".$qry['_id'].";;;".$qry['posted_by'].";;;".$qry['product_owner_address'].";;;".$qry2['firstname'].";;;".$qry2['lastname'].";;;".$qry2['phone_number'].";;;".$qry['product_category'].";;;".$qry['product_quantity'].";;;".$qry['product_price'];
			}
		}
	}
	if($query == "3EDbmIXM7SAXp1WXCp61")//admin panel query for confirmation
	{
		$auth_token = $data[0];
		$target_email = $data[1];
		$qry = $accounts -> findOne([
			'auth_token' => $auth_token
		]);
		if(isset($qry['_id']))
		{
			if($qry['email'] == $admin_account)
			{
				$accounts->updateOne(
				    [ 'email' => $target_email ],
				    [ '$set' => [ 'account_status' => "1" ]]
				);

				echo "1";
			}
		}
	}
	if($query == "8CFzbwNCkq0yRGWGcOTT")//admin panel query for decline
	{
		$auth_token = $data[0];
		$target_email = $data[1];
		$qry = $accounts -> findOne([
			'auth_token' => $auth_token
		]);
		if(isset($qry['_id']))
		{
			if($qry['email'] == $admin_account)
			{
				$accounts->deleteOne(
				    [ 'email' => $target_email ]
				);

				echo "1";
			}
		}
	}
	if($query == "j91bLA4Twe21JNI7o3PB")//checking if buyer or seller
	{
		$auth_token = $data[0];
		$qry = $accounts -> findOne([
			"auth_token" => $auth_token
		]);
		if(isset($qry['email']))
		{
			if($qry['email'] == $admin_account) echo "admin";
			else
			{
				if($qry['account_status'] == "0") echo "not_confirmed";
				else if(isset($qry['account_type'])) echo "buyer";
				else if(isset($qry['selling_buyer_type'])) echo "seller";
			}
		}
	}
	if($query == "zHcLbjZQhN6fSKgD9cdb")//user details query
	{
		$auth_token = $data[0];
		$qry = $accounts -> findOne([
			'auth_token' => $auth_token
		]);
		if(isset($qry['_id']))
		{
			echo $qry['email'].";;;".$qry['firstname'].";;;".$qry['lastname'].";;;".$qry['phone_number'].";;;".$qry['address'];
		}
	}
	if($query == "oXiVkq4F4ZcxTUZUia1O")//get products by user query
	{
		$auth_token = $data[0];
		$qry = $accounts -> findOne([
			'auth_token' => $auth_token
		]);
		if(isset($qry['email']))
		{
			$qry2 = $products -> find(
			[
		        'posted_by' => $qry['email']
		    ]
			);
			foreach ($qry2 as $key) {
				echo $key['product_title'].";;;".$key['product_description'].";;;".$key['product_category']."###";
			}
		}
	}
	if($query == "2IwYvIhjGVnNb35ch7VZ")//display unconfirmed accounts query
	{
		$auth_token = $data[0];
		$skip = intval($data[1]);
		$limit = intval($data[2]);
		$qry = $accounts -> findOne([
			'auth_token' => $auth_token
		]);
		if(isset($qry['email'])) 
		{
			if($qry['email'] == $admin_account)
			{
				$qry2 = $accounts -> find(
			[
		        'account_status' => "0"
		    ],
		    [
		    	'skip' => $skip,
		    	'limit' => $limit
		    ]
			);

			foreach ($qry2 as $key) {
				echo $key['firstname'].";;;".$key['lastname'].";;;".$key['email'].";;;".$key['phone_number'].";;;".$key['address']."###";
			}

			}
		}
	}

	/*$accounts -> insertOne([
		'username' => 'test1',
		'firstname' => 'popescu',
		'lastname' => 'andrei',
		'account_type' => '0'
	]);*/



	

?>