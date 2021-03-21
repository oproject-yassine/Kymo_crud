<?php

$sql = new mysqli("localhost", "root", "", "kymo_users") or die(mysqli_error($sql));

$name='';
$email='';
$password='';
$id = 0;
$clickEdit = false;

if(isset ($_POST['save'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql->query("INSERT INTO users(name,email,password) VALUES('$name', '$email', '$password')  ")
                or die ($sql->error);
    header('location:index.php');
}  

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql->query("DELETE FROM users WHERE id=$id") or die($sql->error());
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $clickEdit = true;

    $life = $sql->query("SELECT * FROM users WHERE id=$id") or die($sql->error());
    $row = mysqli_fetch_array($life);
    $name = $row['name'];
    $email = $row['email'];
    $password = $row['password'];
    
}

if(isset ($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql->query("UPDATE users SET name='$name', email='$email', password='$password' WHERE id='$id' ")
                or die ($sql->error);

    header('location:index.php');
}