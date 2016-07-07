<?php

require "Views/MoviesView.php";
require "Views/MovieFormView.php";

class MoviesController extends Controller
{
	public function show() {
		
		$singlemovie = new Movie($_GET['id']);

		// var_dump($singlemovie);

		
		$view = new MoviesView(compact('singlemovie'));
		$view->render();
	} 

	public function add() {
		$singlemovie = new Movie;
		// var_dump($singlemovie);
		$view = new MovieFormView(compact('singlemovie'));
		$view->render();

	}

	public function insert() {
		$movie = new Movie($_POST);
		$movie->insert();
	}

	public function edit() {
		$movie = new Movie;
		$singlemovie = $movie->find();
		// var_dump($singlemovie);
		$view = new MovieFormView(compact('singlemovie'));
		$view->render();
		// Movie::editMovie();
		// header("Location:./");
	}

	public function delete() {
		Movie::deleteMovie();
		header("Location:./");
	}
}