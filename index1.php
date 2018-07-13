
<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/title.php"; ?>

<div class="container">
  <div class="row">
    
    <div class="col-md-12"> 
      
      <div class="panel">
        <div class="panel-body">  
        
        <?php if(isset($_SESSION['user_id'])){ //only users can post status 
            include 'includes/status.php'; } 
?>
        
         
        <!--start of status--> 
        <?php //for posting status
    echo 'ulala'; 
    
    if(empty($_POST['status'])){
        
    }
    else if(isset($_POST['submitpost'])) 
        
    {
        echo 'submit clicked';
        $post_content= $_POST['status'];
        $user_id= $_SESSION['user_id'];
        echo $user_id;
        $user_name= $_SESSION['user'];
        $post_date= date("l jS \of F Y h:i:s A");
        echo $user_name;
        
        //$query= "INSERT INTO `posts`(`post_id` , `post_author`,`post_content`) VALUES ('','$user_name','$post_content')";
        //echo $query; 
        
        $query="INSERT INTO `posts`(`post_id`,`user_id`, `post_author`, `post_date`, `post_content`) VALUES ('','$user_id','$user_name','$post_date','$post_content')"; 
        echo $query;
        $run_query= mysqli_query($connection,$query);
    }
?> 

        <?php //showing status
            //$query= 'SELECT * FROM `posts` ORDER BY post_id DESC';
            $query= "SELECT * FROM posts LEFT JOIN login ON posts.user_id = login.user_id ORDER BY post_id DESC";
            $run_query= mysqli_query($connection,$query); 
            
            
           // $query1= "SELECT * FROM `login` WHERE user_id='$user_id'";
            //$run_query1= mysqli_query($connection,$query1); 
            //while($row1=mysqli_fetch_assoc($run_query)){
                //$first_name= $row1['first_name'];
                //$last_name= $row1['last_name'];
            
            
            while($row=mysqli_fetch_assoc($run_query)){
            
                //$post_title= $row['post_title'];
                $post_author= $row['post_author'];
                $post_date= $row['post_date'];
                $post_content= $row['post_content']; 
                $first_name= $row['first_name'];
                $last_name= $row['last_name'];
                $user_id= $row['user_id'];
            

                
                
        ?> 
              
         <!--/stories-->
         		  
          <div class="row"> 
             
            <br>
            <div class="col-md-2 col-sm-3 text-center">
              <a class="story-img" href="#"><img src="//placehold.it/100" style="width:50px;height:50px"></a>
              
            </div>
            <div class="col-md-10 col-sm-9">
              
               
              <div class="row">
                <div class="col-xs-9">
                   <h4><a style="color: skyblue;" href="userprofile.php?user_id=<?php echo $row['user_id']; ?> "> <?php echo $first_name.' '.$last_name; ?> </a> </h4>
                   <p style="color: darkgray"><?php echo $post_date ?></p>     
                  <h4><?php echo $post_content; ?> </h4> 
                  <?php $a = $user_id; ?>  
                  <?php echo $a; ?> 
                  <form action="" method="post">       
                      <ul class="list-inline">
                    
                     
                        <li><button class="btn btn-info btn-xs">Comment</button></li> 
                      
                        <li><button name="takechallenge" class="btn btn-success btn-xs" type="submit"><a style="color: White" href="a.php?user_id=<?php echo $a; ?>">Take The Challenge</a></button></li>
                         
                     </form>
                     
                  </div> 
                  
                  
                  
                <div class="col-xs-3"></div>
              </div>
              <br><br>
            </div>
          </div>
          <hr>
               
                
            
        <?php }  ?>
        
          
         
          <!--/stories-->
          
          
          <a href="/" class="btn btn-primary pull-right btnNext">More <i class="glyphicon glyphicon-chevron-right"></i></a>
        
          
        </div>
      </div>
                                                                                       
	                                                
                                                      
   	</div><!--/col-12-->
  </div>
</div>
                                                
                                                                                





<?php include "includes/footer.php"; ?>
