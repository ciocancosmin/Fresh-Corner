<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Magazinul Perfect de Legume si nu numa</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>

  <!-- Paper CSS -->
  <!-- <link rel="stylesheet" href="https://unpkg.com/papercss@1.6.1/dist/paper.min.css"> -->

  <!-- Custom styles for this template -->
  <link href="css/one-page-wonder.css" rel="stylesheet">

</head>

<body>
  <?php
  $prod_id = $_GET['d'];
  echo "<input type='text' value='".$prod_id."' style='display:none' id='cod_produs'>";
  ?>
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
                  document.getElementById('only_buyer').style.display = "block";
                }
                else if(tipp == "seller"){
                  console.log("AICI");
                  var icon_to_display = '<a class="nav-link " href="upload.php"><img src="img/plus.png" style="width:40px"> </a>';
                  document.getElementById('special_icon').innerHTML = icon_to_display;
                  document.getElementById('only_buyer').style.display = "none";
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

  <header class="product-header text-align-center">
      <div class="row product-header-header">
        <div class="col-lg-6">
          <div class="card" id="product-info">
            <div class="card-body">
              <script>
              var prod_id = document.getElementById('cod_produs').value;
              var param = prod_id;
              var tipp = '';
              var my_url = 'http://52.47.147.159/api_main.php?q='+'aawgmyLYDFSvn2Hrvmry'
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
                  data = data.split(';;;');
                  console.log(data);
                  var pictures = data[0].split(';');
                  console.log(pictures);
                  for(var j = 1; j <= pictures.length; j++){
                    document.getElementById('item_pic_'+j).innerHTML = '<img src="'+pictures[j-1]+'" style="max-width:275px; max-height:183px">';
                  }
                  var owner = data[6];
                  document.getElementById('item_owner').innerHTML = owner;
                  var location = data[4];
                  document.getElementById('item_location').innerHTML = location;
                  var title = data[1];
                  document.getElementById('item_title').innerHTML = title;
                  var description = data[2];
                  document.getElementById('item_description').innerHTML = description;
                  var category = data[9];
                  document.getElementById('item_category').innerHTML = category;
                  var price = data[11];
                  document.getElementById('item_price').innerHTML = price;
                  var quantity = data[10];
                  document.getElementById('item_quantity').innerHTML = quantity;
                }
              }
              });
              </script>
              <small><b>Owner:</b> <a href="profil.html"><span id="item_owner"></span></a> / <b>Category:</b> <span id="item_category"></span></small>
              <h1 class="card-title"><span id="item_title"></span></h1>
              <ul>
                <li><p class="card-text" style="font-size: 1.2em"><b>DESCRIPTION: </b><span id="item_description"></span> </p></li>
                <li><p class="card-text" style="font-size: 1.2em"><b>AVAILABLE QUANTITY: </b><span id="item_quantity"></span></p></li>
                <li><p class="card-text" style="font-size: 1.2em"><b>PRICE: </b><span id="item_price"> </san>$ / KG </p></li>
                <li><p class="card-text" style="font-size: 1.2em"><b>LOCATION: </b><span id="item_location"></span> </p></li>
              </ul>
              <div id="only_buyer">
                <h1>BUY</h1>
                <ul style="list-style-type: none;">
                  <li><p><b>QUANTITY:</b> <input type="number" id="product_quantity"> </p></li>

                  <li><b>PAYMENT:</b><ul style="list-style-type: none;">
                               <li><input type="checkbox"> (online)</li>
                               <li><input type="checkbox"> (cash) </li></ul>
                  </li>
                </ul>
                <button type="submi" class="btn btn-success" style="padding-left:15px; padding-right: 15px;"> BUY </button>
              </div>
            </div>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="frame">
            <div id="map_item" style="width: 100%; height: 30em;"></div>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANhILrWgqKfpB7ZurCUun4Dlxl9hzP2pU&callback=initMap" type="text/javascript"></script>
            <script>

              var all_coords = [];
              var map;
              var location_map = "Utvin nr 610 timis romania".split(' ');
              console.log(my_url);
              var map_coordinates;

              function add_pin(x) {
                var myLatLng = x;

                var marker = new google.maps.Marker({
                  position: myLatLng,
                  map: map,
                  title: 'Hello World!'
                });

                all_coords.push(marker);
              }


              var split_location = "";
              for(var i = 0; i < location_map.length; i++){
                if (i == location_map.length-1){
                  split_location += location_map[i]
                }
                else{
                  split_location += location_map[i] + '+';
                }
              }
              var my_url = "https://maps.googleapis.com/maps/api/geocode/json?address="+split_location+"&key=AIzaSyANhILrWgqKfpB7ZurCUun4Dlxl9hzP2pU";

              // Convert address to geo location
              $.ajax({
              type: 'GET',
              url: my_url,
              data : {},
              success: function(data){
                // alert(data);
                console.log(data);
                var coords = data['results'][0]['geometry']['location'];
                console.log(coords);
                var lat = coords['lat'];
                console.log(lat)
                var lng = coords['lng'];
                map_coordinates = {lat,lng};
                console.log(map_coordinates);
                initMap(map_coordinates);
                add_pin(map_coordinates);
                console.log("AM ADAUGAT!");
              }
              });

              function initMap(x) {
                map = new google.maps.Map(document.getElementById('map_item'), {
                  center: x,
                  zoom: 12
                });
              }
            </script>
          </div>
        </div>
      </div>
  </header>

  <section class="market-header text-white" style="padding-top:42px;">
        <div class="row">
          <div class="col-lg-2 category-box">
            <ul id="market-category-list">
              <li id="item_pic_1"><img src="img/VEG.png"></li>
            </ul>
          </div>
          <div class="col-lg-2 category-box">
            <ul id="market-category-list">
                <li id="item_pic_2"><img src="img/FRU.png"></li>
            </ul>
          </div>
          <div class="col-lg-2 category-box">
            <ul id="market-category-list">
                <li id="item_pic_3"><img src="img/MEA.png"></li>
            </ul>
          </div>
          <div class="col-lg-2 category-box">
            <ul id="market-category-list">
              <li id="item_pic_4"><img src="img/HON.png"></li>
            </ul>
          </div>
          <div class="col-lg-2 category-box">
            <ul id="market-category-list">
              <li id="item_pic_5"><img src="img/HAN.png"></li>
            </ul>
          </div>
          <div class="col-lg-2 category-box">
            <ul id="market-category-list">
              <li id="item_pic_6"><img src="img/PLU.png"></li>
            </ul>
          </div>
        </div>
    <!-- <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div> -->
  </section>
  <section></section>
  <br>

  <!-- <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="img/03.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h2 class="display-4">Let there be rock!</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
          </div>
        </div>
      </div>
    </div>
  </section> -->

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
