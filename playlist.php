
<?php
session_start();
require("connect.php");
$fmsg="";
$rmsg="";
$jk=0;
$l=0;
if(isset($_SESSION['email']))
{  $in=$_GET['index'];
  $song=$_GET['name'];
  $email=$_SESSION['email'];
   $jk=1;
      $query = "SELECT * FROM songs WHERE song='$song' ";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result)>0)
    {
      $rmsg="song already exist in your playlist!";
    }
    else
    {
      $query = "INSERT INTO `songs` (email,song) values ('$email','$song')";
      $result = mysqli_query($connection,$query);
      if(!$result)
      {
        $rmsg="Error in registering!";
      }
      else
      {
        
         }
     }
     }
    
}
header('Location:genre.php?index='.$in);

    ?>
