<?php  
   
    $data1=$_POST['statuss'];
    $data2= $_POST['usernamee'];
    $data3= date("l jS \of F Y h:i:s A");
    $connection= mysqli_connect("localhost","root","","projectc");
    
    if(isset($_POST['usernamee']))
	{	
		$sql="INSERT INTO `posts`(`post_id`, `username`, `post_date`, `status`) VALUES ('','$data2','$data3','$data1')";
		$result=mysqli_query($connection,$sql);
        
//		if($result)
//			echo "done";
//		else
//			echo "not done";
	}
?>