<?php 
include 'includes/db.php';
if(isset($_POST['submit']))
{
    $email= mysqli_real_escape_string($connection,($_POST['email']));
    $username= mysqli_real_escape_string($connection,$_POST['username']);
    $last_name= mysqli_real_escape_string($connection,$_POST['last_name']);
    $first_name= mysqli_real_escape_string($connection,$_POST['first_name']);
    $password= md5(mysqli_real_escape_string($connection,$_POST['password']));
    $password1= md5(mysqli_real_escape_string($connection,$_POST['password1']));
    
    $signup_query= "INSERT INTO `login`(`user_id`, `email`, `username`, `first_name`, `last_name`, `password`) VALUES ('','$email','$username','$first_name','$last_name','$password')"; 
    
    
    $run_signup_query= mysqli_query($connection,$signup_query);
    
}

?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>THis is a title</title>
        
        <script src="https://use.fontawesome.com/1eae1dea35.js"></script>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Do a Good Job</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li  class="active"><a id="signupbtn" href="javascript:" onclick="signup()"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li ><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
         
<script type="text/javascript">
    function signup(){
       alert("ss");
    $("#signupbtn").click(function(){
        $("#signup").hide();
    });
    

    }
});
</script>
   
       
         
    <div id="signup" class="container" style="margin-top:60px"> 
            <div class="row" > 
                    <div class="col-md-offset-4 col-md-4" id="box">
                                  <h2>Sign Up</h2>

                                        <hr>


                                            <form class="form-horizontal" action="" method="post" id="contact_form">
                                                
                                                    
                                                    <div class="form-group">

                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                <input name="email" placeholder="Email" class="form-control" type="email">
                                                            </div>
                                                           
                                                        </div>
                                                    </div> 
                                                    
                                                    <div class="form-group">

                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                <input name="first_name" placeholder="First Name" class="form-control" type="text">
                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">

                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                <input name="last_name" placeholder="Last Name" class="form-control" type="text">
                                                            </div>
                                                           
                                                        </div>
                                                    </div>

                                                    <div class="form-group">

                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                <input name="username" placeholder="Username" class="form-control" type="text">
                                                            </div>
                                                           
                                                        </div>
                                                    </div>



                                                    <!-- Text input-->
                                                    <div class="form-group">

                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                                <input name="password" placeholder="Password" class="form-control" type="password">
                                                            </div>
                                                             
                                                        </div>
                                                    </div> 
                                                    
                                                     <div class="form-group">

                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                                <input name="password1" placeholder="Confirm Password" class="form-control" type="password">
                                                            </div>
                                                            
                                                        </div>
                                                    </div>




                                                    <div class="form-group">

                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-md btn-success pull-right" name="submit">Sign Up </button>
                                                        </div>
                                                    </div>

                                                
                                            </form>
                                </div> 
            </div>
    </div>
        

         
    </body>
</html> 