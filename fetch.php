
<html>

<head>

<link rel="stylesheet" href="mystyle.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-beta.2/lazyload.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script>
window.addEventListener("load", function(event) {
    lazyload();
});

$(document).ready(function(){
    $('img').dblclick(function(){
        // do something
        //alert('Picture fade out...')
        //$(this).fadeOut().slow();
        var alt = $(this).attr("alt")
        alert(alt);
    });
});

</script>

</head>

<div class="header">
  <h1>Image Suggestion</h1>
</div>

<div class="topnav">
  <a href="index.php">Home</a>
  <a href="#">Suggestions</a>
  <a href="fetch.php">Fetch</a>
</div>

<body>

<center>

<?php

$array_to_download_futbol=array();
$array_to_download_tenis=array();
$array_to_download_basketbol=array();

$array_futbol=array();
$dom = new DOMDocument;
$htmls = file_get_contents("https://www.google.com/search?biw=1440&bih=789&tbm=isch&sa=1&ei=Zi3PXMzPIcjLwQK4s6jAAg&q=football&oq=football&gs_l=img.3..0l2j0i67j0l2j0i67j0l4.8587.11483..11628...1.0..0.147.1792.0j13......1....1..gws-wiz-img.......35i39.L1ZeTVt5YQ8");
$dom->loadHTML($htmls);
$dom->preserveWhiteSpace = false;
$images = $dom->getElementsByTagName('img');

foreach ($images as $image) {
  $imageData = base64_encode(file_get_contents($image->getAttribute('src')));
  array_push($array_futbol,'<img class="lazyload" src="load.gif" data-src="data:image/jpeg;base64,'.$imageData.'"height="500" width="500" alt="futbol"><br><br>');
  //echo'data:image/jpeg;base64'.$imageData;
  array_push($array_to_download_futbol,'data:image/jpeg;base64,'.$imageData);
  //echo $imageData;
}

unset($array_futbol[0]);
$length = count($array_futbol);





$array_tenis=array();
$dom = new DOMDocument;
$htmls = file_get_contents("https://www.google.com/search?biw=1440&bih=789&tbm=isch&sa=1&ei=Zi3PXMzPIcjLwQK4s6jAAg&q=tennis&oq=football&gs_l=img.3..0l2j0i67j0l2j0i67j0l4.8587.11483..11628...1.0..0.147.1792.0j13......1....1..gws-wiz-img.......35i39.L1ZeTVt5YQ8");
//$htmls = file_get_contents("https://www.tedu.edu.tr");
$dom->loadHTML($htmls);
$dom->preserveWhiteSpace = false;
$images = $dom->getElementsByTagName('img');

foreach ($images as $image) {
  $imageData = base64_encode(file_get_contents($image->getAttribute('src')));
  array_push($array_tenis,'<img class="lazyload" src="load.gif" data-src="data:image/jpeg;base64,'.$imageData.'"height="500" width="500" alt="tenis"><br><br>');
  array_push($array_to_download_tenis,'data:image/jpeg;base64,'.$imageData);
}

unset($array_tenis[0]);
$length = count($array_tenis);











$array_basketbol=array();
$dom = new DOMDocument;
$htmls = file_get_contents("https://www.google.com/search?biw=1440&bih=789&tbm=isch&sa=1&ei=Zi3PXMzPIcjLwQK4s6jAAg&q=basketball&oq=football&gs_l=img.3..0l2j0i67j0l2j0i67j0l4.8587.11483..11628...1.0..0.147.1792.0j13......1....1..gws-wiz-img.......35i39.L1ZeTVt5YQ8");
$dom->loadHTML($htmls);
$dom->preserveWhiteSpace = false;
$images = $dom->getElementsByTagName('img');

foreach ($images as $image) {
  $imageData = base64_encode(file_get_contents($image->getAttribute('src')));
  array_push($array_basketbol,'<img class="lazyload" src="load.gif" data-src="data:image/jpeg;base64,'.$imageData.'"height="500" width="500" alt="basketbol"><br><br>');
  array_push($array_to_download_basketbol,'data:image/jpeg;base64,'.$imageData);
}

unset($array_basketbol[0]);
$length1 = count($array_futbol);
$length2 = count($array_tenis);
$length3 = count($array_basketbol);
$length4 = $length1+$length2+$length3;





$array_merge = array_merge($array_futbol,$array_tenis,$array_basketbol);
shuffle($array_merge);

/*
for ($x = 0; $x <= $length4; $x++) {
  echo $array_to_download_futbol[$x];
  echo "<br>";
  echo $array_to_download_tenis[$x];
  echo "<br>";
  echo $array_to_download_basketbol[$x];
  echo "<br>";


}*/





for ($x = 0; $x <= $length4; $x++) {
  echo $array_merge[$x];

}



$array_to_download_futbol[1] = str_replace(' ','+',$_POST['image']);
$array_to_download_futbol[1] =  substr($array_to_download_futbol[$x],strpos($array_to_download_futbol[1],",")+1);
$array_to_download_futbol[1] = base64_decode($array_to_download_futbol[1]);
// Path where the image is going to be saved
$filePath = $_SERVER['DOCUMENT_ROOT']. '/img/temp2.jpg';
// Write $imgData into the image file
$file = fopen($filePath, 'w');
fwrite($file, $array_to_download_futbol[1]);
fclose($file);



?>


</center>

</html>
