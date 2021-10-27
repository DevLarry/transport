<?php
class bus {
    var $name;
    protected $id;
    var $availableSeats;
    var $phone;
    var $email;
    var $make;
    var $color;
    protected $totalSeats;
    protected $reserved;
    var $view;
    var $passport;
    var $going;
    var $to;
    var $status;
    public function __construct($bus){
        $this -> name = $bus['name'];
        $this -> id = $bus['id'];
        $this -> phone = $bus['phone'];
        $this -> email = $bus['email'];
        $this -> make = $bus['make'];
        $this -> color = $bus['color'];
        $this -> totalSeats = $bus['seats'];
        $this -> reserved = $bus['reserved'];
        $this -> view = $bus['view'];
        $this -> passport = $bus['passport'];
        $this -> availableSeats = $bus['available'];
        $this -> to = $bus['to'];
        $this -> status = $bus['status'];

    }
    public function getId(){
        return $this -> id;
    }
    public function getTotalSeats(){
        return $this -> make;
    }
    public function update($key, $value, $conn){
        $sql = "UPDATE buses SET '$key' = '$value'";
        mysqli_query($sql, $conn);
    }
}
?>