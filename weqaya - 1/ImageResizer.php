<?php
// Function for resizing jpg, gif, or png image files
function ali_img_resize($imgName, $w, $h) {
    $target="images/".$imgName;//image to convert path
    $newcopy="images/height_".$h."/".$imgName;//distination file path "output"
    $kaboom = explode(".", $imgName); // Split file name into an array using the dot
    $fileExt = end($kaboom); // Now target the last array element to get the file extension
    $ext=$fileExt;
    //var_dump($target);
    list($w_orig, $h_orig) = getimagesize($target);
    $scale_ratio = $w_orig / $h_orig;
    if (($w / $h) > $scale_ratio) {
           $w = $h * $scale_ratio;
    } else {
           $h = $w / $scale_ratio;
    }
    //$newSize = new_size($w, $h, $w_orig, $h_orig);
    //$w = $newSize['w'];
    //$h = $newSize['h'];
    //var_dump($w);

    // }
    $img = "";
    $ext = strtolower($ext);
    if ($ext == "gif"){ 
      $img = imagecreatefromgif($target);
    } else if($ext =="png"){ 
      $img = imagecreatefrompng($target);
    } else { 
      $img = imagecreatefromjpeg($target);
    }
    $tci = imagecreatetruecolor($w, $h);
    // imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
    imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
    if ($ext == "jpeg"){ 
      imagejpeg($tci, $newcopy, 15);
    } else if($ext =="png"){
      imagepng($tci, $newcopy, 15);
    } else{
      imagegif($tci, $newcopy, 15);
    }

}

function crop_image($imgName, $new_h, $new_w ){

    $target="images/".$imgName;//image to convert path
    list($w_orig, $h_orig) = getimagesize($target);
    if($w_orig < $h_orig)
        $rate_w = $new_w;
        $rate_h = $new_h;

    //if original width bigger than dist width
    if($w_orig>=$new_w && $w_orig >= $h_orig){
        $rate_w = ($new_w/$new_h)*$h_orig;
        $rate_h = $h_orig;
    }
    else if($h_orig >= $new_h ){
        $rate_w = ($new_w/$new_h)*$h_orig;
        $rate_h = $h_orig;
    }
    //first point (the start point)
    $x1 = 0;
    $y1 = ($h_orig/2) + ($new_h/2);
    //second point (the end point)
    //$x2 = $w_orig;
    //$y2 = ($h_orig/2) - ($new_h/2);

    //$percent = 0.5;

    list($width, $height) = getimagesize($filename);
    //source image croping height and width
    $new_width  = $x2 - $x1;
    $new_height = $y2 - $y1;

    $image_p = imagecreatetruecolor($new_w, $new_h);
    $image = imagecreatefromjpeg($filename);

    imagecopyresampled($image_p, $image, 0, 0 , $x1 , $y1 ,$new_w, $new_h, $new_width, $new_height);

// Outputs the image
//header('Content-Type: image/jpeg');
//imagejpeg($image_p, null, 100);
}

function new_size($area_width, $area_height, $pic_width, $pic_height) {
    if ($pic_width <= $area_width && $pic_height <= $area_height) return Array('w'=>$pic_width, 'h'=>$pic_height);
    if ($pic_width <= $area_width && $pic_height > $area_height) return Array('w'=>$pic_width*($area_height/$pic_height), 'h'=>$area_height);
    if ($pic_width > $area_width && $pic_height <= $area_height) return Array('w'=>$area_width, 'h'=>$pic_height*($area_width/$pic_width));

    if ($pic_width == $pic_height) {
        if ($area_width > $area_height) return Array('w'=>$pic_width*($area_height/$pic_height), 'h'=>$area_height);
        if ($area_width <= $area_height) return Array('w'=>$area_width, 'h'=>$pic_height*($area_width/$pic_width));
    }


}
?>
