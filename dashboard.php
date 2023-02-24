<?php
session_start();
if(isset($_SESSION['name'])){
    $name=$_SESSION['name'];
    $time=$_SESSION['time'];
    if((time()- $time)>4){
        header('location:sessiondestroy.php');
    }

}

else{
    header('location:index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3>Welcome back <?php echo $name; ?></h3>
<a href="sessiondestroy.php">logout</a>
<a href="home.php">home</a>
</body>
</html>
