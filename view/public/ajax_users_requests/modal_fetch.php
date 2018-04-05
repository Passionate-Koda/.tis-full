<?php

if(isset($_POST['session'])){
  $sess = $_POST['session'];
}
if(isset($_POST['skill_id'])){
  $skill = $_POST['skill_id'];
}







$getInfo = getUser($econn, $_POST['session']);
extract($getInfo);
$Username = ucfirst($username);

    $stmt = $econn->prepare("SELECT * FROM tworker_skill WHERE skill_id = :gd");
    $stmt->bindParam(':gd', $_POST['skill_id']);
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_BOTH)){
      extract($row);
      $statement = $econn->prepare("SELECT * FROM tworkers WHERE tworkers_id = :twid");
      $statement->bindParam(':twid', $tworker_id);
      $statement->execute();

      while($info = $statement->fetch(PDO::FETCH_BOTH)){
        extract($info);
        $name= ucwords($tworkers_firstname).' '.ucwords($tworkers_surname);
        // echo '<li><a href="tworkersBoard?t='.$tworkers_hashid.'" data-target="#myModal1"><h3>'.$name.'</h3>
        //   <p>'.$tworkers_description.'</p>
        //   <p>'.$tworkers_lga.'</p>
        // </a></li><hr><br>';

        echo "<div class=\"modal ab fade\" id=\"myModal$tworkers_hashid\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">";
        echo "<div class=\"modal-dialog sign\" role=\"document\">";
        echo "<div class=\"modal-content about\">";
        echo "<div class=\"modal-header one\">";
        echo "<button type=\"button\" class=\"close sg\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
        echo "<div class=\"discount one\">";
          echo "<h3>Contact Tworker</h3>";

            echo  "</div></div>";
            echo "<div class=\"modal-body about\">";
            echo "<div class=\"login-top cars sign-top one\">";
                echo    "<h4>$name</h4>
                    <h5>$tworkers_description</h5>";

                    echo "<img src=\"$tworkers_image\" alt=\"$name\">";
                    echo "<div class=\"car-form-pop\">";
                      echo "<p><span>Available</span></p>
                      <div class=\"location1\">
                    <h3>Location: <span>$tworkers_lga</span></h3>
                      </div>
                      <form  action=\"#\" method=\"post\">
                      <input type=\"hidden\" id=\"$tworkers_hashid\" value=\"$tworkers_hashid\">
                      <div class=\"input\">
                      <label for=\"brand2\"><span></span>Send a task to $name</label>
											<textarea spellcheck=\"false\" name=\"email_message\" rows=\"8\" cols=\"50\"></textarea>
											</div>
                        <div class=\"send-button\">
                          <input type=\"button\" onclick=\"sendTask(this.form.elements[0].id,'$sess',this.form.elements[1].value,'$Username','$skill');this.form.reset()\" name=\"sentTask\" value=\"SEND TASK\">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>


              </div>
            </div>
          </div>";






      }
    }
