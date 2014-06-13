<?php


session_start();

if(!(isset($_SESSION['usr']) && isset($_SESSION['pswd']))) {
	header('Location:login.html');
}

$link = mysqli_connect('localhost','root','root','ljekarna');

	if(mysqli_connect_errno()) {
		printf("Connect faild: %s\n", mysqli_connect_error());
		exit();
	}




$result = mysqli_query($link,"SELECT spol FROM podaci");
$a=mysqli_num_rows($result);

$muskarci=0;
$zene=0;
while($row = mysqli_fetch_array($result))
  {
 	if($row['spol']=='M'){
 		$muskarci++;
 	}
 	else{
 		$zene++;
 	}
 	
  }



$data=array($zene,$muskarci); //fill this array with your data
$total=array_sum($data);
for($i=0;$i<count($data);$i++)
{
$arc[$i]=$data[$i]*360/$total;	
}
// create image

$image = imagecreatetruecolor(550,550);
$style=IMG_ARC_PIE;
// allocate some colors
$white    = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
$gray     = imagecolorallocate($image, 0xC0, 0xC0, 0xC0);
$darkgray = imagecolorallocate($image, 0x90, 0x90, 0x90);
$navy     = imagecolorallocate($image, 0x00, 0x00, 0x80);
$darknavy = imagecolorallocate($image, 0x00, 0x00, 0x50);
$red      = imagecolorallocate($image, 0xFF, 0x00, 0x00);
$darkred  = imagecolorallocate($image, 0x90, 0x00, 0x00);
$colors=array($red,$gray,$navy,$red );
$darkcolors=array($darkred,$darkgray,$darknavy,$darkred );
$start=0;
// make the 3D effect
for ($i = 60; $i > 50; $i--)
{
	for($j=0;$j<count($data);$j++)
	{   
	imagefilledarc($image, 250, $i*5, 500, 250, $start, $start+$arc[$j],$darkcolors[$j], $style);
    $start=$start+$arc[$j];
	}

}
for($j=0;$j<count($data);$j++)
	{ 
imagefilledarc($image, 250, 250, 500, 250, $start, $start+$arc[$j], $colors[$j], $style);
$start=$start+$arc[$j];
	}

// flush image
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);


?>

