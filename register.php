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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
            <a class="nav-link" href="login.php">Log In</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="masthead text-center text-white" id="register-banner">
    <div class="masthead-content">
      <div class="container">
        <h1 class="masthead-heading mb-0" style="text-shadow: 4px 4px 4px #000000;">Register</h1>

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
            <h2 class="display-5">Type:
            <?php
            global $type;
            $type = "";
            if(isset($_GET['q'])) $type = $_GET['q'];
            if ($type == "1"){
              echo "<span style='color:#a43d45'>Seller</span></h2>";
            }
            else{
              echo "<span style='color:#a43d45'>Buyer</span></h2>";
            }
              echo "<input type='text' style='display:none' id='user_reg_type' value='".$type."'>";
            ?>
            <h2 class="display-5">First Name</h2>
            <input type="text" class="form-control" id="reg_name" placeholder="Enter Your Name"><br>
            <h2 class="display-5">Surname</h2>
            <input type="text" class="form-control" id="reg_surname" placeholder="Enter Your Surname"><br>
            <h2 class="display-5">Email Address</h2>
            <input type="email" class="form-control" id="reg_email" placeholder="Enter Your email address"><br>
            <h2 class="display-5">Phone Address</h2>
            <input type="text" class="form-control" id="reg_phone" placeholder="Enter Your phone number"><br>
            <h2 class="display-5">Address</h2>
            <input type="text" class="form-control" id="reg_addr" placeholder="Enter Your phisical address"><br>
            <h2 class="display-5">Password</h2>
            <input type="password" class="form-control" id="reg_pass" placeholder="Enter Your password"><br>
            <?php
              if($type == "1"){
                $out= "<h2 class='display-5'>Selling to:</h2><input type='checkbox' id='reg_chk_cp' > (company) <input type='checkbox' id='reg_chk_pr' > (private)";
                echo $out;
              }
              else{
                $out= "<h2 class='display-5'>I am:</h2><input type='checkbox' id='reg_chk_cp' > (company) <input type='checkbox' id='reg_chk_pr' > (private)";
                echo $out;
              }
            ?>
            <br><br>
            <button class="btn btn-success" type="button" onclick="do_register()">Submit</button> <span style="margin-left:3%">Already have an account? <a href="login.php">Login</a></span>
            <br><br>
            <!-- Error Alert -->
            <div class="alert alert-danger alert-dismissible fade show" id="error_box" style="display:none;">
                <strong>Error!</strong> <span id="mesaj_de_eroare"></span>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            <p><i>"Life expectancy would grow by leaps and bounds if green vegetables smelled as good as bacon."</i><b> - Doug Larson</b></p>
          </div>
        </div>

        <script>
          function do_register(){
            var type = document.getElementById('user_reg_type').value;
            var name = document.getElementById('reg_name').value;
            var surname = document.getElementById('reg_surname').value;
            var email = document.getElementById('reg_email').value;
            var phone = document.getElementById('reg_phone').value;
            var addr = document.getElementById('reg_addr').value;
            var pass = document.getElementById('reg_pass').value;
            var x=$("#reg_chk_cp").is(":checked");
            var y=$("#reg_chk_pr").is(":checked");
            if (x){
              var reg_pub = "1";
            }
            else if(y){
              var reg_pub = "0";
            }
            else{
              message = "Please Select the public of interest."
            }
            var param = type+';;;'+email+';;;'+name+';;;'+surname+';;;'+phone+';;;'+addr+';;;'+reg_pub+';;;'+pass;
            var to_send = 'http://52.47.147.159/api_main.php?q='+'yBuMKjnrVEeKN5Hf78zr';
            $.ajax({
            type: 'POST',
            url: to_send,
            // data: {email,pass},
            data : {d:param},
            success: function(data){
              auth_token = "";
              if(data == '0'){
                message = "Email in use, please choose a different one.";
                document.getElementById('mesaj_de_eroare').innerHTML += message;
                document.getElementById('error_box').style.display = '';
              }
              else{
                message = '';
                console.log(data);
                // alert(data);
                document.location.replace('./login.php');
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
