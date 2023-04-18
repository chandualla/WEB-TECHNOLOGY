<?php

session_start();

$uid=$_SESSION['fb_userid'];
$pid=$_POST['submit'];
$c=mysqli_connect("localhost","root","","fb");
$q2="select * from likes where usid='$uid' and postid='$pid'";
$r2=mysqli_query($c,$q2);
if(mysqli_num_rows($r2) == 0)
{
    $q="Update posts Set likes=likes+1 Where postid='$pid'";
    $r=mysqli_query($c,$q);
    $q1="insert into likes(postid,usid) values('$pid','$uid')";
    $rr=mysqli_query($c,$q1);
   header("Location:profile.php"); 
}
else{
    $q="Update posts Set likes=likes-1 Where postid='$pid'";
    $q1="delete from likes where postid='$pid' and usid='$uid'";
    $rrr=mysqli_query($c,$q);
    $rr=mysqli_query($c,$q1);
   header("Location:profile.php"); 
}


 
?>