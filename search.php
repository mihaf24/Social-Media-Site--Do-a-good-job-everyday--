
<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/title.php"; ?>

<div class="container">
  <div class="row">
    
    <div class="col-md-12"> 
      
      <div class="panel">
        <div class="panel-body"> 
        
        
<?php
           if(isset($_POST['submita'])){
            echo $search = $_POST['search'];
               
               $search_query= "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
               $run_search_query= mysqli_query($connection,$search_query);
               if(!$run_search_query)
               {
                   die("Query Failed".mysqli_error($connection));
               } 
               
               $count= mysqli_num_rows($run_search_query);
               if($count<1)
               {
                   echo '<h2 style="text-align: center"> No result </h2>';
               } 
               else
               {
                   
            
            while($row=mysqli_fetch_assoc($run_search_query)){
                $post_title= $row['post_title'];
                $post_author= $row['post_author'];
                $post_date= $row['post_date'];
                $post_content= $row['post_content'];
                $post_tags= $row['post_tags']; 
        
    ?> 
              
         <!--/stories-->
		  
          <div class="row">  
           
            <br>
            <div class="col-md-2 col-sm-3 text-center">
              <a class="story-img" href="#"><img src="//placehold.it/100" style="width:100px;height:100px" class="img-circle"></a>
            </div>
            <div class="col-md-10 col-sm-9">
              <h3><?php echo $post_title; ?> </h3> <br>
              <h5>By <a style="color: skyblue;" href=""> <?php echo $post_author; ?> </a> </h5> 
              <div class="row">
                <div class="col-xs-9">
                        
                  <p><?php echo $post_content; ?> </p>
                  <p class="lead"><button class="btn btn-default">Read More</button></p>
                  <p class="pull-right"><span class="label label-default">keyword</span> <span class="label label-default">tag</span> <span class="label label-default">post</span></p>
                  <ul class="list-inline"><li><a href="#">1 Week Ago</a></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i> 4 Comments</a></li><li><a href="#"><i class="glyphicon glyphicon-share"></i> 34 Shares</a></li></ul>
                  </div>
                <div class="col-xs-3"></div>
              </div>
              <br><br>
            </div>
          </div>
          <hr>
 <?php
               }
            }
            
         } 
    ?>
        
          
         
          <!--/stories-->
          
          
          <a href="/" class="btn btn-primary pull-right btnNext">More <i class="glyphicon glyphicon-chevron-right"></i></a>
        
          
        </div>
      </div>
                                                                                       
	                                                
                                                      
   	</div><!--/col-12-->
  </div>
</div>
                                                
                                                                                





<?php include "includes/footer.php"; ?>
