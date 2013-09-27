
<?php

echo $_POST['role'];
/*include('dbconnection.php');

$query = "SELECT userID FROM User Where userName = 'admin'";
$result = mysqli_query($con, $query);
$user = '1';
while($row = mysqli_fetch_array($result)){
 $user = $row['userID'];
}
echo $user;

$query = "SELECT roleID FROM Role Where roleName = 'guest'";
$result = mysqli_query($con, $query);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
$role = '2';
while($row = mysqli_fetch_array($result)){
 $user = $row['roleID'];
}
echo $user; */
?>