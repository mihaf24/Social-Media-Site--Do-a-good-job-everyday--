   <?php 
    include 'includes/header.php';
    include 'includes/db.php';
    include 'includes/navigation.php'; 
    //echo $_SESSION['user_id'];

    if(isset($_GET['user_id']))
    {
        $user_id= $_GET['user_id'];
        echo $user_id;
    }

    else {
        $user_id= $_SESSION['user_id'];
    } 
    echo $user_id;

     $query= "SELECT * FROM `login` WHERE user_id= $user_id ";
    $run_query= mysqli_query($connection,$query);
    echo $query;
    
     while($row=mysqli_fetch_assoc($run_query)){
        $first_name=$row['first_name'];
        $last_name=$row['last_name'];

    //$username= $_SESSION['user'];
    

    //echo 'userprofile';

    if(isset($_POST['takechallenge'])){
        echo "yoy have clicked $a post";     
    }
     
    
   
    }
?>



<style>
    <?php include 'userprofile.css'; ?>

</style>
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
	<div class="row panel">
		
        <div class="col-md-12  col-xs-12">
           <img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="img-thumbnail picture hidden-xs" />
           <img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="img-thumbnail visible-xs picture_mob" />
           <div class="header">
                <h1><?php echo $first_name.' '.$last_name; ?></h1>
                <h4>Web Developer</h4>
                <span>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."</span>
           </div>
        </div>
    </div>   
    
	
</div> 

<?php //showing status
            $query= "SELECT * FROM posts WHERE posts.user_id=$user_id ORDER BY post_id DESC";
            $run_query= mysqli_query($connection,$query);
            
            while($row=mysqli_fetch_assoc($run_query)){
                //$post_author= $row['post_author'];
                $post_date= $row['post_date'];
                $post_content= $row['post_content']; 
                
                
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
                   <h4><a style="color: skyblue;" href=""> <?php echo $first_name.' '.$last_name; ?> </a> </h4>
                   <p style="color: darkgray"><?php echo $post_date; ?></p>     
                  <h4><?php echo $post_content; ?> </h4>          
                  <ul class="list-inline">
                     
                     <li><button class="btn btn-info btn-xs">Comment</button></li> 
                      
                      <li><button name="takechallenge" class="btn btn-success btn-xs" type="button"><a style="color: White" href="userprofile.php">Take The Challenge</a></button></li>
                  </div> 
                  
                  
                  
                <div class="col-xs-3"></div>
              </div>
              <br><br>
            </div>
          </div>
          <hr>
               
                
            
        <?php } ?>
        
          
         
          <!--/stories-->

