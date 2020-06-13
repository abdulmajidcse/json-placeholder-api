<?php
/**
 * Fetch API data controller with cURL
 */
class DataController
{
	public $apiObject;
	public $jsonData;
	public function __construct()
	{
		// CurlController object to call API
		$this->apiObject = new CurlController();
	}
	/**
	 * Get all post data
	 */
	public function index()
	{
		$this->jsonData = $this->apiObject->callApi('GET', 'https://jsonplaceholder.typicode.com/posts');
		return json_decode($this->jsonData);
	}

	/**
	 * store a post
	 */
	public function store($data)
	{
		$this->jsonData = $this->apiObject->callApi('POST', 'https://jsonplaceholder.typicode.com/posts', json_encode($data));
		return json_decode($this->jsonData);
	}

	/**
	 * update a post
	 */
	public function update($data)
	{
		$this->jsonData = $this->apiObject->callApi('PUT', 'https://jsonplaceholder.typicode.com/posts/'.$data['id'], json_encode($data));
		return json_decode($this->jsonData);
	}

	/**
	 * delete a post
	 */
	public function destroy($data)
	{
		$this->jsonData = $this->apiObject->callApi('DELETE', 'https://jsonplaceholder.typicode.com/posts/'.$data['id'], json_encode($data));
		return json_decode($this->jsonData);
	}
}