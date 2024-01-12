<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Game</title>
</head>

<body>
	<h1>Language game</h1>

	<p>Word: <?= $currentWord ?> </p>
	<form method="POST">
		<label for="answer">Answer: </label>
		<input type="text" id="anwser" name="answer">
		<input type="submit" value="Submit">
	</form>

	<?= $_SESSION['message'] ?>
</body>

</html>