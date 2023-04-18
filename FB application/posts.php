<?php
 
  $ROW_USER=$user->get_user($ROW['userid']);


?>
<html>
  <head>
  </head>
  <body>
<div id="post">
        <div>
          <?php
          $image="image/female.png";
          if($ROW_USER['gender']=='m')
          {
            $image="image/user_male.jpg";
          }
          ?>
         <img src="<?php  echo $image ?>" alt="" style="width:75px;margin-right:4px;">
        </div>
        <div>
            <div style="font-weight:bold;color:#405d9b">
          <?php echo $ROW_USER['first_name'] . " " . $ROW_USER['last_name']; ?>
          </div>
              <?php echo $ROW['post'] ?>
              <br><br>
              <?php 
              if(file_exists($ROW['image']))
              {
                $post_image=$ROW['image'];
                echo "<img src='$post_image'  style='width:100%;'/> ";
              }
              
              ?>
            <br/><br/>
           
         
            <form action="" >
            <?php $d=$ROW['date']; ?>
               <button class="btn" name="submit" type="submit" style="color:blue;"  value="<?php echo $ROW['postid'] ?>" >Like</button>
              
            &nbsp;&nbsp;
             <span class="disp"><?php 
             echo $ROW['likes'];
             echo " Like";
             ?></span>
             <span style="color:#999; float:right;">
          </span>.
          <span style="float:right;"><?php echo $ROW['date']; ?></span>
          </form>
                
            
        </div>
</div>

            </body>
            </html>