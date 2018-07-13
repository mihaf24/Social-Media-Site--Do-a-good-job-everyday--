<?php  
   
    $data1=$_POST['comments'];
    $data2= $_POST['usernamee'];
    $data3= date("l jS \of F Y h:i:s A");
    $data4= $_POST['postId'];
    $connection= mysqli_connect("localhost","root","","projectc");
    
    if(isset($_POST['usernamee']))
	{	
		$sql="INSERT INTO `comment`(`comment_id`, `post_id`, `username`, `comment`, `date`) VALUES ('','$data4','$data2','$data1','$data3')";
		$result=mysqli_query($connection,$sql);
        
		/*if($result)
			echo "done";
		else
			echo "not done";*/
	}
?>