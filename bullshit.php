<?php
    // function time_has_passed($t){
    //     $cur_t = time();
    //     $cur_hour = idate('h');
    //     $cur_min = idate('i');
    //     if(date('A')== 'PM'){
    //         $cur_hour+=12;
    //     }
    //     $cur_hour-=3;
    //     if($cur_hour != '0'){
    //         $cur_hour-=1;
    //     }else{
    //         $cur_hour = 21;
    //     }
    //     // echo $cur_hour;
    //     $h = explode(':', $t)[0];
    //     $m = @explode(':', $t)[1];
    //     // if()
    //     if($cur_hour>$h || $h==$cur_hour && $cur_min>$m){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
    // function it_is_time($t){
    //     $cur_t = time();
    //     $cur_hour = idate('h');
    //     $cur_min = idate('i');
    //     if(date('A')== 'PM'){
    //         $cur_hour+=12;
    //     }
    //     if($cur_hour != '0'){
    //         $cur_hour-=4;
    //     }else{
    //         $cur_hour = 21;
    //     }
    //     $h = explode(':', $t)[0];
    //     $m = @explode(':', $t)[1];
    //     if($h - $cur_hour == 1 && $cur_min > 30){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
    // echo time_has_passed('13:00');
    // $cur_hour = idate('h');
    // echo $cur_hour;
    // echo idate('h').':';
    // echo idate('i').':';
    // echo idate('s');
    // if(isset($_POST['time'])){
    //     $_SERVER['time'] = $_POST['time'];
    // }
    // echo $_SERVER['time'];
function passed($str){

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://futminna.herokuapp.com/",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => array("hi: hello"),
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
    ),
    ));

    $response = curl_exec($curl);
    $out = json_decode($response, true);
    curl_close($curl);
    return $out[$str];
    // var_dump($response);
}

?>