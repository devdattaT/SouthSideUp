<?php
    $filename = $_GET["img"];
    $rotang = 180; // Rotation angle
	$isPNG=endsWith($filename, "png");
	if($isPNG){
		$source = imagecreatefrompng($filename) or die('Error opening file '.$filename);
	}else{
		$source = imagecreatefromjpeg($filename) or die('Error opening file '.$filename);
	}
    imagealphablending($source, false);
    imagesavealpha($source, true);

    $rotation = imagerotate($source, $rotang, imageColorAllocateAlpha($source, 0, 0, 0, 127));
    imagealphablending($rotation, false);
    imagesavealpha($rotation, true);

	if($isPNG){
		header('Content-type: image/jpg');
	}else{
		header('Content-type: image/png');
	}
    imagepng($rotation);
    imagedestroy($source);
    imagedestroy($rotation);
	
	
	function endsWith($haystack, $needle)
{
    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
}
?>