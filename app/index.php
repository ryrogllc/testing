<?php
/*  If we are already logged in, then take us to the dashboard page. Else display the login page.
 *  Wtf did he do with process.php... Ugh, to fix later, I guess
 */
    session_start();
    if(isset($_SESSION['usertoken'])){
        $more = file_get_contents("http://data.cube.blue/v1/api.php?apikey=" .$_SESSION['usertoken'] . "&more");  //TODO - make a better call to see if a token is logged in still
        if (http_response_code() == 200) { // error while proceesing with API
            header('Location: /dashboard.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<link rel="manifest" href="/manifest.json">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>BluWater</title>


<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<link href="css/customBlue.css" rel="stylesheet">
<link href="css/layout.css" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bodyBgBlue">
	<div class="custLoader" style="display:none;">
		<img src="images/load.gif" />
	</div>
	<section class="middleCnt">
		<div class="pageBlue">
			<div class="container">
			  <div class="row">
				<div class="col-lg-12">
					<div class="custBlueLog">
						<div class="logo"><a href="/"><img src="images/logo.png" /></a></div>
							<div class="custBlueLogFrm">
								<form name="" action="" method="POST">
									<?php if(isset($_GET['msg']) && $_GET['msg']){
										echo '<span class="error success" >Your account has been successfully created.</span>';
									}?>
									<span class="error" id="step1val" ></span>
								
									<input type="text" placeholder="Email" value="" name="email" id="email" />
									<input type="password" placeholder="Password" value="" name="password11" id="password11" />
									<input type="button" value="Sign In" name="login" onclick="return prologin();" />
								</form>
								<div class="custBlueLogFrmTxt">
									<p class="loginTxt"><a href="/forgotpassword.php">Forgot your password?</a></p>
									<p class="loginTxt"><a href="/createaccount.php">Create a BluWater account</a></p>
								</div>
							</div>
						</div>            
					</div>
				</div>
			</div>    
		</div>
	</section>

	<script>
	function prologin(){
	    var loader = $('.custLoader');
	    loader.show();
	    var step1 = $('#step1val');
	    step1.html('');

		var email = $('#email').val();
		var password11 = $('#password11').val();
	
		var filter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;

		if(email==''){
            step1.html('Email Id required');
			loader.hide();
		}else if(password11==''){
            step1.html('Password required');
            loader.hide();
		}else if(email!='' && !filter.test(email)){
            step1.html('Please enter valid email id');
            loader.hide();
		}else{ 
			$.get("/process.php?pro=<?php echo md5('login');?>&emailid="+email+"&pwd="+password11, function(data){
				if(data==3333){
                    step1.html('Invalid Credentials');
                    loader.hide();
					return false;
				}else if(data==111){
                    step1.html('Invalid Credentials');
                    loader.hide();
				}else{
					window.location.href = "/dashboard.php";
				}
			});
		}
		return false;
	}
	</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>
