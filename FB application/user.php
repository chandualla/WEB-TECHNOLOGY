<div id="friends">
         <?php
          $image="image/user_male.jpg";
          if( $FRIEND_ROW['gender']=="f")
          {
            $image="image/female.png";
          }
          ?>
          <img id="friends_img" src="<?php echo $image ?>" alt="">
          <br>
          
          <?php echo $FRIEND_ROW['first_name']. " " . $FRIEND_ROW['last_name'] ?>
</div>