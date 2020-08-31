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

  <!-- Paper CSS -->
  <!-- <link rel="stylesheet" href="https://unpkg.com/papercss@1.6.1/dist/paper.min.css"> -->
  <script src="vendor/jquery/jquery.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="css/one-page-wonder.css" rel="stylesheet">

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

  <header class="product-header text-align-center">
      <div class="row product-header-header">
        <div class="col-lg-12">
          <div class="card" id="product-info">
            <div class="card-body">
              <small><b>Name:</b> <a href="profil.html">Marioara</a></small>
              <h1 class="card-title">Product Name</h1>
              <form>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label"><b style="font-size:1.3em">Product Title</b></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputTitle" placeholder="Title">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label"><b style="font-size:1.3em">Product Description</b></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputDesc" placeholder="Description">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label"><b style="font-size:1.3em">Product Quantity</b></label>
                  <div class="col-sm-10">
                    <div class="input-group-prepend">
                      <span class="input-group-text">kg</span>
                      <input type="number" class="form-control" id="inputquant" placeholder="Quantity">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label"><b style="font-size:1.3em">Product Price</b></label>
                  <div class="col-sm-10">
                    <div class="input-group-prepend">
                      <span class="input-group-text">$</span>
                      <input type="number" class="form-control" id="inuptPrice" placeholder="Price">
                    </div>
                  </div>
                </div>
                <fieldset class="form-group">
                  <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0"><b style="font-size:1.3em">Category</b></legend>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                        <label class="form-check-label" for="gridRadios1">
                          Fruits
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                        <label class="form-check-label" for="gridRadios2">
                          Vegetables
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                        <label class="form-check-label" for="gridRadios3">
                          Meat
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios4" value="option4">
                        <label class="form-check-label" for="gridRadios4">
                          Honey
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios5" value="option5">
                        <label class="form-check-label" for="gridRadios5">
                          Hand Made
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios6" value="option6">
                        <label class="form-check-label" for="gridRadios6">
                          Other
                        </label>
                      </div>
                    </div>
                    <div class="form-check" id="poze">
                      <br>
                      <label class="form-check-label" for="gridRadios6">
                        <b  style="font-size:1.3em">Profile Picture</b>
                      </label>
                      <br>
                    </div>
                  </div>
                </fieldset>
                <br>
                <button class="btn btn-info" onclick="new_picture()" type="button">Add another Image</button>
                <div class="form-group row">
                  <div class="col-sm-10">
                    <br>
                    <button type="button" class="btn btn-success" onclick="load_product()">LOAD IMG</button>
                    <br><br>
                    <button type="button" class="btn btn-success" onclick="upload_product()">PUBLISH</button>
                    <br><br>
                    <!-- Error Alert -->
                    <div class="alert alert-success alert-dismissible fade show" id="error_box" style="display:none;">
                        <span id="mesaj_de_eroare"></span>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                  </div>
                </div>
              </form>

              <script>
                var counter = 0;
                function new_picture(){
                  if(counter > 6){
                    alert("You have reached the maximum limit of pictures.");
                  }
                  else{
                    counter += 1;
                    var btn_new = '<b  style="font-size:1.3em">Picture'+counter+':</b> <input type="file" id="pic'+counter+'"><br>'
                    document.getElementById('poze').innerHTML+=btn_new;
                    console.log(btn_new);
                  }
                }
                var poza_codata = '';

                function getBase64(file) {
                  var reader = new FileReader();
                  reader.readAsDataURL(file);
                  reader.onload = function () {
                    poza_codata.push(reader.result);
                  };
                  reader.onerror = function (error) {
                    console.log('Error: ', error);
                  };
                }

                var poza_codata = []

                function load_product(){
                  total = 0;
                  if(document.getElementById('pic1') != null){
                    getBase64(document.getElementById('pic1')['files'][0]);
                    // total = 1;
                  }
                  if(document.getElementById('pic2') != null){
                    getBase64(document.getElementById('pic2')['files'][0]);
                    // total = 2;
                  }
                  if(document.getElementById('pic3') != null){
                    getBase64(document.getElementById('pic3')['files'][0]);
                    // total = 3;
                  }
                  if(document.getElementById('pic4') != null){
                    getBase64(document.getElementById('pic4')['files'][0]);
                    // total = 4;
                  }
                  if(document.getElementById('pic5') != null){
                    getBase64(document.getElementById('pic5')['files'][0]);
                    // total = 5;
                  }
                  if(document.getElementById('pic6') != null){
                    getBase64(document.getElementById('pic6')['files'][0]);
                    // total = 6;
                  }

                }

                // var file = document.getElementById('fisieru').files[0];
                // getBase64(file); // prints the base64 string

                function upload_product(){
                  var category = "";
                  if( $("#gridRadios1").is(":checked") ){
                    category = "Fruits";
                  }
                  else if( $("#gridRadios2").is(":checked") ){
                    category = "Vegetables";
                  }
                  else if( $("#gridRadios3").is(":checked") ){
                    category = "Meat";
                  }
                  else if( $("#gridRadios4").is(":checked") ){
                    category = "Honey";
                  }
                  else if( $("#gridRadios5").is(":checked") ){
                    category = "Handmade";
                  }
                  else{
                    category = "Other";
                  }
                  var title = document.getElementById('inputTitle').value;
                  var quantity = document.getElementById('inputquant').value;
                  var price = document.getElementById('inuptPrice').value;
                  var images = "";
                  for(var i = 0; i <= counter; i++){
                      if (i == counter){
                        images += poza_codata[i];
                      }
                      else{
                        images += poza_codata[i] + '#';
                      }
                  }
                  // console.log(images);
                  console.log(images.split('#'));
                  var owner = document.cookie.split('auth_token=')[1];
                  var description = document.getElementById('inputDesc').value;
                  var param = category+';;;'+title+';;;'+quantity+';;;'+price+';;;'+images+';;;'+owner+';;;'+description;
                  var my_url = 'http://52.47.147.159/api_main.php?q='+'wE3f3iF31Ji1eBe91rh9'
                  // console.log(my_url);
                  // alert('11');
                  // Convert address to geo location
                  $.ajax({
                  type: 'POST',
                  url: my_url,
                  data : {d:param},
                  success: function(data){
                    // alert(data);
                    message = "Item successfully published!";
                    document.getElementById('mesaj_de_eroare').innerHTML += message;
                    document.getElementById('error_box').style.display = '';
                    console.log('Request DONE!'+data);
                  }
                  });
                }

              </script>
            </div>
          </div>
        </div>
      </div>
  </header>

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
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/dropzone.js"></script>

</body>

</html>
