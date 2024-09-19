<?php 

class Database{
      //connection // since we will be needing this conn only inside here we keep it private so no one can connect to our database
  private function dbconnect(){
      if (!$conn = new mysqli('localhost','root','','security_db')){
          die("Could not connect to the database");
      }
      return $conn;
    }   //connection end

    // now we put it inside here , that way everything that extends the database will also have the capacity to read the posts
   public function db_read($query){ //reading post // we can read from outside
      $conn = $this->dbconnect();  //$this->dbconnect() is going to connect to the connect function because we are extending to that
      $result = mysqli_query($conn,$query);

      if ($result && mysqli_num_rows($result) > 0){
          $data=array();
      while($row=mysqli_fetch_assoc($result)){
        $data[]=$row;
        }
        return $data;
      }
      return false;
    }



    public function db_write($query){ //reading post // we can read from outside
      $conn = $this->dbconnect();  //$this->dbconnect() is going to connect to the connect function because we are extending to that
      $result = mysqli_query($conn,$query);

      if ($result ){

        return true;
      }
      return false;
    }

}
// we will be getting our post from the home page

// query run


class Post extends Database{
  //get few posts for home page
  public function get_home_posts(){
    
              // get post
        $query ="SELECT * FROM `posts` ORDER BY id DESC LIMIT 2";
        return $this-> db_read($query);// function available in the function folder in index page

  }

  // post for home page
  public function get_all_posts(){
    // get post
$query ="SELECT * FROM `posts` ORDER BY id DESC";
return $this-> db_read($query);// function available in the function folder in index page

}

  // get a single post
  public function get_one_post($id){
    // get post
$query ="SELECT * FROM `posts` WHERE id='$id' LIMIT 2";
return $this->db_read($query);// function available in the function folder in index page

}
}

class User extends Database{
  function login($POST){
    if (count($POST) > 0){
        $Error = "";
        
        // Validate email
        if (!filter_var($POST['user_email'], FILTER_VALIDATE_EMAIL)){
            $Error = "Wrong password or email";
        }

        // Validate password
        if (empty($POST['user_password'])){
            $Error = "Wrong password or email";
        } else {
            if ($Error == ""){
                $email = addslashes($POST['user_email']);
                $password = addslashes($POST['user_password']);

                $query = "SELECT * FROM `users` WHERE email='$email' && password='$password'";
                $result = $this->db_read($query);

                if ($result) {
                    $row = $result[0];
                    $_SESSION['username'] = $email;
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_rank'] = $row['rank'];
                    echo $_SESSION['user_id'];
                    return "";
                } else {
                    $Error = "Wrong password or email";
                    echo $Error;
                       }
            } else {
                $Error = "Wrong password or email";
                echo $Error;
                   }
            return $Error;
        }
    }
}
 }

/// rank function
 function access($needed_rank){
  $user_rank = isset($_SESSION['user_rank'])? $_SESSION['user_rank'] : "";
 
  // rank access level
   switch($needed_rank){

      case "admin":
        $allowed[]="admin";
        return in_array($user_rank, $allowed); // is the user rank inside the allowed?
      // return ($user_rank == "admin" || $user_rank =="admin" || $user_rank =="admin");
        break;  // admin can access what the user and editor are accessing

        case "editor":
          $allowed[]="admin";
          $allowed[]="editor";
        return in_array($user_rank, $allowed); // is the user rank inside the allowed?
          break;

        case "user":
          $allowed[]="admin";
          $allowed[]="editor";
          $allowed[]="user";
        return in_array($user_rank, $allowed); // is the user rank inside the allowed?
            break;
            default:
            //
            break;
   }
   return false;
 }
// end rank function











// below other methods but not used


/*

class Posts extends Database{   //extends Database, that means what is availabe in the database will also be available in here
      // a better method to study //extends Database, reason for keeping it seperate is so that every other class could extends to inclue it too. it we put it in a particular class, we will need to put in all classes
    function db_read($query){
      $conn = $this->dbconnect();  //$this->dbconnect() is going to connect to the connect function because we are extending to that
      $result = mysqli_query($conn,$query);

      if ($result && mysqli_num_rows($result) > 0){
          $data=array();
      while($row=mysqli_fetch_assoc($result)){
        $data[]=$row;
        }
        return $data;
      }
      return false;
    }
}













function db_read1($query){
    $conn = dbconnect();
    $result = mysqli_query($conn,$query);
    if ($result && mysqli_num_rows(result) > 0){
    while($row=mysqli_fetch_assoc($result)){
        // code... get details
        // display ie posts
        echo "<div class='post'>
        <div>
          <h2>". $row['title'] . "</h2>
        </div>
        <p class='text'>" . substr($row['post'], 0, 200) . "</p>
        <a href='post.php'>..read more..</a>
        <p class='timestamp'>" . date("jS m, Y", strtotime($row['date'])) . "</p>
        <br style='clear:both;'>
      </div>";
      }
    }
    return false;
}
*/