<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Record Management">
  
  <title>RFID - Document Tracking System</title>
  <!-- Favicon -->
  <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
  <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
 
  <link type="text/css" href="assets/css/main.min.css" rel="stylesheet">
  <link type="text/css" href="assets/css/custom.css" rel="stylesheet">
  <link type="text/css" href="assets/css/sweetalert/sweetalert.min.css" rel="stylesheet">
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="dashboard.php">
          <img src="assets/img/brand/white.png" /><br/>
		  <small class="font-col">RFID - Document Tracking System</small>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="registration.php">
                  <img src="assets/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-6 fullback">
      <div class="container distance">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
				<h1 class="text-white">Login Details</h1>
              <p class="text-lead text-light">Please login to RFID - Document Tracking System</p>
              <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-1">
              <div class="text-center text-muted mb-4">
                <!--<small>Login Details</small>-->
              </div>
              <form role="form" class="tag_form" id="form_id">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input class="form-control" placeholder="User Name" type="text" id="name" name="name">
                  </div>
				  <span class="error" id="invalid_name"></span>
                </div>
				<div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-bullet-list-67"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" id="pwd" name="pwd">
                  </div>
				  <span class="error" id="invalid_pwd"></span>
                </div>
				<div class="text-center" id="spacing">
                  <input type="submit" value="Login" class="btn btn-primary my-4" id="submit">
                </div>
              </form>
			  <div id="submit-spin"></div>
			  <!--<button onclick="$('#cover-spin').show(0)">Save</button>-->
            </div>
          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
  </div>
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sweetalert/sweetalert.min.js"></script>
  <script>
$(function() {
$('#submit').on('click', function(e) {
	e.preventDefault();
	var name = $('#name').val();
	var pwd = $('#pwd').val();
	var value = $('form.tag_form').serialize();
	//alert(return_val);
	if(name == ""){
		$('#invalid_name').text('Please fill the field');
		$('#spacing').css('padding-left','0px');
		return false;
	}else{
		$('#invalid_name').text('');
		$('#spacing').css('padding-left','0px');
	}
	if(pwd == ""){
		$('#invalid_pwd').text('Please fill the field');
		$('#spacing').css('padding-left','110px');
		return false;
	}else{
		$('#invalid_pwd').text('');
		$('#spacing').css('padding-left','0px');
	}
	$('#submit-spin').show(0);
	$.ajax({
		async:false,
		type: "POST",
		url: "functions/checkuser.php",
		datatype: 'json',
		data: value,
		success: function(response) {
			//alert(response);
			if(response == 'success'){
				window.location.href = "dashboard.php";
				//swal({title: "Login Successfully", text: "", type: "success"});
			}else{
				swal("Login failed");
				$('#submit-spin').hide();
			}
		}
	});
});
});
</script>
</body>

</html>