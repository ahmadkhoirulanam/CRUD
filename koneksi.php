<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "informatika";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("koneksi gagal: " .mysqli_connect_error());
    }

    function baseurl($link=''){
        //$baseurl="http://localhost/simekar/";
        $baseurl="http://localhost/web4a/";
        
        if(!empty($link)){
            $url=$baseurl.$link;
        }else{
            $url=$baseurl;
        }
        return $url;
    }
    function redirectto($url="",$second=0){
        $redirecto = '<meta http-equiv="refresh" content="'.$second.';url='.baseurl($url).'">';
        echo $redirecto;die;
    }
?>