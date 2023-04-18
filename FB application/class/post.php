<?php
include("image.php");
class Post{

    private $error="";
    public function create_post($userid,$data,$files)
    {
        $_SESSION['myuser']=$userid;
        if(!empty($data['post']) || !empty($files['file']['name']))
        {
            
        $myimage="";
        $has_image=0;
        if(!empty($files['file']['name']))
        {
            $image_class=new Image();
            $folder="uploads/" . $userid . "/";
            if(!file_exists($folder))
            {
                mkdir($folder,0777,true);
            }
            $myimage=$folder.$image_class->generate_filename(15) . ".jpg";
            move_uploaded_file($_FILES['file']['tmp_name'],$myimage);
            $has_image=1;

        }
        $post=addslashes($data['post']);
        $postid=$this->create_postid();
        $query="insert into posts (userid,postid,post,image,has_image) values('$userid','$postid','$post','$myimage','$has_image')";
       $DB=new Database();
       $DB->save($query);
        }
        else{
         $this->error= "please type something to post <br>";
        }
        return $this->error;
    }
    public function get_posts($id)
    {
        $query="select * from  posts order by id desc limit 10";
        $DB=new Database();
        $result=$DB->read($query);

        if($result)
        {
            return $result;
        }
        else{
            return false;
        }
    }
    public function get_post()
    {
        $query="select * from  posts order by likes desc limit 3";
        $DB=new Database();
        $result=$DB->read($query);

        if($result)
        {
            return $result;
        }
        else{
            return false;
        }
    }
    private function create_postid(){
    
        $length=rand(4,19);
        $number="";
        for($i=0;$i<$length;$i++)
        {
           $new_rand=rand(0,9);
          $number=$number.$new_rand;
   
        }
        return $number;
   
       }
}


?>