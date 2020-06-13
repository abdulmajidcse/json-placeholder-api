<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include_once 'Controller/CurlController.php';
	include_once 'Controller/DataController.php';

	$dataObject = new DataController();
	$data = ['userId' => 2, 'title' => $_POST['title'], 'body' => $_POST['body']];
	$result = $dataObject->store($data);

	if ($result == null) {
		$_SESSION['msg'] = 'Something went wrong!';
		header("Location: index.php");
		die();
	}

} else {
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>JSON Placeholder Rest API</title>
  </head>
  <body>
    
    <header class="container-fluid p-4">
    	<h3>JSON Placeholder - Fake Online Rest API Test (CRUD)</h3>
    	<a href="create.php" class="btn btn-primary">Create Post</a>
    	<a href="index.php" class="btn btn-primary">Go to Home</a>
    </header>

	<section class="container mt-5">
		<h5>Your created post</h5>
		<hr>
		<?php
			echo "<pre>";
			var_dump($result);
			echo "</pre>";
		?>
	</section>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>