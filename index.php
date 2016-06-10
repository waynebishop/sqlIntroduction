<?php

include "database.php";
$movies = getMovieList();
$singlemovie = getSingleMovie(); 

if(!isset($_GET['page'])){
	
	include "home.php";

} else if($_GET['page'] == 'delete'){
	deleteMovie();
} else if($_GET['page'] == 'movie'){
	include "movie.php";
}


?>
