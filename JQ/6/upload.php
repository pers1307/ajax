<?php
	
	require ("uploadcrop.lib.php");
	
	$test = new UploadCrop();
	
	if (!isset($_POST['image'])) {
	
		$test2 = $test->uploadImage();
		
		echo '{"width": "'.$test2['width'].'", "height": "'.$test2['height'].'", "thumbW": "'.$test2['thumbW'].'", "thumbH": "'.$test2['thumbH'].'"}';
		
	} else {
	
		$test->createThumbnailImage($_POST['image'],$_POST['w'],$_POST['h'],$_POST['x1'],$_POST['y1']);
	
	}