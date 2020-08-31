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
  <script src="vendor/jquery/jquery.min.js"></script>
  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>
  <script>
    var TOP = 0;
    var cook = document.cookie.split('auth_token=')[2];
    var skip = "0";
    var limit = "13";
    var tipp = '';
    var param = cook+';;;'+skip+';;;'+limit;
    var my_url = 'http://52.47.147.159/api_main.php?q='+'2IwYvIhjGVnNb35ch7VZ'
    $.ajax({
    type: 'POST',
    url: my_url,
    data : {d:param},
    success: function(data){
      // alert(data);
      if(data == ""){
        console.log("NU E BUN");
        // document.location.replace('./error.php');
      }
      else{
        tipp = data.split('###');
        console.log(tipp);
        TOP = tipp.length-1;
        for(var i = 0; i < tipp.length-1; i++){
          var tmp = tipp[i].split(';;;');
          var first = tmp[0];
          var last = tmp[1];
          var email = tmp[2];
          var number = tmp[3];
          var location = tmp[4];

          var row_tab = '';
          row_tab += '<tr id="line'+i+'">';
          row_tab += '<th scope="row">';
          row_tab += parseInt(skip)+1+i;
          row_tab += '</th>';
          row_tab += '<td>'+first+'</td>';
          row_tab += '<td>'+last+'</td>';
          row_tab += '<td>'+email+'</td>';
          row_tab += '<td>'+number+'</td>';
          row_tab += '<td>'+location+'</td>';
          row_tab += '<td><button type="button" class="btn btn-success" onclick="validate_user('+"'"+email+"'"+','+i+')">Accept</button>'
          row_tab += ' <button type="button" class="btn btn-danger" onclick="decline_user('+"'"+email+"'"+','+i+')">Decline</button></td>';
          row_tab += '</tr>';

          document.getElementById('users_pending').innerHTML += row_tab;
        }
      }
    }
    });

    function validate_user(ema,nr){
      var cook = document.cookie.split('auth_token=')[2];
      var tipp = '';
      var param = cook+';;;'+ema;
      console.log(param);
      var my_url = 'http://52.47.147.159/api_main.php?q='+'3EDbmIXM7SAXp1WXCp61';
      $.ajax({
        type: 'POST',
        url: my_url,
        data : {d:param},
        success: function(data){
          if(data == ""){
            console.log("NU E BUN");
            // document.location.replace('./error.php');
          }
          else{
            console.log(data);
            document.getElementById('line'+nr).innerHTML = "";
          }
        }
      });
    }

    function decline_user(ema,nr){
      var cook = document.cookie.split('auth_token=')[2];
      var tipp = '';
      var param = cook+';;;'+ema;
      console.log(param);
      var my_url = 'http://52.47.147.159/api_main.php?q='+'8CFzbwNCkq0yRGWGcOTT';
      $.ajax({
        type: 'POST',
        url: my_url,
        data : {d:param},
        success: function(data){
          if(data == ""){
            console.log("NU E BUN");
            // document.location.replace('./error.php');
          }
          else{
            console.log(data);
            document.getElementById('line'+nr).innerHTML = "";
          }
        }
      });
    }



  </script>
  <div class="d-flex" id="wrapper">

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
        <h1 class="mt-4">VALIDATE</h1>
        <p>This page holds all the new accounts which are on hold for verification.</p>
        <p>Admin's role is tu check each individual account and Validate it or Decline the request.</p>
        <div class="row" style="margin-left:1em; margin-right: 1em;">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Location</th>
                <th scope="col">Accept / Decline</th>
              </tr>
            </thead>
            <tbody id="users_pending">
              <!-- users -->
            </tbody>
          </table>
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item" onclick="load_next('-1')">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <li class="page-item" onclick="load_next('1')">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <script>
      function load_next(w){
        console.log(TOP);
        document.getElementById('users_pending').innerHTML = "";
        if (w == "-1"){
          var cook = document.cookie.split('auth_token=')[2];
          if (TOP < 13){
            TOP = 0;
          }
          else{
            TOP -= 13;
          }
          var skip = ""+TOP+"";
          var limit = "13";
          var tipp = '';
          var param = cook+';;;'+skip+';;;'+limit;
          var my_url = 'http://52.47.147.159/api_main.php?q='+'2IwYvIhjGVnNb35ch7VZ'
          $.ajax({
          type: 'POST',
          url: my_url,
          data : {d:param},
          success: function(data){
            // alert(data);
            if(data == ""){
              console.log("NU E BUN");
              // document.location.replace('./error.php');
            }
            else{
              tipp = data.split('###');
              console.log(tipp);
              TOP = tipp.length-1;
              for(var i = 0; i < tipp.length-1; i++){
                var tmp = tipp[i].split(';;;');
                var first = tmp[0];
                var last = tmp[1];
                var email = tmp[2];
                var number = tmp[3];
                var location = tmp[4];

                var row_tab = '';
                row_tab += '<tr id="line'+i+'">';
                row_tab += '<th scope="row">';
                row_tab += parseInt(skip)+1+i;
                row_tab += '</th>';
                row_tab += '<td>'+first+'</td>';
                row_tab += '<td>'+last+'</td>';
                row_tab += '<td>'+email+'</td>';
                row_tab += '<td>'+number+'</td>';
                row_tab += '<td>'+location+'</td>';
                row_tab += '<td><button type="button" class="btn btn-success" onclick="validate_user('+"'"+email+"'"+','+i+')">Accept</button>'
                row_tab += ' <button type="button" class="btn btn-danger" onclick="decline_user('+"'"+email+"'"+','+i+')">Decline</button></td>';
                row_tab += '</tr>';

                document.getElementById('users_pending').innerHTML += row_tab;
              }
            }
          }
          });
        }
        else if(w == "1"){
          var cook = document.cookie.split('auth_token=')[2];
          if (TOP < 13 && TOP >= 0){
            TOP = 0;
          }
          var skip = ""+TOP+"";
          var limit = "13";
          var tipp = '';
          var param = cook+';;;'+skip+';;;'+limit;
          var my_url = 'http://52.47.147.159/api_main.php?q='+'2IwYvIhjGVnNb35ch7VZ'
          $.ajax({
          type: 'POST',
          url: my_url,
          data : {d:param},
          success: function(data){
            // alert(data);
            if(data == ""){
              console.log("NU E BUN");
              // document.location.replace('./error.php');
            }
            else{
              tipp = data.split('###');
              console.log(tipp);
              TOP += tipp.length-1;
              for(var i = 0; i < tipp.length-1; i++){
                var tmp = tipp[i].split(';;;');
                var first = tmp[0];
                var last = tmp[1];
                var email = tmp[2];
                var number = tmp[3];
                var location = tmp[4];

                var row_tab = '';
                row_tab += '<tr id="line'+i+'">';
                row_tab += '<th scope="row">';
                row_tab += parseInt(skip)+1+i;
                row_tab += '</th>';
                row_tab += '<td>'+first+'</td>';
                row_tab += '<td>'+last+'</td>';
                row_tab += '<td>'+email+'</td>';
                row_tab += '<td>'+number+'</td>';
                row_tab += '<td>'+location+'</td>';
                row_tab += '<td><button type="button" class="btn btn-success" onclick="validate_user('+"'"+email+"'"+','+i+')">Accept</button>'
                row_tab += ' <button type="button" class="btn btn-danger" onclick="decline_user('+"'"+email+"'"+','+i+')">Decline</button></td>';
                row_tab += '</tr>';

                document.getElementById('users_pending').innerHTML += row_tab;
              }
            }
          }
          });
        }
        else{
          console.log("Invalid Action!");
        }
      }
    </script>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
