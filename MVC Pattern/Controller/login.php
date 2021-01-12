<?php session_start(); ?>
<?php require_once('Model/include/config.php'); ?>
<?php if(isset($_SESSION['is_logged_in'])){
  header('Location: '.ROOT_URL);
} ?>
<?php require_once('Model/include/db.php') ;?>
<?php require_once('Model/include/config.php') ;?>
<?php if(isset($_POST['loginForm'])){
   $email = $_POST['email'];
   $username = $_POST['username'];
   $pass = $_POST['password'];
   $query = 'SELECT * FROM admin where email="'.$email.'"and username="'.$username.'"and password="'.$pass.'"';
   $result = $mysqli->query($query);

   if($result->num_rows > 0){
     $row = $result->fetch_assoc();
    $_SESSION['is_logged_in'] = true;
    $_SESSION['admin_data'] = array(
        'id'=>$row['id'],
        'name'=> $row['name'],
        'email'=>$row['email'],
        'username'=>$row['username']

    );
    header('Location: '.ROOT_URL);
   }else{
    echo '<span style="color:#AFA;">#########Wrong login info##########</span>';
   }
  
} 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="View/css/style.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 0px;
  padding-bottom: 0px;
  background:url(View/image/hospital-bg.jpg) no-repeat center;
}
body:after{
  content:'';
  position:absolute;
  top:0;
  left:0;
  width:100%;
  height:100vh;
  background:rgba(0,0,0,0.5);
  z-index:-1;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
    
    </style>
</head>
<body>
<form action="<?php $_SERVER['PHP_SELF'] ;?>" method="post" name="" class="form-signin">

  <h1 class="h3 mb-3 font-weight-bold text-white">HMS LOGIN (Admin)</h1>
  <label  class="sr-only">Email address</label>
  <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
  <label  class="sr-only">Username</label>
  <input type="username" name="username" class="form-control" placeholder="Username" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="password" class="form-control" placeholder="Password" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="loginForm">Sign in</button>
</form>
</body>
</html>