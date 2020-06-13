<?php
session_start();
// check get method variable
if (isset($_GET['id']) && $_GET['id'] != null) {
	include_once 'Controller/CurlController.php';
	include_once 'Controller/DataController.php';
	
	$data = ['id' => $_GET['id']];

	$dataObject = new DataController();
	$result = $dataObject->destroy($data);

	if (is_object($result)) {
		$_SESSION['msg'] = 'Post Deleted Successfully!';
	} else {
		$_SESSION['msg'] = 'Something went wrong!';
	}
} else {
	$_SESSION['msg'] = 'Something went wrong!';
}
header("Location: index.php");