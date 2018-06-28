<?php

$ffmpeg = '/ffmpeg/bin/';

//video dir
$video = 'video.mp4';

//where to save the image
$image = 'image.jpg';;

//time to take screenshot at
$interval = 10;

//screenshot size
$size = '320x240';

// Only thumb
shell_exec("ffmpeg -i $video -deinterlace -an -ss $interval -f mjpeg -t 1 -r 1 -y -s $size $image 2>&1");
echo '<img src="'. $image.'" alt="">';


// Thumb with watermark

/*$outimg = 'thumb/'.time().'.jpg';
shell_exec('ffmpeg -i '.$image.' -vf "movie=watermark.png [watermark]; [in][watermark] overlay=(main_w-overlay_w-10)/2:(main_h-overlay_h-10)/2 [out]" '.$outimg.'.jpg');
@unlink($image);
echo '<img src="'. $outimg.'" alt="">';*/