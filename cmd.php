<?php

//initially
$comment = "";
$answer = "";

//if the form is submitted
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['preview-form-comment'])) {
	$comment = $_POST['preview-form-comment'];
	$file="code.cpp";
	file_put_contents($file, $comment);

	putenv("PATH=C:\MinGW\bin");

	shell_exec("g++ code.cpp -o code.exe");//compile

	$answer= shell_exec("code.exe");// run
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>CodeMirror - Form</title>
		<link rel="stylesheet" type="text/css" href="plugin/codemirror/lib/codemirror.css">
		<link rel="stylesheet" type="test/css" href="css/bootstrap.min.css">
	</head>
	<body>
		<nav class="navbar navbar-dark bg-dark"></nav>
		<div>HELLO</div>
		<form id="preview-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<textarea class="codemirror-textarea" name="preview-form-comment" id="preview-form-comment"><?php echo $comment; ?></textarea>
			<br>
			<input type="submit" name="preview-form-submit" id="preview-form-submit" value="Submit">
			<textarea name="output" disabled class="codemirror-textarea" placeholder="Compiled Code Here..."><?php echo $answer; ?></textarea>
		</form>
		<div id="preview-comment"><?php echo $answer; ?></div>

		<!-- javascript -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="plugin/codemirror/lib/codemirror.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/default.js"></script>
	</body>
</html>