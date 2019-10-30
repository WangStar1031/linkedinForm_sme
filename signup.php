<?php
$email_name = "";
$password = "";
$_firstName = "";
$_lastName = "";

require_once 'library/userManager.php';
$isPost = false;
if( isset($_POST['email_name'])){
	$email_name = $_POST['email_name'];
	$password = $_POST['password'];
	$_firstName = $_POST['first_name'];
	$_lastName = $_POST['last_name'];
	$ret = registerProfile($_firstName, $_lastName, $email_name, $password);
  if( $ret === true){
    header("Location: login.php");
  }
  $isPost = true;
}
?>

<html lang="en">
<head>
<?php
include("assets/components/header.php");
?>
<style type="text/css">
  .errorMsg{
    color: red;
  }
</style>
<body>
  <div style="position: absolute; width: 100%; height: 80px; background-color: #212e4d;">
    
  </div>
  <img src="assets/imgs/Nodes-homepage-logo197by40-1.png" style="position: absolute; padding: 20px;">
<main class="auth-main-1">
  <div class="auth-block" style="background: #212e4d;">
    <h3>Sign up to join our network as an expert<!-- <img src="assets/imgs/vision-logo.png" width="50px;"> --> </h3>
    <?php
    if( $isPost){
    ?>
      <div class="errorMsg"><?=$ret?></div>
    <?php
    }
    ?>
    <form class="form-horizontal" method="POST" onsubmit="return validate()">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" required>FirstName</label>

        <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="First Name" name="first_name">
        </div>
      </div>


      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" required>LastName</label>

        <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Last Name" name="last_name">
        </div>
      </div>


      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" required>Email</label>

        <div class="col-sm-12">
          <input type="text" class="form-control" placeholder="Email" name="email_name">
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label" required>Password</label>

        <div class="col-sm-12">
          <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button class="btn btn-default btn-auth">Sign up</button>
          <a style="float: right;" href="login.php">Signin</a>
        </div>
      </div>
    </form>
    </div>
  </div>
</main>
</body>
</html>
<script type="text/javascript">
	function validate(){
		if( $("input[name=first_name]").val() == "" || $("input[name=last_name]").val() == "" || $("input[name=email_name]").val() == "" || $("input[name=password]").val() == "")
			return false;
		return true;
	}
</script>