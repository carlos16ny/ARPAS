<?php 

session_start();
require_once '../../assets/php/classes/classHosted.php';
require_once '../../assets/php/classes/classRoom.php';

$hosted = new Hosted();
$room = new Room();

if(isset($_POST)){

  $data = file_get_contents( "php://input");
  $data = json_decode($data);

  $days = array();
  $rooms = array();

  $user_id = $_SESSION['id_user'];

  $quartos = array();

  $datas = $data->datas;

  forEach($datas as $key => $day){
    // print_r($day . ' - ' . $key);
    // print_r('<br>');
    $d = DateTime::createFromFormat('d/m/Y', $day);
    $q = $hosted->getRoomByDay($d->format('Y-m-d'))->fetchAll(PDO::FETCH_COLUMN);

    // print_r($q);
    // print_r('<br>');
    if($key == 0){
        $quartos = $q;
    }else{
        $quartos = array_intersect($quartos, $q);
    }
  }

    // print_r('<br>');
    // print_r('<br>');
    // print_r($quartos);

    $room_num = array();

    forEach($quartos as $quarto){
        array_push($room_num, $room->getRoomNumById($quarto)->fetch(PDO::FETCH_COLUMN));
    }

    $quartos = array(
        "id_quartos" => $quartos,
        "room_num" => $room_num
    );


    echo(json_encode($quartos, JSON_UNESCAPED_UNICODE));


    
 
}

?>