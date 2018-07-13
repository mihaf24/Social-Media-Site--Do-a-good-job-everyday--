<?php //login
    $connection= mysqli_connect("localhost","root","","projectc");
    session_start(); 

    if(isset($_POST['login']))
    { 
        //echo 'gaba';
        $username = mysqli_real_escape_string($connection,$_POST['username']);
        $password = md5(mysqli_real_escape_string($connection,$_POST['password']));

        $select_query= "SELECT * FROM login WHERE username='$username'";
        //echo $select_query;
        $run_select_query= mysqli_query($connection,$select_query);
    
        if(mysqli_num_rows($run_select_query)>0)
        {
            while ($row=mysqli_fetch_assoc($run_select_query))
                {
                    $db_user= $row['username'];
                    $db_password= $row['password'];
                    $db_id= $row['user_id'];
                } 
       
        
        if($password==$db_password && $username==$db_user)
        {
            $_SESSION['user']=$db_user;
            $_SESSION['user_id']= $db_id;
            
            header ('location: index.php');
            echo 'login successful\n';
           
        }
        else
        { 
            //header ('location: index3.php');
            echo 'login unsuccessful';
            
        }
        
    } 
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
<!--navigation start-->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Do a Good Job</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li class="active" ><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
<!--navigation end -->
         
        
   
       
         
<div id="login" class="container" style="margin-top:60px"> 
    <div class="row" > 
        <div class="col-md-offset-4 col-md-4" id="box">
            <h2>Login</h2>

                <form class="form-horizontal" action="" method="post" id="contact_form">

                        <div class="form-group">

                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="username" placeholder="Username" class="form-control" type="text">
                                </div>

                            </div>
                        </div>


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
                                <button type="submit" class="btn btn-md btn-success pull-right" name="login" >Login </button>
                            </div>
                        </div>
                </form>
            <hr>
        </div> 
    </div>
 </div>  

</body>
</html> 