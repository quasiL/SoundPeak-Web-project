<div class="title">
  <h1>"<?php echo $album_name;?>"</h1>
  <h2>/ <?php echo $band_name;?></h2>
  <div id="line"></div>
</div>
<div class="main_information">
  <div class="section_left">
      <div class="left">
      <div>
      <a href="#"><img alt="" class="cover" src="<?php echo $link;?>"></a>
      </div>
      <div class="information">
          <div class="item"><p>Label: </p><p>Gusto Records</p></div>
          <div class="item"><p>Format: </p><p>LP, Album </p></div>
          <div class="item"><p>Country: </p><p>US</p></div>
          <div class="item"><p>Released: </p><p>2003</p></div>
          <div class="item"><p>Genre: </p><p>Folk, World, & Country</p></div>
          <div class="item"><p>Style: </p><p>Bluegrass</p></div>
          <form action="#" method="POST" enctype="multipart/form-data">
              <div class="rating-area">
                  <input type="radio" id="star-5" name="rating" value="5" <?= (isset($rating_check) && $rating_check == 5)?"checked":''?>>
                  <label for="star-5" title="5"></label>	                   
                  <input type="radio" id="star-4" name="rating" value="4" <?= (isset($rating_check) && $rating_check == 4)?"checked":''?>>                   
                  <label for="star-4" title="4"></label>                      
                  <input type="radio" id="star-3" name="rating" value="3" <?= (isset($rating_check) && $rating_check == 3)?"checked":''?>>                   
                  <label for="star-3" title="3"></label>                    
                  <input type="radio" id="star-2" name="rating" value="2" <?= (isset($rating_check) && $rating_check == 2)?"checked":''?>>                  
                  <label for="star-2" title="2"></label>                      
                  <input type="radio" id="star-1" name="rating" value="1" <?= (isset($rating_check) && $rating_check == 1)?"checked":''?>>                 
                  <label for="star-1" title="1"></label>
              </div>
              <input id="rate" type="submit" name="rate" value="Rate">
          </form>
      </div>
      </div>
      <div class="tracklist">
          <h3>Tracklist</h3>
          <ol>
              <li>Kentucky</li>
              <li>I'll Be All Smiles Tonight</li>
              <li>Let Her Go, God Bless Her</li>
              <li>What Is Home Without Love</li>
              <li>A Tiny Broken Heart</li>
              <li>In The Pines</li>
              <li>Alabama</li>
              <li>Katie Dear</li>
              <li>My Brother's Will</li>
              <li>Knoxville Girl</li>
              <li>Take The News To Mother</li>
              <li>Mary Of The Wild Moor</li>
          </ol>
      </div>
  </div>
  <div class="section_line"></div>
  <div class="section_right">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/yXrgNIubBEA" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <h3>User reviews:</h3>
      <div class="reviews">
          <?php
              $items = getReviews($album_name);
              if ($items) {
                  foreach ($items as $item) {
                      $owner = $item['owner'];
                      $text = $item['text'];
                      $user = getUserById($owner, $users);
                      $user_rating_check = checkRating($data2, $item['owner'], $album_name);
                      echo $user;
                      if ($user_rating_check != null) {
                          echo "<div class=\"stars\">";
                          for ($i=0; $i < $user_rating_check; $i++) {
                              echo "<div class=\"star\"></div>";
                          }
                          echo "</div>";
                      } else {
                          echo "<br>";
                      }
                      echo $text;
                      echo "<br>";
                  }
              } 
          ?>
      </div>
      <form action="#" method="POST" enctype="multipart/form-data">
          <label>New review: <?= isset($_POST['send'])?htmlspecialchars($note):''?></label>
          <textarea name="message" placeholder="Write something about this album..."><?= isset($_POST['send'])?htmlspecialchars($message):''?></textarea>
          <?php
              echo "<input type=\"submit\" name=\"send\" value=\"$vnote\">";
          ?>
         <!--  <input type="submit" name="send" value="Send"> -->
      </form>
  </div>
</div>