<?php
session_start();
$mysqli=new mysqli('localhost','root','','crud') or die (mysqli_error($mysqli));


$id=0;
$update=false;
$ime='';
$lokacija='';


if(isset($_POST['unesi'])){
    $ime=$_POST['ime'];
    $lokacija=$_POST['lokacija'];
    $_SESSION['message']="Record has been saved!";
    $_SESSION['msg_type']="success";
    $mysqli->query("INSERT INTO data(ime,lokacija)VALUES('$ime','$lokacija')") or die (mysqli_error($mysqli));
    header("Location: index.php");
}
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id")or die ($mysqli->error());
    $_SESSION['message']="Record has been deleted!";
    $_SESSION['msg_type']="danger";
    header("Location: index.php");

}
if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM data WHERE id=$id")or die ($mysqli->error());

       
        $row=$result->fetch_array();
        $ime=$row['ime'];
        $lokacija=$row['lokacija'];
  

    }
    if (isset($_POST['update'])){
        $id=$_POST['id'];
        $ime=$_POST['ime'];
        $lokacija=$_POST['lokacija'];
   $mysqli ->query ("UPDATE data SET ime='$ime', lokacija='$lokacija' WHERE id=$id")or
   die($mysqli->error);
   $_SESSION['message']="Record has beed updated!";
   $_SESSION['msg_type']="warning";
   header('location:index.php');
    }