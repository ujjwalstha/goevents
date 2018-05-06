<?php

$str = md5(microtime());

$str = substr($str, 0, 5);

$this->load->library('session');

$this->session->userdata('catcha_code') = $str;

$img = imagecreate(80, 30);

imagecolorallocate($img, 205, 255, 255);

$txtcol = imagecolorallocate($img, 196, 199, 200);

imagestring($img, 20, 17, 5, $str, $txtcol);

header('Content:image/jpeg');

imagejpeg($img);

?>