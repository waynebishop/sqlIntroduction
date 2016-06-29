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

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	} else {
		$id = null;
	}

	$sql = "SELECT id,title,description, release_date, duration, rating FROM movies WHERE id =:id";

	$statement = $dbc->prepare($sql);
	$statement->bindValue(":id", $id);
	$statement->execute();

	$singlemovie = $statement->fetch(PDO::FETCH_ASSOC);
	return $singlemovie;
}

function deleteMovie() {
	global $dbc;
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	} 

	$sql = "DELETE FROM movies WHERE id =:id";

	$statement = $dbc->prepare($sql);
	$statement->bindValue(":id", $id);
	$statement->execute();

	header("Location:./");
}

function editMovie() {
	
	global $dbc;
	
	// Obtain all information from $_POST
	$id = $_POST['id'];
	$title=$_POST['title'];
	$description=$_POST['description'];
	$rating=$_POST['rating'];
	$duration=$_POST['duration'];
	$date=$_POST['release_date'];

	$sql = "UPDATE movies SET title='$title', description='$description', rating='$rating', release_date='$date', duration='$duration' where id=:id";
	
	$statement = $dbc->prepare($sql);
	$statement->bindValue(":id", $id);
	$statement->execute();

	header("Location:./?page=movie&id=$id");

}

function addMovie() {

	global $dbc;
	// Obtaining all values from the $_POST array
	$title=$_POST['title'];
	$description=$_POST['description'];
	$rating=$_POST['rating'];
	$duration=$_POST['duration'];
	$date=$_POST['release_date'];

	$sql = "INSERT INTO movies(title, description, rating, duration, release_date) VALUES ('$title','$description','$rating','$duration','$date')";

	$statement = $dbc->prepare($sql);
	$statement->execute();	

	header("Location:./?page=home");

}

function genreList() {
	global $dbc;

	$id = isset($_GET['id']) ? $_GET['id'] : null;

	$sql="SELECT id, genre FROM genres JOIN movie_genre ON id=genre_id WHERE movie_id = '$id'";

	//New stuff
	$statement = $dbc->prepare($sql);
	$statement->bindValue(":id", $id);
	$statement->execute();

	$genreArray = [];	

	while($allGenres = $statement->fetch(PDO::FETCH_ASSOC)){
		$genreArray[]=$allGenres;
	}

	return $genreArray;
} 


?>