<?php



    $state = $econn->prepare("SELECT * FROM contacts WHERE contact_owner = :sid");
    $state->bindParam(":sid", $_POST['session']);
    $state->execute();

    if($state->rowCount() < 1){
      echo '<li class="avatar">
      <small>You have not added Contact</small>
      </li>';
    }else{

      while($row = $state->fetch(PDO::FETCH_BOTH)){
        extract($row);
        // echo '<li class="avatar">
        // <a href="'.$type.'?id='.$type_id.'">
        // <div>'.$notification.'</div>
        // <small>1 minute ago</small>
        // </a>
        // </li>';
        $getInfo = getTworker($econn, $contact_hash_id);
        extract($getInfo);
        // echo '<a href="contact?o='.$contact_owner.'&t='.$contact_hash_id.'&i='.$contact_id.'"><div class="online-top">
        //
        //   <div class="top-at">
        //     <img class="img-responsive" src="'.$tworkers_image.'" alt="">
        //   </div>
        //   <div class="top-on">
        //     <div class="top-on1">
        //       <p>'.$contact_name.'</p>
        //       <span>'.$contact_category.'</span>
        //     </div>
        //     <label class="round"> </label>
        //     <div class="clearfix"> </div>
        //   </div>
        //   <div class="clearfix"> </div>
        // </div></a>';



        echo '<li class="contacts">
          <a id="anchor" href="contact?o='.$contact_owner.'&t='.$contact_hash_id.'&i='.$contact_id.'">
          <div class="avater">

          <img class="img-responsive" src="image/3.png" alt="">
            </div>
            <h3>'.$contact_name.'</h3>
            <p>'.$contact_category.'</p>

            </a>
        </li>';
      }
    }


?>
