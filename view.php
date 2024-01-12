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
	<p>Word: <?= $currentWord->getEnglishTranslation() ?> </p>
	<form method="POST">
		<label for="answer">Answer: </label>
		<input type="text" id="answer" name="answer">
		<input type="submit" value="Submit">
	</form>
	<?= !empty($_SESSION['message']) ? $_SESSION['message'] : "" ?>
	<p>Player: <?= $player->getName() ?></p>
	<p>Score: <?= $player->getScore() ?></p>
</body>

</html>