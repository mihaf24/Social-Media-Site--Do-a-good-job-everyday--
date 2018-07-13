<?php
    $connection= mysqli_connect("localhost","root","","projectc");
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Do a good job</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="status.css">
   
     <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css"> 
</head>
<body>
 <!-- navigation start -->
  
   <?php if(isset($_SESSION['user'])) { ?>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Do a Good Job</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
       <li><a href="userprofile.php">welcome <?php echo $_SESSION['user']; ?></a></li>
       <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav> 
  
  <?php } else { ?>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Do a Good Job</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav> 
 
<?php } ?>
  
 <!-- navigation finish -->
   
   
<div class="container">
	
    <?php if(isset($_SESSION['user'])){ ?>
     <!-- status box start. only users can post status -->
    <div class="row">
    
        <div class="col-md-12">
    						
				<div class="status-upload">
				        <form action="" method="post" name="form" id="form">
								<textarea id="status" name="status" placeholder="What are you doing right now?" ></textarea>
										
								<button type="button" id="submit" onclick="send(this.value); ajaxshow1(); " class="btn btn-success green"><i class="fa fa-share"></i> Share</button> 
                                <input id="username" type="hidden" value="<?php echo $_SESSION['user']?>">
										
										 
										
				        </form>
				        
									
				</div><!-- Status Upload  -->
							
        </div> 
        
    </div>
    <br><br>  
    <?php } ?> 
    
    		
    
      
    
<script>
    

</script>
    
   
    
    
    <?php
    $count=0;
   
	$sql="SELECT * FROM `posts` LEFT JOIN login ON posts.username = login.username ORDER BY post_id desc";
	$res=mysqli_query($connection,$sql);
	if($res)
	{
		while($row=mysqli_fetch_array($res)){ 
                
                $post_id= $row['post_id'];
                $username= $row['username'];
                $post_date= $row['post_date'];
                $status= $row['status']; 
                $first_name= $row['first_name'];
                $last_name= $row['last_name'];
                $user_id= $row['user_id'];
                $count++;
    
    
    
    
    ?>
    
     <!-- stories start -->
    <div>		
       <div id="show" class="row">
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
                    
                     
                        <li><button type="button" id="comment1" class="btn btn-info btn-xs ">Comment</button></li>
                        
                        <input type="text" value="<?php echo $post_id; ?>" id="post_id">
                        
                        
                        <li><button name="takechallenge" class="btn btn-success btn-xs" type="button"><a style="color: White" href="a.php?user_id=<?php echo $a; ?>">Take The Challenge</a></button></li>
                      </ul>    
                    </form> 
                     
                      <!-- comment box start --> 
                    <div class="row">
                       <div class="col-md-12">
                        <div class="status-upload">
                            <form action="" method="post" name="commentform" id="commentform">
                                    <textarea class="comment" id="comment<?php echo $post_id; ?>" rows="2" name="comment" placeholder="Comment"></textarea>

                                    <button value="<?php echo $post_id; ?>" type="button" id="commentSubmit<?php echo $post_id; ?>" onclick="send1(this.value); ajaxshow2(this.value); ajaxshow22(this.value);  " class="btn btn-success green" ><i class="fa fa-share"></i> Post Comment</button> 
                                    <input id="username" type="text" value="<?php echo $_SESSION['user'] ?>">
                                    
                                    
                            </form>


                     </div>
                    </div> 
                </div> 
                      
                    <!-- comment box end -->
                     
                      <p id="show<?php echo $post_id; ?>"></p>
                       
                </div> 
        
           </div>
            
        </div> 
        
        
    </div> 
    </div> 
        
<?php } } ?>
 <!-- stories end -->		
	

</div>  

  <script>
        
      
        //this is posting status. sending data to db silently.
        function send(mihaf){
            var status1= document.getElementById("status").value; 
            var username= document.getElementById("username").value;
            
            
            var datastring= 'statuss=' + status1 + '&usernamee=' + username;
            //alert(datastring); 
            
            
            if(status1!= "")
                {
                    $.ajax({
                    type:"POST",
                    url:"process.php",
                    data: datastring,
                    success: function(html){
                    //alert(html);
                            }
                        }); 
                }
            
            document.getElementById("status").value= "";
            
        }
      
      //these are for showing status
      
      function ajaxshow1()
      {
          setInterval(function(){ajaxshow();},1000);
      }
      
      function ajaxshow(){
          
          var xmlhttpr;
          var mihaf="yo";
          var xmlhttpr= new XMLHttpRequest();
          
          xmlhttpr.onreadystatechange = function(){
              if(this.readyState==4 && this.status==200)
                  document.getElementById("show").innerHTML=this.responseText;
          }; 
          xmlhttpr.open("GET","process2.php?q="+mihaf,true);
          xmlhttpr.send();
          
      }  
      
      
      //not working. tried to show the comment box after clicking the comment btn
      
        $(document).ready(function(){
            $("#comment1").click(function(){
            $("#commenrform").show(300);
    });
    
}); 
    
    
    //this is posting comments using ajax. sending data to db silently.
        function send1(mihaf){ 
            
            
            var gaba= "comment"+mihaf;
            var comment1= document.getElementById(gaba).value;        
            var username= document.getElementById("username").value;
            var postid= mihaf;
            
            

            var datastring= 'comments=' + comment1 + '&usernamee=' + username + '&postId=' + postid;
            
            //alert(datastring);
            if(comment1!="")
                {
                    $.ajax({
                    type:"POST",
                    url:"sendComment.php",
                    data: datastring,
                    success: function(html){
                        //alert(html);
                            }
                        }); 
                }
            
            document.getElementById(gaba).value= "";
            
        }
    
        
        //this script is for showing the comments in the respective status using ajax
    
        function ajaxshow22(y)
      { 
          var x=y;
          setInterval(function(){ajaxshow2(x);},1000);
      }

       
      
      function ajaxshow2(x){
          
          var gaba1= 'commentSubmit'+x;
          var id= document.getElementById(gaba1).value;
          //alert('yp'+id);
          var xmlhttpr;
          var xmlhttpr= new XMLHttpRequest();
          
          xmlhttpr.onreadystatechange = function(){
              if(this.readyState==4 && this.status==200)
                  document.getElementById("show"+id).innerHTML=this.responseText;
          }; 
          xmlhttpr.open("GET","showComment.php?q="+id,true);
          xmlhttpr.send();
          
      }  
      
      
      
    </script>
   
  
    
</body>
</html>