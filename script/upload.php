<?php 
	
session_start();
$_SESSION['message'] = "";

	if(isset($_POST['upload_btn'])){

		// getting file from user / HTML
		$file       = $_FILES['my_file'];
		$name 		= $file['name'];
		$main_file  = $file['tmp_name'];

		// predefined file type
		$mimet = array( 
		    'png' 	=> 'image/png',
		    'jpe' 	=> 'image/jpeg',
		    'jpeg' 	=> 'image/jpeg',
		    'jpg' 	=> 'image/jpeg',
		    'gif' 	=> 'image/gif',
		    'bmp' 	=> 'image/bmp',
		    'ico' 	=> 'image/vnd.microsoft.icon',
		    'tiff' 	=> 'image/tiff',
		    'tif' 	=> 'image/tiff',
		    'svg' 	=> 'image/svg+xml',
		    'svgz' 	=> 'image/svg+xml',
		);

		// getting the file type
		$f_info = finfo_open(FILEINFO_MIME_TYPE);
		$type   = finfo_file($f_info, $main_file);

		// image type or file type check
		if(!in_array($type,$mimet)){
			$_SESSION['message'] = "Not Image";
			return header("Location: ../index.php");
		}


		// image height, width validation
		$width_height = getimagesize($main_file);
		$width  = $width_height[0];
		$height = $width_height[1];

		if($width != 300 && $height != 300){
		 	$_SESSION['message'] = "Please Upload 300x300 pixel Image.";
			return header("Location: ../index.php");
		 }

		// image size(MB/KB) validation
		$image_size = $file['size']; // size in byte
		$MB_2 = 2000000; // 2 MB

		if($image_size > $MB_2){
			$_SESSION['message'] = "Image is too large. Please upload <= 2MB image.";
			return header("Location: ../index.php");
		}


		// getting extention
		$ext = explode(".", $name);
		$ext = end($ext);

		// makes uinique name
		$new_name = "upload-image-".time().".".$ext;

		// upload path setup
		$upload_location = "../upload/";
		$new_upload_file = $upload_location.$new_name;

		// upload
		move_uploaded_file($main_file,$new_upload_file);

		$_SESSION['message'] = "Success";
		return header("Location: ../index.php");
	}

?>
