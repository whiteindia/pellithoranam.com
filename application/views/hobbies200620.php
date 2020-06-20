<?php  
if($data==null){ ?>

    <!-- TOP-BANNER -->

    <div class="wed-hobby-div">
      <div class="container container-custom">
        <div class="wed-space"></div>

        <div class="row">
          <div class="col-md-8">

            <form action="<?php echo base_url()?>Profile/get_hobbies" method="post"> 

            <div class="wed-hobby-section">
              <h4>What are your Hobbies and Interests?</h4>
              <ul>
                <li>
                  <div class="wed-hobby-custom-check">
                   
                      <input id="check1" type="checkbox" name="hobbies[]" value="cooking">
                      <label for="check1"><img src="<?php echo base_url();?>assets/img/cooking.png"><br>Cooking</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                  
                      <input id="check2" type="checkbox" name="hobbies[]" value="nature">
                      <label for="check2"><img src="<?php echo base_url();?>assets/img/nature.png"><br>Nature</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check3" type="checkbox" name="hobbies[]" value="movies">
                      <label for="check3"><img src="<?php echo base_url();?>assets/img/movies.png"><br>Movies</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check4" type="checkbox" name="hobbies[]" value="dancing">
                      <label for="check4"><img src="<?php echo base_url();?>assets/img/dance.png"><br>Dancing</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                 
                      <input id="check5" type="checkbox" name="hobbies[]" value="painting" >
                      <label for="check5"><img src="<?php echo base_url();?>assets/img/painting.png"><br>Painting</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check6" type="checkbox" name="hobbies[]" value="internet">
                      <label for="check6"><img src="<?php echo base_url();?>assets/img/internet.png"><br>Internet</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check7" type="checkbox" name="hobbies[]" value="travel">
                      <label for="check7"><img src="<?php echo base_url();?>assets/img/travel.png"><br>Travel</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check8" type="checkbox" name="hobbies[]" value="pets">
                      <label for="check8"><img src="<?php echo base_url();?>assets/img/pet.png"><br>Pets</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check9" type="checkbox" name="hobbies[]" value="landscape">
                      <label for="check9"><img src="<?php echo base_url();?>assets/img/landscape.png"><br>landscape</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check10" type="checkbox" name="hobbies[]" value="puzzle">
                      <label for="check10"><img src="<?php echo base_url();?>assets/img/puzzle.png"><br>Puzzle</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check11" type="checkbox" name="hobbies[]" value="musics">
                      <label for="check11"><img src="<?php echo base_url();?>assets/img/music.png"><br>Music</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check12" type="checkbox" name="hobbies[]" value="photo">
                      <label for="check12"><img src="<?php echo base_url();?>assets/img/photo.png"><br>Photo</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <input class="wed-hobby-input" placeholder="Add more Hobbies  eg: Farming, Fishing etc" name="other_hobbies">
              </ul>
              <h4>Your Favourite Music?</h4>
              <ul>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check14" type="checkbox" name="music[]" value="film">
                      <label for="check14"><img src="<?php echo base_url();?>assets/img/filmsong.png"><br>Film <br>Songs</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check15" type="checkbox" name="music[]" value="western">
                      <label for="check15"><img src="<?php echo base_url();?>assets/img/western.png"><br>Western <br>Music</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check16" type="checkbox" name="music[]" value="classic">
                      <label for="check16"><img src="<?php echo base_url();?>assets/img/classical.png"><br>Classic <br>Music</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <input class="wed-hobby-input" placeholder="Add more Favourites  eg: Fusion, Rock etc" name="other_music">
              </ul>
              <h4>Sports/ Fitness you like</h4>
              <ul>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check17" type="checkbox" name="sports[]" value="cricket">
                      <label for="check17"><img src="<?php echo base_url();?>assets/img/cricket.png"><br>Cricket</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check18" type="checkbox" name="sports[]" value="carrom">
                      <label for="check18"><img src="<?php echo base_url();?>assets/img/carom.png"><br>Carrom</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check19" type="checkbox" name="sports[]" value="jogging">
                      <label for="check19"><img src="<?php echo base_url();?>assets/img/joging.png"><br>Jogging</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check20" type="checkbox" name="sports[]" value="badminton">
                      <label for="check20"><img src="<?php echo base_url();?>assets/img/badminton.png"><br>Badminton</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check21" type="checkbox" name="sports[]" value="swimming">
                      <label for="check21"><img src="<?php echo base_url();?>assets/img/swimming.png"><br>Swimming</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check22" type="checkbox" name="sports[]" value="football">
                      <label for="check22"><img src="<?php echo base_url();?>assets/img/football.png"><br>Football</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check23" type="checkbox" name="sports[]" value="tennis">
                      <label for="check23"><img src="<?php echo base_url();?>assets/img/tennis.png"><br>Tennis</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <input id="check24" type="checkbox" name="sports[]" value="gym">
                      <label for="check24"><img src="<?php echo base_url();?>assets/img/gym.png"><br>Gym</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <input class="wed-hobby-input" placeholder="Others" name="other_sports">
              </ul>
              <h4>Spoken Languages</h4>
              <ul>
                <li>
                  <div class="wed-hobby-custom-check1">
                      <input id="check25" type="checkbox" name="languages[]" value="english">
                      <label for="check25">English</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check1">
                      <input id="check26" type="checkbox" name="languages[]" value="hindi">
                      <label for="check26">Hindi</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check1">
                      <input id="check27" type="checkbox" name="languages[]" value="tamil">
                      <label for="check27">Tamil</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check1">
                      <input id="check28" type="checkbox" name="languages[]" value="telugu">
                      <label for="check28">Telugu</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check1">
                      <input id="check29" type="checkbox" name="languages[]" value="kannada">
                      <label for="check29">Kannada</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check1">
                      <input id="check30" type="checkbox" name="languages[]" value="urdu">
                      <label for="check30">Urdu</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check1">
                      <input id="check31" type="checkbox" name="languages[]" value="marathi">
                      <label for="check31">Marathi</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check1">
                      <input id="check32" type="checkbox" name="languages[]" value="gujarathi">
                      <label for="check32">Gujarathi</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                  <input class="wed-hobby-input" placeholder="Others Languages known" name="other_languages">

              </ul>
              <div>
                <button class="wed-submit-btn1" type="submit">Submit</button>
                <button class="wed-skip-btn1">Skip</button>
              </div>
              <div class="wed-space"></div>

            </div>
          </form>
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </div>

<?php }else{


$hobbies=$data->hobbies;
$role_pages = explode(',', $hobbies);

$music=$data->music;
$role_pages1 = explode(',', $music);

$sports=$data->sports;
$role_pages2 = explode(',', $sports);

$languages=$data->languages;
$role_pages3 = explode(',', $languages);

?>
    <!-- TOP-BANNER -->

    <div class="wed-hobby-div">
      <div class="container container-custom">
        <div class="wed-space"></div>

        <div class="row">
          <div class="col-md-8">

            <form action="<?php echo base_url()?>Profile/get_hobbies" method="post"> 

            <div class="wed-hobby-section">
              <h4>What are your Hobbies and Interests?</h4>
              <ul>
                <li>
                  <div class="wed-hobby-custom-check">
                    <?php $c='cooking';
                    $c = (in_array($c, $role_pages)) ? "checked" : "";?>
                      <input id="check1" type="checkbox" name="hobbies[]" value="cooking" <?php echo $c; ?>>
                      <label for="check1"><img src="<?php echo base_url();?>assets/img/cooking.png"><br>Cooking</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                     <?php $c='nature';
                    $c = (in_array($c, $role_pages)) ? "checked" : "";?>
                      <input id="check2" type="checkbox" name="hobbies[]" value="nature" <?php echo $c; ?>>
                      <label for="check2"><img src="<?php echo base_url();?>assets/img/nature.png"><br>Nature</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                    <?php $c='movies';
                    $c = (in_array($c, $role_pages)) ? "checked" : "";?>
                      <input id="check3" type="checkbox" name="hobbies[]" value="movies" <?php echo $c; ?>>
                      <label for="check3"><img src="<?php echo base_url();?>assets/img/movies.png"><br>Movies</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <?php $c='dancing';
                    $c = (in_array($c, $role_pages)) ? "checked" : "";?>
                      <input id="check4" type="checkbox" name="hobbies[]" value="dancing" <?php echo $c; ?>>
                      <label for="check4"><img src="<?php echo base_url();?>assets/img/dance.png"><br>Dancing</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                     <?php $c='painting';
                    $c = (in_array($c, $role_pages)) ? "checked" : "";?>
                      <input id="check5" type="checkbox" name="hobbies[]" value="painting" <?php echo $c; ?>>
                      <label for="check5"><img src="<?php echo base_url();?>assets/img/painting.png"><br>Painting</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                     <?php $c='internet';
                    $c = (in_array($c, $role_pages)) ? "checked" : "";?>
                      <input id="check6" type="checkbox" name="hobbies[]" value="internet" <?php echo $c; ?>>
                      <label for="check6"><img src="<?php echo base_url();?>assets/img/internet.png"><br>Internet</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                     <?php $c='travel';
                    $c = (in_array($c, $role_pages)) ? "checked" : "";?>
                      <input id="check7" type="checkbox" name="hobbies[]" value="travel" <?php echo $c; ?>>
                      <label for="check7"><img src="<?php echo base_url();?>assets/img/travel.png"><br>Travel</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                     <?php $c='pets';
                    $c = (in_array($c, $role_pages)) ? "checked" : "";?>
                      <input id="check8" type="checkbox" name="hobbies[]" value="pets" <?php echo $c; ?>>
                      <label for="check8"><img src="<?php echo base_url();?>assets/img/pet.png"><br>Pets</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                     <?php $c='landscape';
                    $c = (in_array($c, $role_pages)) ? "checked" : "";?>
                      <input id="check9" type="checkbox" name="hobbies[]" value="landscape" <?php echo $c; ?>>
                      <label for="check9"><img src="<?php echo base_url();?>assets/img/landscape.png"><br>landscape</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                     <?php $c='puzzle';
                    $c = (in_array($c, $role_pages)) ? "checked" : "";?>
                      <input id="check10" type="checkbox" name="hobbies[]" value="puzzle" <?php echo $c; ?>>
                      <label for="check10"><img src="<?php echo base_url();?>assets/img/puzzle.png"><br>Puzzle</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                     <?php $c='musics';
                    $c = (in_array($c, $role_pages)) ? "checked" : "";?>
                      <input id="check11" type="checkbox" name="hobbies[]" value="musics" <?php echo $c; ?>>
                      <label for="check11"><img src="<?php echo base_url();?>assets/img/music.png"><br>Music</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                     <?php $c='photo';
                    $c = (in_array($c, $role_pages)) ? "checked" : "";?>
                      <input id="check12" type="checkbox" name="hobbies[]" value="photo" <?php echo $c; ?>>
                      <label for="check12"><img src="<?php echo base_url();?>assets/img/photo.png"><br>Photo</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <input class="wed-hobby-input" placeholder="Add more Hobbies  eg: Farming, Fishing etc" name="other_hobbies" value="<?php echo $data->other_hobbies; ?>">
              </ul>
              <h4>Your Favourite Music?</h4>
              <ul>
                <li>
                  <div class="wed-hobby-custom-check">
                     <?php $c='film';
                    $c = (in_array($c, $role_pages1)) ? "checked" : "";?>
                      <input id="check14" type="checkbox" name="music[]" value="film" <?php echo $c; ?>>
                      <label for="check14"><img src="<?php echo base_url();?>assets/img/filmsong.png"><br>Film <br>Songs</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <?php $c='western';
                    $c = (in_array($c, $role_pages1)) ? "checked" : "";?>
                      <input id="check15" type="checkbox" name="music[]" value="western" <?php echo $c; ?>>
                      <label for="check15"><img src="<?php echo base_url();?>assets/img/western.png"><br>Western <br>Music</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                      <?php $c='classic';
                    $c = (in_array($c, $role_pages1)) ? "checked" : "";?>
                      <input id="check16" type="checkbox" name="music[]" value="classic" <?php echo $c; ?>>
                      <label for="check16"><img src="<?php echo base_url();?>assets/img/classical.png"><br>Classic <br>Music</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <input class="wed-hobby-input" placeholder="Add more Favourites  eg: Fusion, Rock etc" name="other_music" value="<?php echo $data->other_music; ?>">
              </ul>
              <h4>Sports/ Fitness you like</h4>
              <ul>
                <li>
                  <div class="wed-hobby-custom-check">
                        <?php $c='cricket';
                    $c = (in_array($c, $role_pages2)) ? "checked" : "";?>
                      <input id="check17" type="checkbox" name="sports[]" value="cricket" <?php echo $c; ?>>
                      <label for="check17"><img src="<?php echo base_url();?>assets/img/cricket.png"><br>Cricket</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                         <?php $c='carrom';
                    $c = (in_array($c, $role_pages2)) ? "checked" : "";?>
                      <input id="check18" type="checkbox" name="sports[]" value="carrom" <?php echo $c; ?>>
                      <label for="check18"><img src="<?php echo base_url();?>assets/img/carom.png"><br>Carrom</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                         <?php $c='jogging';
                    $c = (in_array($c, $role_pages2)) ? "checked" : "";?>
                      <input id="check19" type="checkbox" name="sports[]" value="jogging" <?php echo $c; ?>>
                      <label for="check19"><img src="<?php echo base_url();?>assets/img/joging.png"><br>Jogging</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                         <?php $c='badminton';
                    $c = (in_array($c, $role_pages2)) ? "checked" : "";?>
                      <input id="check20" type="checkbox" name="sports[]" value="badminton" <?php echo $c; ?>>
                      <label for="check20"><img src="<?php echo base_url();?>assets/img/badminton.png"><br>Badminton</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                         <?php $c='swimming';
                    $c = (in_array($c, $role_pages2)) ? "checked" : "";?>
                      <input id="check21" type="checkbox" name="sports[]" value="swimming" <?php echo $c; ?>>
                      <label for="check21"><img src="<?php echo base_url();?>assets/img/swimming.png"><br>Swimming</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                         <?php $c='football';
                    $c = (in_array($c, $role_pages2)) ? "checked" : "";?>
                      <input id="check22" type="checkbox" name="sports[]" value="football" <?php echo $c; ?>>
                      <label for="check22"><img src="<?php echo base_url();?>assets/img/football.png"><br>Football</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                         <?php $c='tennis';
                    $c = (in_array($c, $role_pages2)) ? "checked" : "";?>
                      <input id="check23" type="checkbox" name="sports[]" value="tennis" <?php echo $c; ?>>
                      <label for="check23"><img src="<?php echo base_url();?>assets/img/tennis.png"><br>Tennis</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check">
                         <?php $c='gym';
                    $c = (in_array($c, $role_pages2)) ? "checked" : "";?>
                      <input id="check24" type="checkbox" name="sports[]" value="gym" <?php echo $c; ?>>
                      <label for="check24"><img src="<?php echo base_url();?>assets/img/gym.png"><br>Gym</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <input class="wed-hobby-input" placeholder="Others" name="other_sports" value="<?php echo $data->other_sports; ?>">
              </ul>
              <h4>Spoken Languages</h4>
              <ul>
                <li>
                  <div class="wed-hobby-custom-check1">
                          <?php $c='english';
                    $c = (in_array($c, $role_pages3)) ? "checked" : "";?>
                      <input id="check25" type="checkbox" name="languages[]" value="english" <?php echo $c; ?>>
                      <label for="check25">English</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check1">
                          <?php $c='hindi';
                    $c = (in_array($c, $role_pages3)) ? "checked" : "";?>
                      <input id="check26" type="checkbox" name="languages[]" value="hindi" <?php echo $c; ?>>
                      <label for="check26">Hindi</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check1">
                          <?php $c='tamil';
                    $c = (in_array($c, $role_pages3)) ? "checked" : "";?>
                      <input id="check27" type="checkbox" name="languages[]" value="tamil" <?php echo $c; ?>>
                      <label for="check27">Tamil</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check1">
                          <?php $c='telugu';
                    $c = (in_array($c, $role_pages3)) ? "checked" : "";?>
                      <input id="check28" type="checkbox" name="languages[]" value="telugu" <?php echo $c; ?>>
                      <label for="check28">Telugu</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check1">
                          <?php $c='kannada';
                    $c = (in_array($c, $role_pages3)) ? "checked" : "";?>
                      <input id="check29" type="checkbox" name="languages[]" value="kannada" <?php echo $c; ?>>
                      <label for="check29">Kannada</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check1">
                          <?php $c='urdu';
                    $c = (in_array($c, $role_pages3)) ? "checked" : "";?>
                      <input id="check30" type="checkbox" name="languages[]" value="urdu" <?php echo $c; ?>>
                      <label for="check30">Urdu</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check1">
                          <?php $c='marathi';
                    $c = (in_array($c, $role_pages3)) ? "checked" : "";?>
                      <input id="check31" type="checkbox" name="languages[]" value="marathi" <?php echo $c; ?>>
                      <label for="check31">Marathi</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                  <div class="wed-hobby-custom-check1">
                          <?php $c='gujarathi';
                    $c = (in_array($c, $role_pages3)) ? "checked" : "";?>
                      <input id="check32" type="checkbox" name="languages[]" value="gujarathi" <?php echo $c; ?>>
                      <label for="check32">Gujarathi</label>
                      <div class="clearfix"></div>
                  </div>
                </li>
                  <input class="wed-hobby-input" placeholder="Others Languages known" name="other_languages" value="<?php echo $data->other_languages; ?>">

              </ul>
              <div>
                <button class="wed-submit-btn1" type="submit">Submit</button>
                <button class="wed-skip-btn1">Skip</button>
              </div>
              <div class="wed-space"></div>

            </div>
          </form>
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </div>
<?php } ?>

</body></html>
