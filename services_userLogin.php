<?php
     $connect= mysqli_connect("localhost" , "root" ,"" , "rest" );

    if(isset($_GET('username')) && isset($_GET('password'))){
     $username= $_GET('username');
     $password= $_GET('password');


     $query = mysqli_query($connect,"SELECT * FROM rest WHERE = '$username' and $password='$password'");
     $view = mysqli_fetch_assoc($query);
     if($query->num_rows > 0){
         $resp['staus'] = $view['status'];
         $resp['id'] = $view['id'];
         $resp['username'] = $view['username'];
         $resp['massage'] = "Data berhasil dikembalikan";
     }else{
         $resp['status'] = "0";
         $resp['massage'] = "maaf data tidak ditemukan";
     }
     }else {
        $resp['status'] = "0";
        $resp['massage'] = "userename dan password tidak sesuai";}


header('conten_type: application/json');
$response['response'] = $resp;
echo json_encode($response);
mysqli_close($connect)
?>