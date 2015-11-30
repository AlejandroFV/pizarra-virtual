<?php
include 'conexion_bd.php';

$sql = "SELECT Student.specialty, Student.latitude, Student.longitude, Student.group, User.id, User.name, User.last_name FROM Student INNER JOIN User ON Student.id_user=User.id;";

if($students = mysqli_query($oLink,$sql)){
    $ids = array();
    $names = array();
    $specialties = array();
    $latitudes = array();
    $longitudes = array();
    $groups = array();
    while ($student = mysqli_fetch_assoc($students)) {
        $ids[] = $student["id"];
        $names[] = $student["name"] . " " . $student["last_name"];
        $specialties[] = $student["specialty"];
        $latitudes[] = $student["latitude"];
        $longitudes[] = $student["longitude"];
        $groups[] = $student["group"];
    }
    $log['ids'] = $ids;
    $log['names'] = $names;
    $log['specialties'] = $specialties;
    $log['latitudes'] = $latitudes;
    $log['longitudes'] = $longitudes;
    $log['groups'] = $groups;
}else{
    echo "ERROR: " . mysqli_error($oLink) . "\n" . $sql . "\n";
}

echo json_encode($log);

?>