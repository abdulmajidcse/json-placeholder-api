<?php
	session_start();
	// alert message
	if (isset($_SESSION['msg'])) {
		echo "<script>alert('".$_SESSION['msg']."');</script>";
	}
	session_destroy();
	// include controller classes
	include_once 'Controller/CurlController.php';
	include_once 'Controller/DataController.php';

	// create object to fetch post data
	$dataObject = new DataController();
	$result = $dataObject->index();
	// if fail to fetch post data
	if ($result == null) {
		echo "<script>alert('Please, reload the page or check your internet connection!');</script>";
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
    	<!-- create post -->
    	<a href="create.php" class="btn btn-primary">Create Post</a>
    </header>

	<section class="container-fluid mt-5">
		<div class="table-responsive">
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th>#</th>
						<th>User Id</th>
						<th>Post Title</th>
						<th>Post Content</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						// all post data. here has only 20 post in 100 post
						foreach ($result as $post) { ?>
							<tr>
								<td><?php echo $post->id; ?></td>
								<td><?php echo $post->userId; ?></td>
								<td><?php echo $post->title; ?></td>
								<td><?php echo $post->body; ?></td>
								<td><a href="edit.php?id=<?php echo $post->id; ?>&userId=<?php echo $post->userId; ?>&title=<?php echo $post->title; ?>&body=<?php echo $post->body; ?>" class="btn btn-sm btn-info">Edit</a><a onclick="return confirm('Are you want to delete this post?')" href="delete.php?id=<?php echo $post->id; ?>" class="btn btn-sm btn-danger">Delete</a></td>
							</tr>
						<?php
							if ($post->id > 19) {
								break;
							}
						 }
					?>
				</tbody>
			</table>
		</div>
	</section>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>