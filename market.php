<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Fresh Corner</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Paper CSS -->
  <!-- <link rel="stylesheet" href="https://unpkg.com/papercss@1.6.1/dist/paper.min.css"> -->

  <!-- Custom styles for this template -->
  <link href="css/one-page-wonder.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANhILrWgqKfpB7ZurCUun4Dlxl9hzP2pU&callback=initMap" type="text/javascript"></script>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
      <a class="navbar-brand" href="market.php">Fresh Corner</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">SALE</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Statistics
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Best Product</a>
              <a class="dropdown-item" href="#">Best Seller</a>
              <a class="dropdown-item" href="#">Best Deals</a>
            </div>
          </li>
        </ul>
        <form class="mx-2 my-auto d-inline" style="width:75% !important">
            <div class="input-group">
                <input type="text" class="form-control border border-right-0" placeholder="Search...">
                <span class="input-group-append">
                    <button class="btn btn-outline-secondary border border-left-0" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- IF USER IS NOT AUTHENTIFICATED -->
        <!-- <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">LogIn</a>
          </li>
        </ul> -->

        <!-- IF USER IS AUTHENTIFICATED -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" id="special_icon">
            <script>
            var TOP = 0;
            var TYPE = "";
            var cook = document.cookie.split('auth_token=')[1];
            var param = cook;
            var tipp = '';
            var my_url = 'http://52.47.147.159/api_main.php?q='+'j91bLA4Twe21JNI7o3PB'
            $.ajax({
            type: 'POST',
            url: my_url,
            data : {d:param},
            success: function(data){
              // alert(data);
              if(data == ""){
                console.log("NU E BUN");
                document.location.replace('./error.php');
              }
              else{
                tipp = data;
                console.log(tipp);
                if (tipp == "buyer"){
                  var icon_to_display = '<a class="nav-link " href="order_history.php"><img src="img/cart.png" style="width:40px"> </a>';
                  document.getElementById('special_icon').innerHTML = icon_to_display;
                }
                else if(tipp == "seller"){
                  console.log("AICI");
                  var icon_to_display = '<a class="nav-link " href="upload.php"><img src="img/plus.png" style="width:40px"> </a>';
                  document.getElementById('special_icon').innerHTML = icon_to_display;
                }
                else if(tipp == "admin"){
                  window.location.replace('./8937c03999a4b1ad6777ff23e4a0c39c/admin/index.html');
                }
                else if(tipp == "not_confirmed"){
                  alert("This account is not confirmed yet.");
                  document.location.replace('./index.php');
                }
              }
            }
            });
            </script>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="profiledropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><img src="img/user.png" style="width:40px"> </a>
            <div class="dropdown-menu" aria-labelledby="profiledropdown">
              <a class="dropdown-item" href="profile.php">Profile</a>
              <a class="dropdown-item" onclick="logout()">Logout</a>
              <script>
                function logout(){
                  document.cookie = "auth_token=0"
                  document.location.replace('./index.php');
                }
              </script>
            </div>
          </li>
        </ul>
      </div>
  </nav>

  <header class="market-header text-white">
        <div class="row">
          <div class="col-lg-2 category-box" style="background-image:url('img/categories/01.jpg'); background-size:cover;" onclick="sort_items(1)">
            <ul id="market-category-list">
              <li><h2>Legume</h2></li>
              <li><img src="img/categories/01.png"></li>
            </ul>
          </div>
          <div class="col-lg-2 category-box" style="background-image:url('img/categories/02.jpg'); background-size:cover;" onclick="sort_items(2)">
            <ul id="market-category-list">
              <li><h2>Fructe</h2></li>
                <li><img src="img/categories/02.png"></li>
            </ul>
          </div>
          <div class="col-lg-2 category-box" style="background-image:url('img/categories/03.jpg'); background-size:cover;" onclick="sort_items(3)">
            <ul id="market-category-list">
              <li><h2>Carne</h2></li>
                <li><img src="img/categories/03.png"></li>
            </ul>
          </div>
          <div class="col-lg-2 category-box" style="background-image:url('img/categories/04.jpg'); background-size:cover;" onclick="sort_items(4)">
            <ul id="market-category-list">
              <li><h2>Miere</h2></li>
              <li><img src="img/categories/04.png"></li>
            </ul>
          </div>
          <div class="col-lg-2 category-box" style="background-image:url('img/categories/05.jpg'); background-size:cover;" onclick="sort_items(5)">
            <ul id="market-category-list">
              <li><h2>HAndMade</h2></li>
              <li><img src="img/categories/05.png"></li>
            </ul>
          </div>
          <div class="col-lg-2 category-box" style="background-image:url('img/categories/06.jpg'); background-size:cover;" onclick="sort_items(6)">
            <ul id="market-category-list">
              <li><h2>Other</h2></li>
              <li><img src="img/categories/06.png"></li>
            </ul>
          </div>
        </div>
    <!-- <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div> -->
  </header>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <nav style="width:100%">
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active view-type" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><h5>Grid View</h5></a>
            <a class="nav-item nav-link view-type" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><h5>List View</h5></a>
            <a class="nav-item nav-link view-type" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><h5>Map View</h5></a>
          </div>
        </nav>
      </div>
      <br>
      <script>
      var map;
      function initMap() {
        // The location of Timisoara
        var pozitie = {lat: 45.7410432, lng: 21.1465505};
        map = new google.maps.Map(document.getElementById('map'), {zoom: 4, center: pozitie});
      }
      var all_coords = [];
      var post_loc = [];
      var all_names = [];
      function list_products(x,inc){

        function add_pin(x,y) {
          var myLatLng = x;

          var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: y
          });
          all_coords.push(marker);
        }

        var products = x.split('###');
        console.log(products);
        var rand = "";
        var linie = "";
        var card_c = 0;

          for(var j = 0; j < 3; j++){

            rand += '<div class="">';
            rand += '<div class="card-deck">';

            linie += '<ul class="list-group">';

            for(var i = 0; i < 3; i++){
                if(card_c == products.length-1){
                  rand += '<div class="col-lg-4"></div>';
                  break;
                }
                var tmp_prod = products[card_c].split(';;;');
                var pic_path = tmp_prod[0];
                var title = tmp_prod[1];
                var description = tmp_prod[2];
                var prod_id = tmp_prod[3];
                var location = tmp_prod[5];

                rand += '<div class="card col-lg-4">';
                rand += '<img class="card-img-top" src="'+pic_path+'" alt="Card image cap">';
                rand += '<div class="card-body">';
                rand += '<h5 class="card-title">'+title+'<small class="text-muted"> In <b>'+location+'</b></small></h5>';
                rand += '<p class="card-text">'+description+'</p>';
                rand += '<a href="product.php?d='+prod_id+'" class="btn btn-info" style="color:#fff">INFO</a>';
                rand += '</div>';
                rand += '</div>';

                card_c += 1; // count the number of items
                // if(inc == 2){
                //   TOP -= 1;
                //   console.log("Am bagat 1 negativ");
                // }
                // if(inc == 1){
                //   TOP += 1;
                //   console.log("Am bagat 1 pozitiv");
                // }

                if ((i+j)%2 == 0 ){
                  linie += '<a href="product.php?d='+prod_id+'" style="text-decoration:none;"><li class="list-group-item d-flex justify-content-between align-items-center">';
                }
                else{
                  linie += '<a href="product.php?d='+prod_id+'" style="text-decoration:none; color: #000"><li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #fffbe4">'
                }
                linie += title;
                linie += '<span class="badge badge-primary badge-pill">'+location+'</span>';
                linie += '</li></a>';

                post_loc.push(location);
                all_names.push(title);
            }

            rand += '</div>';
            rand += '<br>'
            rand += '</div>';

            linie += '</ul>';
            if(card_c == products.length-1){
              break;
            }
        }
        document.getElementById('items-grid').innerHTML = rand;
        document.getElementById('items-list').innerHTML = linie;
        for (var i = 0; i < post_loc.length; i++){
          var location_map = post_loc[i].split(' ');
          console.log('LOCATIA NOUA:'+location_map);
          var map_coordinates;

          var split_location = "";
          for(var j = 0; j < location_map.length; j++){
            if (j == location_map.length-1){
              split_location += location_map[j]
            }
            else{
              split_location += location_map[j] + '+';
            }
          }
          var my_url = "https://maps.googleapis.com/maps/api/geocode/json?address="+split_location+"&key=AIzaSyANhILrWgqKfpB7ZurCUun4Dlxl9hzP2pU";

          // Convert address to geo location
          $.ajax({
            type: 'GET',
            url: my_url,
            data : {},
            success: function(data){
              var coords = data['results'][0]['geometry']['location'];
              var lat = coords['lat'];
              var lng = coords['lng'];
              map_coordinates = {lat,lng};
              console.log(map_coordinates);
              console.log('@@'+(all_names[i-1]+i)-1);
              add_pin(map_coordinates , all_names[i-1]);
              console.log("AM ADAUGAT!");
            }
          });

        }
      }
      </script>
      <div class="row">
        <div class="tab-content" id="nav-tabContent" style="width:100%">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-grid-tab">
            <div id="items-grid">
            <!-- HERE COMES THE GRID VIEW -->
            </div>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-list-tab">
            <div id="items-list">
            <!-- HERE COMES THE LIST VIEW -->
            </div>
          </div>
          <div class="tab-pane fade items-map" id="nav-contact" role="tabpanel" aria-labelledby="nav-map-tab">
            <div id="map" style="width: 100px;"></div>
          </div>
        </div>
      </div>
      <br>
      <div class="row align-items-center">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item" onclick="load_new('2')">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item" onclick="load_new('1')">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </section>
  <br>

  <script>

  function request_new(offset,type,inc){
    var skip = ""+offset+"";
    var limit = "9";
    var param = cook+';;;'+type+';;;'+'-1'+';;;'+skip+';;;'+limit;
    console.log(param);
    var my_url = 'http://52.47.147.159/api_main.php?q='+'lJpJRukjAo83WZgfGIQd'
    $.ajax({
    type: 'POST',
    url: my_url,
    data : {d:param},
    success: function(data){
      // alert(data);
      console.log(data);
      if(data == ""){
        document.getElementById('items-grid').innerHTML = '';
        document.getElementById('items-list').innerHTML = '';
        for(var i = 0; i < all_coords.length; i++){
          all_coords[i].setMap(null);
        }
        console.log("No items for this category.");
        // redirect 404
      }
      else{
        list_products(data,inc);
      }
    }
    });
  }

  function load_new(w){
    if(w == '2'){
      if(TOP < 9){
        TOP = 0;
      }
      else{
        TOP -= 9;
      }
      request_new(TOP,TYPE,1);
    }
    else if(w == '1'){
      TOP += 9;
      request_new(TOP,TYPE,1);
    }
    else{
      console.log("Invalid Action.");
    }
  }

  function sort_items(x){
    var type = "";
    var cook = document.cookie.split('auth_token=')[1];
    if(cook == ""){
      cook = "0";
    }
    if(x == 1){
      type = "Vegetables";
    }
    else if(x == 2){
      type = "Fruits";
    }
    else if(x == 3){
      type = "Meat";
    }
    else if(x == 4){
      type = "Honey";
    }
    else if(x == 5){
      type = "Handmade";
    }
    else{
      type = "Other";
    }
    TYPE = type;
    var skip = "0";
    var limit = "9";
    var param = cook+';;;'+type+';;;'+'-1'+';;;'+skip+';;;'+limit;
    console.log(param);
    var my_url = 'http://52.47.147.159/api_main.php?q='+'lJpJRukjAo83WZgfGIQd'
    $.ajax({
    type: 'POST',
    url: my_url,
    data : {d:param},
    success: function(data){
      // alert(data);
      console.log(data);
      if(data == ""){
        document.getElementById('items-grid').innerHTML = '';
        document.getElementById('items-list').innerHTML = '';
        for(var i = 0; i < all_coords.length; i++){
          all_coords[i].setMap(null);
        }
        console.log("No items for this category.");
        // redirect 404
      }
      else{
        list_products(data,1);
      }
    }
    });
  }

  sort_items(2);
  </script>

  <!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
