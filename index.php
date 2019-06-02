
<?php include 'upload.php'; ?>
<!DOCTYPE html>
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


</script>

</head>


<div class="header">
  <h1>Image Suggestion</h1>
</div>

<div class="topnav">
  <a href="index.php">Home</a>
  <a href="suggestions.php">Suggestions</a>
  <a href="fetch.php">Fetch</a>
</div>

<?php/*
$result = shell_exec('/vericekme.sh');
echo $result;
$result = shell_exec('/isimdegistirme.sh');
echo $result;*/
?>




<center>
<p><?php echo $statusMsg; ?></p>
  <form action="" method="post" enctype="multipart/form-data">
      Select Image Files to Upload:
      <input type="file" name="files[]" multiple >
      <input type="submit" name="submit" value="UPLOAD">
  </form>
  <br>

  <?php
  // Include the database configuration file
  include_once 'dbConfig.php';

  // Get images from the database
  $query = $db->query("SELECT * FROM images ORDER BY RAND()");

  if($query->num_rows > 0){
      while($row = $query->fetch_assoc()){
          $imageURL = 'tedu/'.$row["file_name"];
  ?>
      <img class="lazyload" src="<?php echo $imageURL; ?>" alt="<?php echo $row["file_name"]; ?>",width="300" height="200" />
  <?php }
  }else{ ?>
      <p>No image(s) found...</p>
  <?php } ?>

</center>



<script>var arr = [];</script>



<center>

<p>No Suggestions.</p>

<script>



$(document).ready(function(){
    $('img').dblclick(function(){
        // do something
        //alert('Picture fade out...')
        //$(this).fadeOut().slow();
        var alt = $(this).attr("alt")
        alt = alt.slice(-8);
        //alert(alt);

        if (alt == "tedu.png" || alt == "tedu.jpg" ) {
          arr.push("tedu");
        } else if (alt == "spor.png" || alt == "spor.jpg" ) {
          arr.push("spor");
        } else if (alt == "arab.png" || alt == "arab.jpg" ) {
          arr.push("arab");
        } else if (alt == "bili.png" || alt == "bili.jpg" ) {
          arr.push("bili");
        }



        var teduCount = 0;
        var sporCount = 0;
        var biliCount = 0;
        var arabCount = 0;
        for(var i = 0; i < arr.length; ++i){
          if (arr[i]  == "tedu" || arr[i] == "tedu" ) {
            teduCount++;
          }

          else if (arr[i] == "spor" || arr[i] == "spor" ){
            sporCount++;
          }

          else if (arr[i] == "bili" || arr[i] == "bili" ){
            biliCount++;
          }

          else if (arr[i] == "arab" || arr[i] == "arab" ){
            arabCount++;
          }
        }

        alert(arr + ' ' + teduCount + ' ' +sporCount+ ' ' +arabCount+ ' ' +biliCount);

        totalCount=teduCount +sporCount+arabCount +biliCount;



        var perTedu = (teduCount/totalCount)*100;
        var perSpor = (sporCount/totalCount)*100;
        var perArab = (arabCount/totalCount)*100;
        var perBili = (biliCount/totalCount)*100;


        alert(perSpor);



    });
});

</script>


</center>

<?php

echo "<script>document.writeln(arr);</script>";
echo "array: ".$_GET['arr']."<br>";

?>





</html>
