<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Video watermarking and get duration</title>
</head>
<body>

<?php

// Path of ffmpeg
$ffmpegpath = 'ffmpeg/bin';

$watermarkvfile = 'video.mp4';
$watermarkifile = 'image.jpg';

$durationfile = 'video.mp4';
// $durationfile = 'audio.mp3';


//watermarking video
shell_exec('ffmpeg -i '.$watermarkvfile.' -vf "movie=watermark.png [watermark]; [in][watermark] overlay=(main_w-overlay_w-10)/2:(main_h-overlay_h-10)/2 [out]" watermarkfile.mov');

//watermarking image
shell_exec('ffmpeg -i '.$watermarkifile.' -vf "movie=watermark.png [watermark]; [in][watermark] overlay=(main_w-overlay_w-10)/2:(main_h-overlay_h-10)/2 [out]" watermarkfile.jpg');


//get audio & video duration
$result = shell_exec($ffmpegpath.' -i ' . escapeshellcmd($durationfile) . ' 2>&1');
preg_match('/(?<=Duration: )(\d{2}:\d{2}:\d{2})\.\d{2}/', $result, $match);
print_r("Duration: ".$match[1]);

?>

</body>
</html>