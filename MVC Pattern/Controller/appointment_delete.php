<?php require_once('Model/include/db.php') ;?>
<?php require_once('Model/include/config.php') ;?>
<?php require_once('Model/include/session.php') ;
if(isset($_GET['id'])){
    $query = "DELETE FROM Model/appointments where id=".$_GET['id'];
    $res = $mysqli->query($query);
    if($res){
        header('Location: '.ROOT_URL.'Model/appointments.php');
    }else{
        echo 'Something went wrong';
    }
}else{
    header('Location: '.ROOT_URL.'Model/appointments.php');
}

