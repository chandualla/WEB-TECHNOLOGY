<?php
session_start();
include("class/connect.php");
include("class/login.php");
include("class/user.php");
include("class/post.php");

$login=new Login();
$user_data=$login->check_login($_SESSION['fb_userid']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #blue_bar{
            height:50px;
            background-color:#405d9b;
            color:#d9dfeb;
        }
        #search_box{
            width:400px;
            height:20px;
            border-radius:5px;
            border:none;
            padding: 4px;
            font-size:14px;
            background-image: url(search.png);
            background-repeat:no-repeat;
            background-position:right;
        }
      
        
        #post_button{
            float:right;
            background-color:#405d9b;
            border:none;
            color:white;
            padding:4px;
            font-size:14px;
            width:50px;
        }
        #post_bar{
            margin-top:20px;
            background-color:white;
            padding:10px;
        }
        #post{
            padding:4px;
            font-size:13px;
            display:flex;
            margin-bottom:20px;
        }
    </style>
</head>
<body style="font-family:tahoma;background-color:#d0d8e4;">
    <br>
    <?php include("header.php"); ?>
    <div style="width:800px; margin:auto;min-height:400px;">
    <div style="display:flex;">
     <!--friends-->
     <div style=" min-height:400px;flex:1;">
     <div id="friends_bar"> 
     <img src="1jpg.jpg" id="profile_pic"></br>
           <a href="profile.php"  style="text-decoration:none;">
           <?php echo $user_data['first_name']. "<br>" . $user_data['last_name'] ?>
        </a> 
    </div>
    </div>
    <div style="min-height:400px;flex:2.5; padding:20px;padding-right:0px;">
      <div style="border:solid 1px #aaa; padding:10px;background-color:white;">
        <textarea name="post" id="" placeholder="whats on ur mind"></textarea>
         <input type="submit" id="post_button" value="post">
         <br>
      </div>
      <div id="post_bar">
        <div>
            <img src="u1.jpg" style="width:75px;margin-right:4px;" alt="">
        </div>
        <div>
            <div style="font-weight:bold;color:#405d9b;">first guy</div>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto saepe quasi perspiciatis quam odit. Est quibusdam repudiandae ab distinctio aperiam magnam cum dolorum quod commodi soluta, qui sunt sed animi.
            <br/><br/>
            <a href="">Like</a> . <a href="">comment</a> . <span style="color:#999">april 23 2023</span>

        </div>
    </div>
</body>
</html>