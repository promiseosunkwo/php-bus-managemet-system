<?php

// $root = $_SERVER['DOCUMENT_ROOT'].'/banking/';
// $server = $_SERVER['SERVER_NAME'];
// $host = $_SERVER['HTTP_HOST'];
// $self = $_SERVER['PHP_SELF'];
// require_once('includes/load.php');
if (!class_exists('DB')) {
  class DB {
    public function __construct(){
    $mysqli = new mysqli('localhost','root','','transport');
    if ($mysqli->connect_errno) {
    printf("connect failed %s\n", $mysqli->connect_error);
    exit();
}
  $this->conn = $mysqli;
}

public function  get_results($query){
  $result = $this->conn->query($query);
  return $result;
  while ($row = $result->fetch_object()) {
  $results[] = $row;
}

}

public function insert($table,$fields,$values){
if (empty($table)||empty($values)) {
  return false;
}
// $fields = array();
// $values = array();

$fields = implode(',', $fields);
$values = implode("', '", $values);
$query = "INSERT INTO $table(ID, $fields) VALUES('','$values')";
if (!$this->conn->query($query)) {
  return false;
}
return true;
}

public function query($query){
return $this->conn->query($query);
}

public function update($query){
$result = $this->conn->query($query);
return $result;
}


public function clean($array){
  $result = array_map(array($this->conn,'MySQLi::real_escape_string'), $array);
  return $result;
}

public function clean_string($string){
$result = mysqli_real_escape_string($this->conn,$string);
  return $result;
}


public function select($query){
  $results = array();
  $result = $this->conn->query($query);
  if (!$result) {
    return false;
  }
  while ($obj = $result->fetch_object()) {
  $results[] = $obj;
 }
  return $results;
 }







}
}
$db = new DB;
 ?>






























































































<?php
// public function insert($table,$fields,$values){
// $fields = implode(", ", $fields);
// $values = implode("', '", $values);
// $query = "INSERT INTO $table(id, $fields) VALUES('','$values')";
// if (!mysqli_query($this->conn,$query)) {
//   die();
// }
// return true;
// }





// public function clean($array){
//   return array_map('mysqli_real_escape_string',$array);
// }

  // public function hash_password($password){
  //   $scurehash = md5($password);
  //   return $securehash;
  // }








 // if (!class_exists('DB')) {
 //   class DB{
 //     public function __construct(){
 //     $mysqli = new mysqli('localhost', 'root', '', 'facebook2');
 //     if ($mysqli->connect_errno) {
 //     printf("connect failed %s\n", $mysqli->connect_error);
 //     exit();
 // }
 //     $this->conn = $mysqli;
 // }
 //     public function insert($query){
 //     $result = $this->conn->query($query);
 //     return $result;
 // }
 //
 //    public function update($query){
 //    $result = $this->conn->query($query);
 //    return $result;
 // }
 //
 //    public function select($query){
 //    $result = $this->conn->query($query);
 //    return $results;
 //    if (!$result) {
 //    return false;
 //    }
 //    while ($obj = $result->fetch_object()){
 //    $results[] = $obj;
 // }
 //    return $results;
 // }
 // }
 // $db = new DB;

 // public function query($query){
 //   $result = $this->conn->query($query);
 //   while ($row = $result->fetch_object()) {
 //   $results[] = $row;
 //   }
 //   return $results;
 // }
 // public function get_results($query,$params = array()){
 //   if (empty($params)) {
 //   return $this->db->query($query);
 //   }
 //   if (!$stmt = $this->db->prepare($query)) {
 //   return false;
 //   }
 //   $stmt->execute($params);
 //   while ($row = $stmt->fetch()) {
 //   $results[] = $row;
 //   }
 //   if (!empty($results)) {
 //   return $results;
 //   }
 //   return false;
 // }
 // public function get_row($table,$id){
 //   $stmt = $this->db->prepare("SELECT * FROM {$table} WHERE ID = :id ");
 //   $stmt->execute(array('id' => $id));
 //   $result = $stmt->fetch();
 //   return $result;
 // }
 // public function insert(){
 //
 // }

 // public function __construct($db_name,$db_user,$db_pass,$db_charset,$db_host = 'localhost'){
 //   $dsn = "msql:host= $db_host;$db_name;charset=$db_charset";
 //   $options = array(
 //     PDO::ATTR_ERRMODE                 => PDO::ERRMODE_EXCEPTION,
 //     PDO::ATTR_DEFAULT_FETCH_MODE      => PDO::FETCH_OBJ,
 //     PDO::ATTR_EMULATE_PREPARES        => PDO::FALSE,
 // );
 //     $this_db = new PDO($dsn,$db_user,$db_pass,$options );


 ?>
