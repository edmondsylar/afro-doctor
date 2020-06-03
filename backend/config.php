<?php
  /**
   * This is the main class for all our connectinos
   */
  class AppInit
  {
    public $conn;

    function __construct()
    {
      define('DB_SERVER', 'localhost');
      define('DB_USERNAME', 'dev');
      define('DB_PASSWORD', 'password');
      define('DB_NAME', 'doctor');

      $this->conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
      if($this->conn === false){
        echo "App not loving your database setup";
      }
    }

    function Login($email, $password){
      $passcheck = md5($password);
      $login_query = "SELECT * FROM users WHERE email='$email' AND password='$passcheck'";

      // make the database query
      $Auth = mysqli_query($this->conn, $login_query);
      $bj = mysqli_fetch_assoc($Auth);
      if($bj['id']){
        $usr = $bj['email'];
        session_start();
        // $_SESSION["loggedin"] = true;
        $_SESSION["loggedin"] = true;
        $_SESSION["email"] = $bj['email'];
        $_SESSION["name"] = $bj['names'];

        return header("Location: ../admin/");
      }else{

        $client_login = "SELECT * FROM customers WHERE phone='$email' AND password='$passcheck'";
        $Auth = mysqli_query($this->conn, $client_login);
        $bj = mysqli_fetch_assoc($Auth);

        if($bj['id']){
          session_start();
          $_SESSION["loggedin"] = true;
          $_SESSION["email"] = $bj['email'];
          $_SESSION["names"] = $bj['fullname'];

          // echo isset($_SESSION['loggedin']);
          return header("Location: ../index.php");
          
      }
      $host  = $_SERVER['HTTP_HOST'];
       header("Location: ../index.php?error=1&error=1");
      // echo mysqli_error($this->conn);
    }
  }

    function createuser($name, $email, $address, $phone, $password){
      $pass = md5($password);

      $ins = "INSERT INTO customers(`fullname`, `email`, `address`, `phone`, `password`) VALUES ('$name', '$email', '$address', '$phone', '$pass')";
      if(mysqli_query($this->conn, $ins)){


        return $this->Login($email, $password);
        // header("Location: ../index.php");
      }else{
        echo "Something is wrong <br> ".mysqli_error($this->conn);
      }



    }

  function register($email, $name, $password){
      $pass = md5($password);

      $ins = "INSERT INTO users(`email`, `password`, `names`) VALUES ('$email', '$pass', '$name')";
      if(mysqli_query($this->conn, $ins)){

        header("Location: ../index.php");
      }else{
        echo "Something is wrong <br> ".mysqli_error($this->conn);
      }
    }

    function _cart($user){
        $query = "SELECT * FROM cart where user='$user'";
        $res = mysqli_query($this->conn, $query);
        
        return ($res->num_rows);
        // return count($row);
    }

    function empty_cart($user){
        $query = "DELETE FROM cart WHERE user='$user'";
        if($res=mysqli_query($this->conn, $query)){

            header("Location: ../index.php");
        }else{
            echo "somthing went wrong ". mysqli_error($this->conn);
        }
    }

    // modify to add user | owner of the products
    function checkout($user){
        $query = "SELECT SUM(`total`) as price FROM cart where user='$user'";
        $res = mysqli_query($this->conn, $query);
        $_c = mysqli_fetch_assoc($res);

        $prods = "SELECT * FROM cart where user='$user'";
        $p_res = mysqli_query($this->conn, $prods);

        $cart = array(
            'total'=>$_c['price'],
            'products'=>$p_res
        );
        return ($cart);
    }

    function search_drug($keyword){
      $query = "SELECT * FROM drugs where title LIKE '%$keyword%' OR description LIKE '%$keyword%'";
      $res = mysqli_query($this->conn, $query);
      return $res;
    }

    function search_service($keyword){
      $query = "SELECT * FROM services where title LIKE '%$keyword%' OR description LIKE '%$keyword%'";
      $res = mysqli_query($this->conn, $query);
      return $res;
    }

    function add_drug($title, $desc, $add, $image, $price){
      $add = "INSERT INTO drugs(`title`, `description`, `image`, `address`, `price`) VALUES ('$title', '$desc', '$image', '$add', '$price')";

      if(mysqli_query($this->conn, $add)){

        header("Location: ../admin/drugs.php");
      }else{
        echo "somthing went wrong". mysqli_error($this->conn);
      }

    }

    function add_service($title, $desc, $address, $image){
      $add = "INSERT INTO services(`title`, `description`, `image`, `address`) VALUES ('$title', '$desc', '$image', '$address')";

      if(mysqli_query($this->conn, $add)){

        header("Location: ../admin/services.php");
      }else{

        echo "somthing went wrong". mysqli_error($this->conn);
      }

    }
    
    function add($product, $price, $user){
      $add = "INSERT INTO cart(`product`, `price`, `total`, `user`) VALUES ('$product', '$price', '$price', '$user')";
      if(mysqli_query($this->conn, $add)){
        // echo $_SESSION['url'];
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = $_SESSION['url'];
        $extra = 'mypage.php';
        header("Location: http://$host$uri");
      }else{
        echo "Error while adding product". mysqli_error($this->conn);
      }
    }

    function remove($product, $user){
      $q = "DELETE FROM cart where product='$product' AND user='$user'";
      if(mysqli_query($this->conn, $q)){
        // echo $_SESSION['url'];
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = $_SESSION['url'];
        header("Location: http://$host$uri");
      }else{
        echo "Error while adding product". mysqli_error($this->conn);
      }
    }

    function _rem($product, $user){
      $q = "DELETE FROM cart where product='$product' AND user='$user'";
      if(mysqli_query($this->conn, $q)){

        header("Location: ../cart.php");
      }else{
        echo "Error while adding product". mysqli_error($this->conn);
      }

    }

    function _admin_data(){
      $d = "SELECT * FROM drugs";
      $s = "SELECT * FROM services";

      $drugs = mysqli_query($this->conn, $d);
      $services = mysqli_query($this->conn, $s);

      $data = array(
        'drugs'=>$drugs,
        'services'=> $services
      );

      return ($data);

    }

    function _compute($p, $amount, $q, $u){
      $upate_ = "UPDATE cart SET quantity='$q' where user='$u' AND product='$p'";
      $s_ = mysqli_query($this->conn, $upate_);
      if($s_){
        $query = "SELECT price, quantity,(price*quantity) as total from cart where user='$u' AND product='$p'";
        $s_ = mysqli_query($this->conn, $query);
        foreach($s_ as $s){
          $tt = ($s['total']);
          $update_ = "UPDATE cart SET total='$tt' where user='$u' AND product='$p'";
          $s_ = mysqli_query($this->conn, $update_);
          return header("Location: cart.php");
          // print_r($tt);
      }
  }
}

  }