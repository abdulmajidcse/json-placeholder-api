<?php
  session_start();
  if ($_GET['id'] == null || $_GET['userId'] == null || $_GET['title'] == null || $_GET['body'] == null) {
    $_SESSION['msg'] = 'Something went wrong!';
    header("Location: index.php");
    die();
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
    	<a href="index.php" class="btn btn-primary">Go to Home</a>
    </header>

	<section class="container mt-5">
		<form action="update.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
      <input type="hidden" name="userId" value="<?php echo $_GET['userId']; ?>">
			<input type="text" name="title" placeholder="Post Title" class="form-control mb-2" required="" value="<?php echo $_GET['title']; ?>">
			<textarea name="body" cols="30" rows="10" class="form-control mb-2" placeholder="Post Content" required=""><?php echo $_GET['body']; ?></textarea>
			<button class="btn btn-primary" type="submit">Save</button>
		</form>
	</section>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>