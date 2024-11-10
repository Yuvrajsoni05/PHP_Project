<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$db  = 'bill';


$conn = mysqli_connect($servername,$username, $password,$db);

if(!$conn){
	die("Connection Failed ".mysqli_connect_error());
}

$table = "CREATE TABLE billdata (
    id INT AUTO_INCREMENT PRIMARY KEY,        
    name VARCHAR(200) NOT NULL,               
    phone_number VARCHAR(15) NOT NULL,        
    village_name VARCHAR(200) NOT NULL,       
    gender ENUM('Male', 'Female') NOT NULL,   
    item VARCHAR(100) NOT NULL,              
    price DECIMAL(10, 2) NOT NULL,            
    weight DECIMAL(10, 2) NOT NULL,           
    majuri DECIMAL(10, 2) NOT NULL,           
    discount_percentage DECIMAL(5, 2) NOT NULL, 
    amount DECIMAL(10, 2) NOT NULL,          
    payment_method ENUM('Credit Card', 'Debit Card', 'PayPal', 'Cash') NOT NULL  
)";

if(mysqli_query($conn , $table)){
	echo "Table Created ";
}
else{
	echo "Table Not Created";
}
mysqli_close($conn)



?>
