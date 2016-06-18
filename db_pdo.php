<?php

//set up connection and creating a db handler
$dsn = "mysql:host=localhost;dbname=sqlIntro;charset=utf8";

$dbc = new PDO($dsn,'root','');

//set attributes for error mode
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function getMovieList() {

	global $dbc;

	$sql = "SELECT id, title, description, release_date FROM movies";

	$statement = $dbc->prepare($sql);
	$statement->execute();

	$movieArray = [];

	while($allMovies = $statement->fetch(PDO::FETCH_ASSOC)){
		$movieArray[]=$allMovies;
	}

	return $movieArray;

}
function getSingleMovie() {
	global $dbc;

	if(isset($get['id'])){
		$id = $_GET['id'];
	} else {
		$id = null;
	}

	$sql = "SELECT id,title,description, release_date, duration FROM movies WHERE id =:id";

	$statement = $dbc->prepare($sql);
	$statement->bindValue(":id", $id);
	$statement->execute();

	$singlemovie = $statement->fetch(PDO::FETCH_ASSOC);
	return $singlemovie;
}

function genreList() {
	global $dbc;

	$id = isset($_GET['id']) ? $_GET['id'] : null;

	$sql="SELECT id, genre FROM genres JOIN movie_genre ON id=genre_id WHERE movie_id = '$id'";

	//New stuff
	$statement = $dbc->prepare($sql);
	$statement->bindValue(":id", $id);
	$statement->execute();


	// $result = $dbc->query($sql);

	$genreArray = [];	

	while($allGenres = $statement->fetch(PDO::FETCH_ASSOC)){
		$genreArray[]=$allGenres;
	}

	return $genreArray;

} 












?>