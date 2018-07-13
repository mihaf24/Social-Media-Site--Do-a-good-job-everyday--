<?php
    $res=$_REQUEST['q'];
	$connection=mysqli_connect("localhost","root","","projectc");
	$sql="SELECT * FROM `posts` LEFT JOIN login ON posts.username = login.username ORDER BY post_id desc";
	$res=mysqli_query($connection,$sql);
	if($res)
	{
		while($row=mysqli_fetch_array($res)){ 
		
        $username= $row['username'];
        $post_date= $row['post_date'];
        $status= $row['status']; 
        $first_name= $row['first_name'];
        $last_name= $row['last_name'];
        $user_id= $row['user_id']; ?>
        
        <div class="row">
        <div class="col-md-2 col-sm-3 text-center">
           <a class="story-img" href="#"><img src="//placehold.it/100" alt="" style="width:50px;height:50px"></a>
        </div>
        <div class="col-md-10 col-sm-9">
           <div class="row">
              <div class="col-xs-9">
                   <h4><a style="color: skyblue;" href="userprofile.php?user_id=<?php echo $row['user_id']; ?> "> <?php echo $first_name.' '.$last_name; ?> </a> </h4>
                   <p style="color: darkgray"><?php echo $post_date ?></p>     
                  <h4><?php echo $status; ?> </h4> 
                  <?php $a = $user_id; ?>  
                  <?php echo $a; ?> 
                  <form action="" method="post">       
                      <ul class="list-inline">
                    
                     
                        <li><button class="btn btn-info btn-xs">Comment</button></li> 
                      
                        <li><button name="takechallenge" class="btn btn-success btn-xs" type="submit"><a style="color: White" href="a.php?user_id=<?php echo $a; ?>">Take The Challenge</a></button></li>
                      </ul>    
                    </form>
                       
                </div>
               
               
           </div>
            
        </div>
    </div>
			
		
	<?php } } ?>



 