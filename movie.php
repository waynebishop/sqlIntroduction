<?php
$genres = genreList();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
    <title>Introduction to MySQL</title>
    <link rel="stylesheet" type="text/css" href="">
  </head>
  <body>
  	
  	
  	<h1><?=$singlemovie['title']?></h1>
  	<p>Release Year - <?=$singlemovie['release_date']?></p>
  	<p><?=$singlemovie['description']?></p>
    <p>Duration - <?=$singlemovie['duration']?> Minutes</p>
    <?php
    // var_dump($genres);
    // var_dump($genre);
    foreach ($genres as $genre) {
        echo "<strong><span>". $genre['genre'] ."&nbsp;</span></strong>"; 
      }

    ?>

    <br>
    <br>
    <!-- When this link is clicked, link goes to index page with page = -->
    <!-- switches to case with Edit -->
  	<a href="./?page=movieForm&amp;id=<?=$singlemovie['id']?>">Edit Movie</a>

  	<br>

    <!-- When this link is clicked, link goes to index page with page = -->
    <!-- switches to case with Delete -->
  	<a href="./?page=delete&amp;id=<?=$singlemovie['id']?>">Delete Movie</a>

  	<br>

    <!-- When this link is clicked, link goes to index page with page = -->
    <!-- switches to case with HomeEdit -->
  	<a href="./">Back to Movies List</a>

  </body>
</html>