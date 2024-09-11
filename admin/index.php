<?php
require_once 'users.php';
$users = new Users('users');
$page=$_GET['page'];
$per=$_GET['per'];
//$count=$users->select()->rowCount();
$count2=$users->select_count()['total'];
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
    echo 'pages:'.ceil($count2/$per);
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
</body>
</html>