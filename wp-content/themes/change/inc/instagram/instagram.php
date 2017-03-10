<?php
/*
HOW TO GET THE ACCESS_TOKEN & USER_ID

ACCESS_TOKEN:
--------------------------------
Make sure you have created your application first on: https://www.instagram.com/developer & make sure implicit OAuth is unchecked in the security tab after creating your application.
Replace CLIENT_ID with your CLIENT_ID & Replace REDIRECT_URL with your REDIRECT_URL.
https://api.instagram.com/oauth/authorize/?client_id=CLIENT_ID&redirect_uri=REDIRECT_URL&response_type=token

USER_ID:
--------------------------------
http://www.otzberg.net/iguserid/
Gets user id from a published image, USER MUST HAVE AN IMAGE PUBLISHED!

OTHER SETTINGS
-------------------------------
Show Caption Text: '.htmlentities($post->caption->text).'
Show Published Time: '.htmlentities(date("F j, Y, g:i a", $post->caption->created_time)).'
Images sizes: low_resolution, thumbnail and standard_resolution.
*/

$number_of_images = '5';
$number_of_images_mob = '1';
$access_token = '4445846.b327da7.69d6eb278f7e49509658ec29c814e433';
$user_id = '4445846';
$image_size = 'low_resolution';

function fetchData($url){
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_TIMEOUT, 20);
   $result = curl_exec($ch);
   curl_close($ch);
   return $result;
}

$result = fetchData("https://api.instagram.com/v1/users/{$user_id}/media/recent/?access_token={$access_token}&count={$number_of_images}");
$result = json_decode($result);

echo '<section class="content-shift clearfix desktop">';

foreach ($result->data as $post) {
    if(empty($post->caption->text)) {
    // Do Nothing
  }
  else {
      echo '<div class="fifth-block">';
         echo '<a href="'.$post->link.'" target="blank">';
            echo '<img src="'.$post->images->{$image_size}->url.'" alt="'.$post->caption->text.'" title="'.$post->caption->text.'"/>';
            echo '<div class="overlay-insta"></div>';
         echo '</a>';
      echo '</div>';
  }

}

  echo '<div class="fifth-block--title">#livegray</div>';
echo '</section>';

function fetchDataMob($url){
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_TIMEOUT, 20);
   $resultMob = curl_exec($ch);
   curl_close($ch);
   return $resultMob;
}

$resultMob = fetchDataMob("https://api.instagram.com/v1/users/{$user_id}/media/recent/?access_token={$access_token}&count={$number_of_images_mob}");
$resultMob = json_decode($resultMob);

echo '<section class="content-shift clearfix mobile">';

foreach ($resultMob->data as $post) {
    if(empty($post->caption->text)) {
    // Do Nothing
  }
  else {
      echo '<div class="fifth-block">';
         echo '<a href="'.$post->link.'" target="blank">';
            echo '<img src="'.$post->images->{$image_size}->url.'" alt="'.$post->caption->text.'" title="'.$post->caption->text.'"/>';
            echo '<div class="overlay-insta"></div>';
         echo '</a>';
      echo '</div>'; //instagram-image Ends
  }
}

  echo '<div class="fifth-block--title">#livegray</div>';
echo '</section>';

?>