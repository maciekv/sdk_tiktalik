<?php

	// Enable full-blown error reporting. http://twitter.com/rasmus/status/7448448829
	error_reporting(-1);

	// Set plain text headers
	header("Content-type: text/plain; charset=utf-8");

	// Include the SDK
	require_once '../tiktalik.class.php';


	$s3 = new TiktalikFiles();

	$bucket = 'php-sdk-getting-started-' . strtolower($s3->key) . '-' . time();

	$create_bucket_response = $s3->create_bucket($bucket, TiktalikFiles::REGION_PL_E1, TiktalikFiles::ACL_AUTH_READ);

	//var_dump($create_bucket_response);
	var_dump($create_bucket_response->isOK());
	// Provided that the bucket was created successfully...
	if ($create_bucket_response->isOK())
	{
		echo("Bucket created, adding new file 'test-file'");
		$resp = $s3->create_object($bucket, "test-file", array("body"=>"TEST CONTENT", "acl"=>AmazonS3::ACL_PUBLIC, "contentType"=>"text/plain"));
		var_dump($resp);
		
	} else {
		echo("Could not create");
	}

