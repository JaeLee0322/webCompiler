<?php 
	$current="";
	$answer="";

	if (!empty($_POST))
	{
		//write the input to a file
		$current=$_POST['code'];
		file_put_contents("to_compile.cpp", $current);

		//compile and run the code on the server
		putenv("PATH=C:\MinGW\bin");
		shell_exec("g++ to_compile.cpp -o compiled.exe 2> errorFile.txt");//compile
		if (file_exists("compiled.exe")) $answer= shell_exec("compiled.exe");// run

		//delete the files after
		sleep(2);
		if (file_exists("to_compile.cpp")) unlink("to_compile.cpp");
		if (file_exists("compiled.exe")) unlink("compiled.exe");
	}
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<!-- meta tags required for bootstrap -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>WebCompiler</title>

		<!-- Custom CSS -->
		<link rel="stylesheet" type="text/css" href="css/default.css">

		<!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    	<!-- CodeMirror CSS -->
		<link rel="stylesheet" type="text/css" href="plugin/codemirror/lib/codemirror.css">
	</head>

	<body>
		<!-- sidebar -->
		<div id="side-nav-id" class="side-nav">
			<a href="#">Compilers</a>
			<a href="#">Compressions</a>
			<a href="#">Game(ARG.IO)</a>
			<a href="#">Coming Soon</a>
		</div>
		<!-- /sidebar -->

		<!-- navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar-id">

			<a onclick="toggleSideNav()" class="navbar-brand"><img src="image/icon.svg" alt="site icon" class="main-icon"> Jae's Project</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNav">
				<div class="navbar-nav mr-auto">
					<a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link" href="#">Features</a>
					<a class="nav-item nav-link" href="#">Pricing</a>
					<a class="nav-item nav-link disabled" href="#">Disabled</a>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown link</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						    <a class="dropdown-item" href="#">Action</a>
						    <a class="dropdown-item" href="#">Another action</a>
						    <a class="dropdown-item" href="#">Something else here</a>
						</div>
					</li>
				</div>

				<form class="form-inline my-2 my-lg-0">
				    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="test()">Search</button>
				</form>

			</div>
		</nav>
		<!-- /navbar -->

		<!-- codemirror -->
		<div id="main" class="main-block row no-gutters">

			<div class="col-md-6 no-gutters" id="leftDiv">
				<div class="leftside" style="color: white;">
					<form method="post" id="text-editor">
						<textarea class="codemirror-textarea" id="code" name="code" placeholder="Enter C/C++ Code Here..."><?php echo $current; ?></textarea>
						<br>
						<input type="submit">
					</form>
					<!--<div id="preview-comment" style="color: white;"><?php echo $answer; ?></div>-->
				</div>
			</div>

			<div class="col-md-6 no-gutters" id="rightDiv">
				<div class="rightside">
					<textarea disabled class="form-control"><?php echo $answer; ?></textarea>
				</div>
			</div>

		</div>
		<!-- codemirror -->

		<!-- CodeMirror Jquery/Js -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="plugin/codemirror/lib/codemirror.js"></script>
		<script type="text/javascript" src="js/default.js"></script>

		<!-- CodeMirror Addons -->
		<script type="text/javascript" src="js/placeholder.js"></script>


		<!-- Bootstrap Jquery/Js -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    	<!-- Window Resizing -->
    	<script>
    		window.addEventListener("resize", displayWindowSize);
    		displayWindowSize();
    	</script>

	</body>
</html>