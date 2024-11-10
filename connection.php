<html>
<head>
<title>connection page</title>
</head>
<body>
<h1>This is connection page</h1>
<?php

$server = 'localhost';
$username = 'root';
$password  = '';

$conn = mysqli_connect($server,$username,$password);

if(!$conn){
	die("Connection Failed ".mysqli_connect_error());
	
}

$sql = "CREATE DATABASE bill";
if(mysqli_query($conn,$sql)){
	echo"Data Base Created ";
	
}
else {
	echo "Data Base Not Created ";

}
mysqli_close($conn);

?>


</body>
</html>
