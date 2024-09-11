<?php
require_once 'users.php';
$users = new Users('users');
$page=$_GET['page'];
$per=$_GET['per'];
//$count=$users->select()->rowCount();
$count2=$users->select_count()['total'];
$pages=ceil($count2/$per);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>users</title>
</head>
<body>
<p>
    <?php
    echo 'page:'.$page;
    ?>
</p>
<p>
    <?php
    echo 'per:'.$per;
    ?>
</p>
<p>
    <?php
    echo 'count(total):'.$count2;
    ?>
</p>
<p>
    <?php
    echo 'pages:'.$pages;
    ?>
</p>
<table border="1">
    <tr>
        <td>id</td>
        <td>firstname</td>
        <td>lastname</td>
        <td>age</td>
        <td>gender</td>
    </tr>
    <?php
    foreach ($users->select_special($per,$page) as $user){
        echo '<tr>';
        echo '<td>' . $user['id'] . '</td>';
        echo '<td>' . $user['firstname'] . '</td>';
        echo '<td>' . $user['lastname'] . '</td>';
        echo '<td>' . $user['age'] . '</td>';
        echo '<td>' . $user['gender'] . '</td>';
        echo '</tr>';
    }
    ?>
</table>
<div style="display: flex;margin-top: 20px">

    <?php
    if ($page<=1){
        $status='none';
    }else{
        $status='inline-block';
    }
    if ($page>=$pages){
        $status2='none';
    }else{
        $status2='inline-block';
    }
    $backward=(int)$page-1;
    $forward=(int)$page+1;
    echo '<a href="index.php?page='.$backward.'&per='.$per.'" style="margin: 0 20px;font-size: 20px;text-decoration: none;border: 1px solid black;padding: 7px;display: '.$status.'"><<</a> ';

    for ($i=1; $i<=$pages; $i++) {
        echo '<a href="index.php?page='.$i.'&per='.$per.'" style="margin: 0 20px;font-size: 20px;text-decoration: none;border: 1px solid black;padding: 7px">'.$i.'</a> ';
    }
    echo '<a href="index.php?page='.$forward.'&per='.$per.'" style="margin: 0 20px;font-size: 20px;text-decoration: none;border: 1px solid black;padding: 7px;display: '.$status2.'">>></a> ';
    ?>
</div>
</body>
</html>
>>