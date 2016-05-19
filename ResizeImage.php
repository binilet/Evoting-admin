<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ResizeImage
 *
 * @author IT
 */
class ResizeImage {
    //put your code here
    function ak_img_resize($target,$newcopy,$w,$h,$ext){
		list($w_orig,$h_orig) = getimagesize($target);		
		$img = "";
		if($ext == 'gif' || $ext == 'GIF'){
			$img = imagecreatefromgif($target);
		}else if($ext == 'png' || $ext == 'PNG'){
			$img = imagecreatefrompng($target);
		}else{
			$img = imagecreatefromjpeg($target);
		}
		$tci = imagecreatetruecolor($w,$h);
		imagecopyresampled($tci,$img,0,0,0,0,$w,$h,$w_orig,$h_orig);
		imagejpeg($tci,$newcopy,80);
		//unlink($target);
	}
}
