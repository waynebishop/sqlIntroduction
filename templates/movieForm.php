<?php

if(isset($_GET['id'])) {
	$verb = "Edit";
	$action = "./?page=edit";
}	else {
	$verb = "Add";
	$action = "./?page=insert";
} 

?>

<!DOCTYPE html>
<html>
<head>
	<title>Movie create form</title>
</head>
<body>
	<h1><?=$verb;?> movie</h1>
	<form method="post" action="<?=$action?>">

	<input type="hidden" name="id" value="<?=$singlemovie->id ?>">			
	<div>
		<label>Title</label>
		<input type="text" name="title" value="<?=$singlemovie->title ?>">	
	</div>

	<div>
		<label>Description</label>
		<textarea name="description"><?=$singlemovie->description?></textarea>	
	</div>

	<div>
		<label>Rating</label>
		<select name="rating" value="<?=$singlemovie->rating?>">
			<option value="PGR">PGR</option>
			<option value="R">R</option>
			<option value="M">M</option>
			<option value="G">G</option>
		</select>	
	</div>

	<div>
		<label>Year Released</label>
		<input type="year" name="release_date" value="<?=$singlemovie->release_date?>">	
	</div>

	<div>
		<label>Duration</label>
		<input type="number" name="duration" value="<?=$singlemovie->duration?>">	
	</div>
	
	<button type="submit">Submit</button>

</body>
</html>		