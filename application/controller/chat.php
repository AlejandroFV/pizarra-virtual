<?php

/*$sDBServer = "localhost";
$sDBName = "chat";
$sDBUsername = "root";
$sDBPassword = "";
$oLink = new mysqli($sDBServer,$sDBUsername,$sDBPassword,$sDBName);

if ($oLink->connect_errno) {
    echo "Connect failed: " . $oLink->connect_error;
    exit();
}*/

$function = $_POST['function'];

include 'conexion_bd.php';

$log = array();

switch($function) {

    case('getState'):
        $room = $_POST['room'];
        //$sql = "SELECT * FROM `messege` AS Messege WHERE Messege.`group`=$room";
        $sql = "SELECT * FROM `messege` AS Messege WHERE Messege.`group`=$room";
        //if($result = $oLink->query($sql)){
        if($result = mysqli_query($oLink,$sql)){
            //$log['state'] = $result->num_rows;
            $log['state'] = mysqli_affected_rows($oLink);
        }else{
            echo "ERROR: " . mysqli_error($oLink) . "\n" . $sql . "\n";
        }
        break;

    case('history'):
        $room = $_POST['room'];
        $sql = "SELECT * FROM `messege` AS Messege WHERE Messege.`group`=$room";
        if($result = mysqli_query($oLink,$sql)){
            while ($fila = mysqli_fetch_assoc($result)) {
                $text[] = "<span>" . $fila["user"] . "</span>" .$fila["messege"];
            }
            $log['text'] = $text;
        }else{
            echo "ERROR: " . mysqli_error($oLink) . "\n" . $sql . "\n";
        }
        break;

    case('update'):
        $state = $_POST['state'];
        $room = $_POST['room'];
        $sql = "SELECT * FROM `messege` AS Messege WHERE Messege.`group`=$room";
        if($result = mysqli_query($oLink,$sql)){
            $count = mysqli_affected_rows($oLink);

            if($state == $count){
                $log['state'] = $state;
                $log['text'] = false;
                while ($fila = mysqli_fetch_assoc($result)) {
                    $log['lastId'] = $fila["id"];
                }
            }
            else{
                $lastId = $_POST['lastId'];
                $text= array();
                $log['state'] = $count;

                while ($fila = mysqli_fetch_assoc($result)) {
                    if(($fila["id"]-1) >= $lastId){
                        $text[] = "<span>" . $fila["user"] . "</span>" .$fila["messege"];
                    }
                }
                $log['text'] = $text;
            }
        }else{
            echo "ERROR: " . mysqli_error($oLink);
        }

        break;

    case('send'):
        $room = $_POST['room'];
        $nickname = htmlentities(strip_tags($_POST['nickname']));
        $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
        $message = htmlentities(strip_tags($_POST['message']));
        if(($message) != "\n"){

            if(preg_match($reg_exUrl, $message, $url)) {
                $message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
            }

            $message = str_replace("\n", " ", $message);

            $sql = "INSERT INTO messege (user, messege, `group`) values ('$nickname','$message', $room)";
            if(!$result = mysqli_query($oLink,$sql))
                echo "ERROR: " . mysqli_error($oLink);
        }
        break;
}

echo json_encode($log);

?>