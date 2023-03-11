<?php
$conn = new mysqli('localhost','root','','learning');
if($conn->connect_error){
    die("ket noi that bai:".$conn->connect_error);
}
function insertUser($username,$password,$conn){
    $sql = "INSERT INTO user (username, password)
        Values ('$username','$password') ";
    if($conn->query($sql)){
        echo 'thanh cong'.$username;
        
    }
    else{
        echo 'loi:'.$sql.$conn->error;
    }

}
// insertUser('nguyenA','123456',$conn);
// insertUser('nguyenB','123456',$conn);
// insertUser('nguyenC','123456',$conn);
// insertUser('nguyenD','123456',$conn);

function update($id,$password,$conn){
    $sql ="UPDATE user SET password ='$password' WHERE id=$id";
    if($conn->query($sql)){
        echo 'update thanh cong';
    }
    else {
        echo 'update that bai';
    }

}
// update(1,'passmoi',$conn);
function delete($id,$conn){
    $sql ="delete from user where id=$id";
    if($conn->query($sql)){
        echo 'delete thanh cong';
    }
    else{
        echo 'delete that bai';
    }
}
// delete(1,$conn);
function selectuser($conn){
    $sql="select * from user";
    $result = $conn->query($sql);
    // echo '<pre>';
    // var_dump($result);
    // echo '</pre>';
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            echo "user:" . $row["username"].'<br>'.$row["password"].'<br>'.$row["created_at"].'<br>';
        }
    }
}
selectuser($conn);

$conn->close();

?>