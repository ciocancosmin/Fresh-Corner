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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Paper CSS -->
  <!-- <link rel="stylesheet" href="https://unpkg.com/papercss@1.6.1/dist/paper.min.css"> -->

  <!-- Custom styles for this template -->
  <link href="css/one-page-wonder.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
      <a class="navbar-brand" href="index.php">Fresh Corner</a>
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
  <script>
    var map;
    function initMap(x) {
      map = new google.maps.Map(document.getElementById('map_item'), {
        center: x,
        zoom: 8
      });
    }
    function add_pin(x) {
      var myLatLng = x;

      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map
      });
    }
    var cook = document.cookie.split('auth_token=')[1];
    var param = cook;
    var tipp = '';
    var my_url = 'http://52.47.147.159/api_main.php?q='+'zHcLbjZQhN6fSKgD9cdb'
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
        var email = data[0];
        document.getElementById('user_email').innerHTML = email;
        var phone = data[3];
        document.getElementById('user_phone').innerHTML = phone;
        var fname = data[1];
        var sname = data[2];
        document.getElementById('user_name').innerHTML = fname + ' ' + sname;
        var location = data[4];
        document.getElementById('user_location').innerHTML = location;
        var split_location = location.split(' ');
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
            initMap(map_coordinates);
            add_pin(map_coordinates);
          }
        });
      }
    }
    });

  </script>
  <header class="product-header text-align-center">
      <div class="row product-header-header">
        <div class="col-lg-6">
          <div class="card" id="product-info">
            <div class="card-body">
              <!-- <small><b>Owner:</b> <a href="profil.html">Marioara</a> / <b>Category:</b> Fruits / <b>Subcategory:</b> Banane</small> -->
              <h1 class="card-title"><span id="user_name"></span></h1>
              <small><i>Statistics:</i></small>
              <ul>
                <li><p class="card-text" style="font-size: 1.2em"><b>Total Products Sold: </b>100 </p></li>
                <li><p class="card-text" style="font-size: 1.2em"><b>Location: </b><span id="user_location"></span></p></li>
                <li><p class="card-text" style="font-size: 1.2em"><b>Active Products: </b>2 (see map) </p></li>
                <li><p class="card-text" style="font-size: 1.2em"><b>Phone Number: </b><span id="user_phone"></span> </p></li>
                <li><p class="card-text" style="font-size: 1.2em"><b>Email: </b><span id="user_email"></span> </p></li>
                <li><p class="card-text" style="font-size: 1.2em"><b>Rating: </b><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p></li>
              </ul>
              <button type="submi" class="btn btn-info" style="padding-left:15px; padding-right: 15px;"> EDIT </button>
              <button type="submi" class="btn btn-info" style="padding-left:15px; padding-right: 15px;" data-toggle="modal" data-target="#prodModal"> SHOW ACTIVE PRODUCTS </button>
              <button type="submi" class="btn btn-info" style="padding-left:15px; padding-right: 15px;" data-toggle="modal" data-target="#oldModal"> SHOW PAST PRODUCTS </button>
              <!-- Modal -->
              <script>
                var cook = document.cookie.split('auth_token=')[1];
                var param = cook;
                var tipp = '';
                var my_url = 'http://52.47.147.159/api_main.php?q='+'oXiVkq4F4ZcxTUZUia1O'
                $.ajax({
                type: 'POST',
                url: my_url,
                data : {d:param},
                success: function(data){
                  // alert(data);
                  if(data == ""){
                    console.log("NU E BUN");
                    //document.location.replace('./error.php');
                  }
                  else{
                    data = data.split('###');
                    console.log(data);
                    for(var i = 0; i < data.length-1; i++){
                      var tmp = data[i].split(';;;');
                      console.log(tmp);
                      var title = tmp[0];
                      var description = tmp[1];
                      var category = tmp[2];
                      document.getElementById('tab_active').innerHTML += '<li class="list-group-item d-flex justify-content-between align-items-center">' + title + '<span class="badge badge-primary badge-pill">'+category+'</span>' + '</li>';
                    }
                    // var email = data[0];
                    // var fname = data[1];
                    // var sname = data[2];
                    // document.getElementById('user_name').innerHTML = fname + ' ' + sname;
                    // var location = data[4];
                    // document.getElementById('user_location').innerHTML = location;
                  }
                }
                });

              </script>
              <div class="modal fade" id="prodModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">ACTIVE PRODUCTS</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <ul class="list-group" id="tab_active">

                      </ul>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="oldModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">OLD PRODUCTS</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
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
          </div>
        </div>
      </div>
  </header>

  <section class="market-header text-white" style="height: 5em">

  </section>
  <section></section>
  <br>

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
