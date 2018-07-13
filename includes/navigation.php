<?php //login
    //include 'includes/db.php'; 
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
            
           // header ('location: index.php');
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



<?php

    if (isset($_SESSION['user_id'])) { ?>
<header class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="index.php" class="navbar-brand">Home</a>
    </div>
    <nav class="collapse navbar-collapse" role="navigation"> 
      <ul class="nav navbar-right navbar-nav">
    
       <li><a href="">welcome <?php echo $_SESSION['user']; ?></a></li>
       
       <li><a href="logout.php">Logout</a></li>
       
       <!-- search option
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-search"></i></a>
          <ul class="dropdown-menu" style="padding:12px;">
            <form class="form-inline" method="post" action="search.php">
            	<div class="input-group">
                  <input name="search" type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="submita" >Go!</button>
                  </span>
            	</div>
            </form>
          </ul>
        </li> 
        
    -->
        
      </ul>
    </nav>
  </div>
</header>
      
      
     
        
        
    <?php } else { ?>


<header class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="index.php" class="navbar-brand">Home</a>
    </div>
    <nav class="collapse navbar-collapse" role="navigation">
      <ul class="nav navbar-right navbar-nav"> 
       
       
        <form method="post" action="" class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-default" name="login">Sign In</button>     
        </form>
               
        <button onclick="location.href='./signup.php'" type="button" class="btn btn-success btna">Sign Up</button>
        
        
        <!-- search option
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-search"></i></a>
          <ul class="dropdown-menu" style="padding:12px;">
            <form class="form-inline" method="post" action="search.php">
            	<div class="input-group">
                  <input name="search" type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="submita" >Go!</button>
                  </span>
            	</div>
            </form>
          </ul>
        </li> 
        
        -->
        
      </ul>
    </nav>
  </div>
</header> 

<?php } ?>