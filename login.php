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

  <!-- Paper CSS -->
  <!-- <link rel="stylesheet" href="https://unpkg.com/papercss@1.6.1/dist/paper.min.css"> -->

  <!-- Custom styles for this template -->
  <link href="css/one-page-wonder.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Fresh Corner</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="masthead text-center text-white" id="register-banner">
    <div class="masthead-content">
      <div class="container">
        <h1 class="masthead-heading mb-0" style="text-shadow: 4px 4px 4px #000000;">Login</h1>

        <div>
        </div>

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
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="img/reg2.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h2 class="display-4">Email</h2>
            <input type="text" class="form-control login_email" id="login_email" placeholder="Enter Email address"><br>
            <h2 class="display-4">Password</h2>
            <input type="password" class="form-control login_pass" id="login_pass" placeholder="Enter Password"><br>
            <button class="btn btn-success" type="button" onclick="do_login()">Submit</button><span style="margin-left:3%">Don't have an account yet? <a href="register.php">Register</a></span>
            <br><br>
            <!-- Error Alert -->
            <div class="alert alert-danger alert-dismissible fade show" id="error_box" style="display:none;">
                <strong>Error!</strong> <span id="mesaj_de_eroare"></span>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            </br>
            <p><i>"Those who think they have no time for healthy eating will sooner or later have to find time for illness."</i></p>
          </div>
        </div>

        <script>
        function do_login(){
          var email = document.getElementById('login_email').value;
          var pass = document.getElementById('login_pass').value;
          var param = email+';;;'+pass;
          $.ajax({
          type: 'POST',
          data: {d:param},
          url: 'http://52.47.147.159/api_main.php?q='+'dQZ9ryLPwLZJTyHOoKhK',
          success: function(data){
            auth_token = "";
            if(data == '0'){
              message = "An account with that email does not exist.";
              document.getElementById('mesaj_de_eroare').innerHTML += message;
              document.getElementById('error_box').style.display = '';
            }
            else if(data == '1'){
              message = "Incorrect Password!";
              document.getElementById('mesaj_de_eroare').innerHTML += message;
              document.getElementById('error_box').style.display = '';
            }
            else{
              auth_token = data;
              console.log(data);
              document.cookie = "auth_token="+auth_token;
              message = '';
              document.location.replace('./market.php');
            }

          }
          });
        }
        </script>

      </div>
    </div>
  </section>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
