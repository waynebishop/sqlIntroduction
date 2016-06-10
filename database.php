<?php

$dbc = new mysqli('localhost', 'root','','sindhu_db');

function getMovieList() {

	global $dbc;

	$sql = "SELECT id, title, description, release_date FROM movies";

	$result = $dbc->query($sql);

	$movieArray = [];

	while($allMovies = $result->fetch_assoc()){
		$movieArray[]= $allMovies;
	}
	
	return $movieArray;

}

function getSingleMovie() {
	global $dbc;

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	} else {
		$id = 2;
	}

	$sql = "SELECT id, title, description, release_date FROM movies WHERE id ='$id'";

	$result = $dbc->query($sql);

	$singlemovie = $result->fetch_assoc();
	return $singlemovie;

}
function deleteMovie() {
	global $dbc;
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	} 

	$sql = "DELETE FROM movies WHERE id = '$id'";

	$result = $dbc->query($sql);
	header("Location:./");
}




?>