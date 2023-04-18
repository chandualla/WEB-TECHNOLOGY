<?php

include("class/connect.php");
include("class/signup.php");
$first_name="";
$last_name="";
$gender="";
$email="";
if($_SERVER['REQUEST_METHOD']=='POST'){

    $signup=new signup();
    $result=$signup->evaluate($_POST);
    if($result!=""){
        echo "<div style='text-align:center;font: size 12px;color:white;background-color:grey;'>";
        echo "the following errors occured<br>";
        echo $result;
        echo "</div>";
    }
    else{
        header("Location:login.php");
        die;
    }

    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        #bar{
            height:100px; 
            background-color:#3c5a99;
            color:#d9dfeb;
            font-size:40px;
        }
        #signup_button{
            background-color:#42b72a;
            width:110px;
            text-align: center;
            padding:4px;
            border-radius:4px;
            float:right;
        }
        #bar2{
            background-color:lightblue; 
            width:800px;
          
            margin:auto;
            margin-top:100px;
            padding:10px;
            text-align:center;
            padding-top:50px;
            font-weight:bold;
        }
        #text{
             height:40px;
             width:300px;
             border-radius:4px;
             border:solid 1px #ccc;
             padding:4px;
             font-size:14px;
        }
        #button{
            width:300px;
            height:40px;
            border-radius:4px;
           
            border:none;
            background-color:rgb(59,89,152);
            color:white;
        }
    </style>
</head>
<body>
    <div id="bar" style="">
    <div>facebook</div> 
    <div id="signup_button"><a href="login.php">Login</a></div>
    </div>
    <div id="bar2">
        signup  to facebook <br><br>
        <form action="signup.php" method="post">
        <input value="<?php echo $first_name ?>" type="text" name="first_name" id="text"  placeholder="firstname"><br><br>
        <input value="<?php echo $last_name ?>" type="text" name="last_name" id="text" placeholder="lastname"><br><br>
       <span style="font-weight:normal;">Gender:</span> <br>
        <select name="gender" id="text">
            <option value="" <?php echo $gender ?>></option>
         <option value="m" >Male</option>
         <option value="f">Female</option>
        </select>
        <br><br>
        <input type="text" name="email" id="text"><br><br>
        <input type="password" name="password" id="text"><br><br>
        <input type="password" name="password2" id="text"><br><br>
        <input type="submit" name="" id="button" value="Signup"><br><br><br>
        </form>
    </div>
</body>
</html>