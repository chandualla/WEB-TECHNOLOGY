<?php

session_start();
if(isset($_SESSION['fb_userid']))
{   $id=$_SESSION['fb_userid'];
    $c=mysqli_connect("localhost","root","","fb");
    $q1="delete from  actusers where userid='$id'";
    $rr=mysqli_query($c,$q1);
    $_SESSION['fb_userid']=NULL;
    unset($_SESSION['fb_userid']);
}


header("Location:login.php");
die;
?>