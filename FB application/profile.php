<?php
session_start();
//print_r($_SESSION);
include("class/connect.php");
include("class/login.php");
include("class/user.php");
include("class/post.php");

if(isset($_SESSION['fb_userid']) && is_numeric($_SESSION['fb_userid']))
{
    $id=$_SESSION['fb_userid'];
    $login=new Login();
    $result=$login->check_login($id);

    if($result) 
    {
      $user=new User();
      $user_data=$user->get_data($id);

      if(!$user_data)
      {
        header("Location:login.php");
        die;
      }
    }  
    else{
        header("Location:login.php");
        die;
    }   
}
else{
    header("Location:login.php");
        die;
}

   //posting
   if($_SERVER['REQUEST_METHOD']=="POST")
   {
    $post=new Post();
    $id=$_SESSION['fb_userid'];
    $result=$post->create_post($id,$_POST,$_FILES);

    if($result=="")
    {
        header("Location:profile.php");
        die;
    }
    else{
        echo "<div style='text-align:center;font: size 12px;color:white;background-color:grey;'>";
        echo "the following errors occured<br>";
        echo $result;
        echo "</div>";
    }
   

   }

   //collect posts
   $post=new Post();
   $id=$_SESSION['fb_userid'];
   $posts=$post->get_posts($id);

   //collect friends
   $user=new User();
   $id=$_SESSION['fb_userid'];
   $friends=$user->get_friends($id);
   $gf=$user->get_activefriends($id);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
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
        #profile_pic{
            width:150px;
            margin-top:-250px;
            border-radius:60%;
            border:solid 2px white;

        }
        #menu_button{
            width:100px;
           display:inline-block;
        }
        #friends_img{
            width:75px;
            float:left;
            margin:8px;
        }
        #friends_bar{
            background-color:white;
            min-height:700px;
            margin-top:20px;
            color:#aaa;
            padding:8px;

        }
        #friends{
            clear:both;
            font-size:12px;
            font-weight:bold;
            color:#405d9b;
        }
        textarea{
         width:100%;
         border:none;
         font-family:tahoma;
         font-size:14px;
         height:60px;
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
            border:5px solid black;
            margin-bottom:40px;
        }
    </style>
</head>
<body style="font-family:tahoma;background-color:#d0d8e4;">
    <br>
    
    <div id="blue_bar">
        <div style="width:800px;margin:auto;font-size:30px;">
            facebook &nbsp &nbsp <input type="text" name="" id="search_box" placeholder="search">
            <img src="1jpg.jpg" alt="" style="width:40px;float:right;">
            <a href="logout.php">
            <span style="font-size:11px;float:right;margin:10px;color:white;">Logout</span>
             </a>
        </div>
    </div>

    <div style=" width: 800px;margin:auto;min-height:400px;">
     <div style="background-color:white;text-align:center;color:#405d9b">
        <img src="2.jpeg" alt="" style="width:100%;">
       
        <span style="font-size:11px;">
            <img src="1jpg.jpg" id="profile_pic"></br>
           <a href="change_profile_image.php" >change image</a> 
        </span>
        <br>
       <div style="font-size:20px;"><?php echo $user_data['first_name']." ". $user_data['last_name']?></div> 
        <br>
       <a href="" style="margin-left:10px; margin-right:70px;border:2px solid black; background-color:lightgrey; color:darkblack; ">Profile</a> &nbsp;&nbsp;&nbsp;&nbsp;
       <a href="" style="margin-left:150px; margin-right:30px; border:2px solid black; background-color:lightgrey; color:darkblack;">My Posts</a> &nbsp;&nbsp;&nbsp;&nbsp;
       <br><br>`
       
     </div>
     <div style="display:flex;">
     <!--friends-->
     <div style=" min-height:400px;flex:1;">
     <div id="friends_bar"> 
         Your friends <br>
         <?php
    if($friends)
    {
        foreach($friends as $FRIEND_ROW){

            include("user.php");

        }
    }
 
    ?>
    <br><br><br><br><br>
    <div id="active_users">
        Active Users<br>
        <?php 
         if($gf)
         {
             foreach($gf as $FRIEND_ROW){
     
                 include("user.php");
     
             }
         }


       ?>
    </div>
       
       
        </div>
     
    </div>
     <!--posts area-->
     <div style="min-height:400px;flex:2.5; padding:20px;padding-right:0px;">
      <div style="border:solid 1px #aaa; padding:10px;background-color:white;">
        <form action="" method="post" enctype="multipart/form-data">
        <textarea name="post" id="" placeholder="Type the description here!!!!"></textarea>
        <input type="file" name="file">
         <input type="submit" id="post_button" value="post">
         <br>
         </form> 
      </div>
    <!--posts-->
    <div id="post_bar">
        
    <?php
    if($posts)
    {
        foreach($posts as $ROW){
            $user=new User();
            $ROW_USER=$user->get_user($ROW['userid']);
            include("post.php");

        }
    }
 
    ?>
       
</div>
    </div>
     </div>
     
    </div>
</body>
</html>