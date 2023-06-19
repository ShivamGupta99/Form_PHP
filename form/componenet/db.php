<?php
$servername="localhost";
$username="root";
$password="";
$databae="newlogin";
$conn=mysqli_connect($servername,$username,$password,$databae);
if(!$conn){
    die("Connection was lost due to--->".mysqli_connect_error());
}
// else{
//     echo"successfully done";
// }
?>