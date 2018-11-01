<?php
session_start();
require_once '../../assets/php/classes/classHosted.php';
require_once '../../assets/php/classes/classUser.php';

$hosted = new Hosted();


if(isset($_POST)){

  $data = file_get_contents( "php://input");
  $data = json_decode($data);

  $days = array();
  $rooms = array();

  $user_id = $_SESSION['id_user'];

  foreach($data as $key => $val){
    foreach($val as $v){
      if($key == "days"){
        array_push($days, $v);
      }else if($key == "rooms"){
        array_push($rooms, explode(" ",$v)[1]);
      }
    }
  }

  // print_r($days);
  // print_r($rooms);

  $result = array();

  foreach($days as $key => $day){
    array_push($result , $hosted->reserveRoomByDay($day, $rooms[$key], $user_id));
  }

  echo(json_encode($result, JSON_UNESCAPED_UNICODE));

}else{
  echo false;
}
?>