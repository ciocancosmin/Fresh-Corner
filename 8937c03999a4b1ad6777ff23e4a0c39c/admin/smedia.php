<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ro_RO/sdk.js#xfbml=1&version=v5.0"></script>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <!-- <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">PROJECT NAME - Admin </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Confirm Accounts</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Statistics</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Action3</a>
      </div>
    </div> -->
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">ADMIN</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link pointer" onclick="logout()">Log Out</a>
              <script>
                function logout(){
                  document.cookie = "auth_token=0"
                  document.location.replace('./../../index.php');
                }
              </script>
            </li>
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li> -->
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <h1 class="mt-4">SOCIAL MEDIA</h1>
        <p>This page is meant to keep you up to date with the general public by following #project-name on both facebook and twitter</p>
        <div class="row" style="margin-left:1em; margin-right: 1em;">
          <div class="col-lg-4" style="height:53em; overflow-y: scroll;">
            <center><h2 style="color:#1da1f2;"><b>Twitter</b></h2></center>
            <a class="twitter-timeline" href="https://twitter.com/WJTV?ref_src=twsrc%5Etfw">Tweets by WJTV</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          </div>
          <div class="col-lg-4">
            <center><h2 style="color:#e60023;"><b>Pinterest</b></h2></center>
            <a data-pin-do="embedBoard" data-pin-lang="ro" data-pin-board-width="900" data-pin-scale-height="850" data-pin-scale-width="600" href="https://ro.pinterest.com/jbgorganic/fermented-foods/"></a>
          </div>
          <div class="col-lg-4">
            <center><h2 style="color:#1877f2;"><b>Facebook</b></h2></center>
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=600&height=850&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="600" height="850" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script async defer src="//assets.pinterest.com/js/pinit.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
