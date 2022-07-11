
<?php
require_once('load.php');


if (!class_exists('SELECTS')) {
   class SELECTS {


   public function load_single_user($id,$table){
   global $db;
   $query = "SELECT * FROM $table WHERE id = '$id'";
   $obj= $db->select($query);
   if (!$obj) {
    return false;
   }
   return $obj[0];
   }


   public function load_users($table){
   global $db;
   $query = "SELECT * FROM $table";
   $obj= $db->select($query);
   if (!$obj) {
    return false;
   }
   return $obj;
   }


public function delete_users($table,$del_id){
  global $db;
  $query = "DELETE FROM $table WHERE id = '$del_id'";
  $run = $db->query($query);
  return $run;
  }


  public function delete_bookings($table,$p_key){
    global $db;
    $query = "DELETE FROM $table WHERE p_key = '$p_key'";
    $run = $db->query($query);
    return $run;
    }


  public function search_bus($departure,$arrival,$table){
  global $db;
  $query = "SELECT * FROM $table WHERE departure = '$departure' AND arrival = '$arrival'";
  $obj= $db->select($query);
  if (!$obj) {
   return false;
  }
  return $obj[0];
  }



  public function search_bus_details($departure,$arrival,$table){
  global $db;
  $query = "SELECT * FROM $table WHERE departure = '$departure' AND arrival = '$arrival'";
  $obj= $db->query($query);
  $rows = mysqli_num_rows($obj);
  return $rows;
  // if ($rows > 0) {
  // while ($row = mysqli_fetch_array($query)) {
  // return $row;
  // }
  // }

}

public function get_suspended_bus($bus_id){
global $db;
$table = 'bus_management';
$query = $db->get_results("SELECT * FROM $table WHERE id = '$bus_id'");
$result = mysqli_num_rows($query);
if ($result == 1) {
while ($row = mysqli_fetch_assoc($query)) {
return $row['suspend_bus'];
}
}
}


public function get_avialable_seats($departure,$arrival,$date,$time){
global $db;
$seats = array();
$table = 'booked_seats';
$query = "SELECT * FROM $table WHERE departure = '$departure' AND arrival = '$arrival' AND  date_of_movement = '$date' AND time_of_movement = '$time'";
$book_seats = $db->select($query);
foreach ($book_seats as $book) {
$seats[] = $book->seat_position;
}
return $seats;
}





public function get_bookings($table){
    global $db;
    $query = "SELECT * FROM $table";
    $obj= $db->select($query);
    return $obj;
    }


    public function get_booking_details($table,$key){
        global $db;
        $query = "SELECT * FROM $table WHERE p_key = '$key'";
        $obj= $db->select($query);
        if (!$obj) {
        return false;
        }
        foreach ($obj as $key) {
        return $key;
        }
        }

      public function get_user_bookings($table,$id){
            global $db;
            $query = "SELECT * FROM $table WHERE user_id = '$id'";
            $obj= $db->select($query);
            return $obj;
            }






    //
    //
    //
    //   public function count_users($table){
    //     global $db;
    //     $query = "SELECT COUNT(account_no) AS user_sum  FROM $table WHERE verified = 1";
    //     $obj= $db->select($query);
    //     return $obj;
    //     }
    //
    //     public function count_unverfied_users($table){
    //       global $db;
    //       $query = "SELECT COUNT(account_no) AS user_sum  FROM $table WHERE verified = 0";
    //       $obj= $db->select($query);
    //       return $obj;
    //       }
    //
    //     public function sum_investment($table){
    //       global $db;
    //       $query = "SELECT SUM(investment) AS investment_sum  FROM $table";
    //       $obj= $db->select($query);
    //       return $obj;
    //       }
    //
    //
    //       public function sum_withdrawn($table){
    //         global $db;
    //         $query = "SELECT SUM(withdrawal) AS withdrawn_sum  FROM $table";
    //         $obj= $db->select($query);
    //         return $obj;
    //         }
    //
    //
    //
    //             public function get_is_reffered($refered_acc){
    //               // $refer_accs = array();
    //               global $db;
    //               $table = 'referrals';
    //               $query = $db->get_results("SELECT * FROM $table WHERE refered_acc = '$refered_acc'");
    //               $result = mysqli_num_rows($query);
    //               if ($result == 1) {
    //               while ($row = mysqli_fetch_assoc($query)) {
    //               return $row['refered_desposit'];
    //               }
    //             }
    //           }
    //
    //
    //
    //
    //
    //
    //       public function search_query($searchinput){
    //         global $db;
    //         $table = 'users';
    //         // $searchinput = $db->clean($post);
    //         $query = "SELECT * FROM $table WHERE account_no LIKE '%$searchinput%' OR first_name LIKE '%$searchinput%' OR last_name LIKE '%$searchinput%'
    //                   OR email LIKE '%$searchinput%' OR phone LIKE '%$searchinput%'";
    //         $obj = $db->select($query);
    //         return $obj;
    //         }
    //
    //
    //      public function forgot_password($email){
    //      global $db;
    //      $table = 'users';
    //      $server = $_SERVER['HTTP_HOST'];
    //      // $searchinput = $db->clean($post);
    //      $query = $db->get_results("SELECT * FROM $table WHERE email = '$email'");
    //      $rows = mysqli_num_rows($query);
    //      if ($rows  == 1) {
    //      while ($row = mysqli_fetch_assoc($query)) {
    //       $acc_no = $row['account_no'];
    //       }
    //
    //     }else {
    //       echo "<script>alert('Email does not exist in Database')</script>";
    //
    //     }
    //      }
    //
    //
    //      public function reset_password($pass1,$pass2,$email){
    //      global $db;
    //      $table = 'users';
    //      if ($pass1 !== $pass2) {
    //
    //        echo "<script>alert('New Passwords does not Match')</script>";
    //
    //     }elseif (strlen($pass1) < 8) {
    //      echo "<script>alert('Password Length must be 8 charcters and above')</script>";
    //      // exit();
    //
    //     }else{
    //       $pass1 = password_hash($pass1,PASSWORD_DEFAULT);
    //       $query = "UPDATE $table SET password = '$pass1' WHERE email = '$email'";
    //       $run = $db->query($query);
    //     }if ($run) {
    //     echo "<script>alert('Password updated successfully')</script>";
    //     header('location: login.php');
    //     }else {
    //     // $_SESSION['msg'] = "Something went wrong, contact admin";
    //     echo "<script>alert('Something went wrong, contact admin')</script>";
    //      // exit();
    //     }
    //      }
    //
    //
    //
    //
    //
    // //to get id of logged in user for profile
    //  public function user_profile_id($user){
    //  global $db;
    //  $query =$db->get_results("SELECT * FROM users WHERE name = '$user'");
    //  $result = mysqli_num_rows($query);
    //  if ($result == 1) {
    //  while ($row = mysqli_fetch_assoc($query)) {
    //   return $row['ID'];
    //  }
    //  }
    //  }
    //
    //  public function get_requester_info($user_id){
    //  global $db;
    //  $table = 'user';
    //  $query =$db->get_results("SELECT * FROM user WHERE ID = '$user_id'");
    //  $result = mysqli_num_rows($query);
    //  if ($result == 1) {
    //  while ($row = mysqli_fetch_assoc($query)) {
    //  return $row['username'];
    //  }
    //  }
    //  }
    //
    //  public function get_posts($user_id){
    //  global $db;
    //  $posts = array();
    //  $table = 'posts';
    //  $query = "SELECT * FROM $table WHERE user_id = '$user_id' ORDER BY post_date DESC";
    //  $obj= $db->select($query);
    //  foreach ($obj as $object) {
    //  $posts[] = $object;
    //  }
    //  return $posts;
    //
    //  }
    //
    //
    //
    //
    //
    //
    //
    //  public function do_friends_list($friends_array){
    //   $users = array();
    //   foreach ($friends_array as $friend_id) {
    //   $users[] = $this->load_user_object($friend_id);
    // }
    //   return $users;
    // }
    //
    // public function do_friends_request($friends_array){
    //  $users = array();
    //  foreach ($friends_array as $friend_id) {
    //  $users[] = $this->load_user_object($friend_id);
    // }
    //  return $users;
    // }

}
}


$select = new SELECTS;
 ?>
