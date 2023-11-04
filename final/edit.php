<?php
 include_once 'dbConnection.php';

 
 ?>

<?php







if (isset($_POST['sub'])) {

if ($_GET['u_id']){
$email= $_GET['u_id'];


}


//---ASSIGNING VARIABLES-----
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$gender = $_POST['gender'];
$email = $_POST['email'];
$college = $_POST['college'];
$mob = $_POST['mob'];
$name = stripslashes($name);
$name = addslashes($name);
$name = ucwords(strtolower($name));
$gender = stripslashes($gender);
$gender = addslashes($gender);
$email = stripslashes($email);
$email = addslashes($email);
$college = stripslashes($college);
$college = addslashes($college);
$mob = stripslashes($mob);
$mob = addslashes($mob);




	
	


//<<<<<<<<<<<<<<<<<<<<----START QUERY---<<<<<<<<<<<<<<<<<<<<<<<
	//
	//-------QUERY TO INSERT DATA INTO user TABLE---------
 $user_query=("update user set name='$name',gender='$gender',email='$email',mob='$mob' where email='$email'");
                   


	$create_user_query = mysqli_query($con, $user_query);
	if (!$create_user_query) {
		die("Error in calling query" . mysqli_error($con));
	}
	 echo "<script type=\"text/javascript\">".
        "location.href='dash.php'".
        "</script>";
}
?>





<!DOCTYPE html>


<html>
<head>

<meta charset="UTF-8">
<title>Recruitments </title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content=" VinnovateIT is official Innovation Lab of VIT University. ">
<meta name="author" content="Vinit Shahdeo">
<meta name="email" content="vinitshahdeo@gmail.com">
<meta name="" content=""/>

<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<script>
function validateForm() {var y = document.forms["form"]["name"].value;	var letters = /^[A-Za-z]+$/;if (y == null || y == "") {alert("Name must be filled out.");return false;}var z =document.forms["form"]["college"].value;if (z == null || z == "") {alert("college must be filled out.");return false;}var x = document.forms["form"]["email"].value;var atpos = x.indexOf("@");
var dotpos = x.lastIndexOf(".");if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {alert("Not a valid e-mail address.");return false;}var a = document.forms["form"]["password"].value;if(a == null || a == ""){alert("Password must be filled out");return false;}if(a.length<5 || a.length>25){alert("Passwords must be 5 to 25 characters long.");return false;}
var b = document.forms["form"]["cpassword"].value;if (a!=b){alert("Passwords must match.");return false;}}
</script>



<style>
.bg1{
	background:none;
	
	
}
</style>
</head>

<body>




<div class="bg1">
<div class="row">

<div class="col-md-7"></div>
<div class="col-md-4 panel">
<!-- sign in form begins -->
  <form class="form-horizontal" name="form" action="edit.php?q=account.php" onSubmit="return validateForm()" enctype="multipart/form-data" method="POST">
  
  <?php
if ($_GET['u_id']){
$email= $_GET['u_id'];
}

                            $query= mysqli_query($con,"select * from user where email='$email'") or die(mysqli_error());
                            $row = mysqli_fetch_array($query);
                            ?>

<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text" value="<?php echo $row['name']; ?>">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="gender"></label>
  <div class="col-md-12">
    <select id="gender" name="gender" placeholder="Enter your gender" class="form-control input-md" >
   <option value="Male">Select Gender</option>
  <option value="M">Male</option>
  <option value="F">Female</option> </select>
  </div>
</div>

<!-- Text input-->



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>
  <div class="col-md-12">
  <input id="college" name="college" placeholder="Enter your address" class="form-control input-md" type="text" value="<?php echo $row['college']; ?>">

  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label title1" for="email"></label>
  <div class="col-md-12">
    <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email" value="<?php echo $row['email']; ?>">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="mob"></label>
  <div class="col-md-12">
  <input id="mob" name="mob" placeholder="Enter your mobile number" class="form-control input-md" type="number" value="<?php echo $row['mob']; ?>">

  </div>
</div>


                          
                       


<?php if(@$_GET['q7'])
{ echo'<p style="color:red;font-size:15px;">'.@$_GET['q7'];}?>
<!-- Button -->
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12">
    <input  type="submit" class="sub" value="update" name="sub" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form>
</div><!--col-md-6 end-->
</div></div>




</body>
</html>