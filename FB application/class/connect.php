<?php

class Database{


function connect(){
    $con= mysqli_connect("localhost","root","","fb");
    return $con;
}
 
function read($q){
   $conn = $this->connect();
   $res=mysqli_query($conn,$q);
   if(!$res)
    {
        return false;
    }
    else{
        $data=false;
        while($row=mysqli_fetch_assoc($res)){
            $data[]=$row;
        }
        return $data;
    }

}

function save($q){
    $conn = $this->connect($q);
    $res=mysqli_query($conn,$q);
    if(!$res)
    {
        return false;
    }
    else{
        return true;
    }
}
 }
 ?>