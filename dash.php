<?php
session_start();
$username="";
$p=0;
require("connect.php");
if(isset($_SESSION['email']))
{ $email=$_SESSION['email'];
 
    $sql= "SELECT * FROM `users` WHERE email ='$email';";
    //echo $sql;
    $result= mysqli_query($connection, $sql);
    //echo $result;
    while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
    { 
      $username=$row['username'];
      
  }$p=0;
  $sqli="SELECT song FROM songs WHERE email='$email' ; ";
  $result=mysqli_query($connection,$sqli);

  if($result)
  {
     while ($row = mysqli_fetch_array($result)) {
     
      $multid_array[]=$row;
      $p++;
  }
  }
    
}
    ?>

<!DOCTYPE html>
<html>
<head>
<title>Groove</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="jquery/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css"  href="font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="globe.css">
<link rel="stylesheet" type="text/css" href="half-slider.css">

<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>-->
<script src="global.js"></script>
<!--<style>

 

  .column {
    margin-left:30px;
  }

  .column:before {
    content:" ";
    margin:0 -15px;
    position: absolute;
    top: 0;
    bottom: 0;
    width: 1px;
    background: #666666;
  }
</style>-->
<!--<script src="scripts/global.js"></script>-->
	</head>
	<body>

  <ul class="login">
            <li class="log"><a class="anchor" href="logout.php">Logout</a></li>
             <li class="log"><a class="anchor" href="index.php">Home</a></li>
              
            <li class="log"><a class="anchor" href="dash.php"><?php echo"welcome $username"; ?></a></li>

      <li class="log">
      <form class="navbar-form navbar-right">
          <div class="input-group">
          <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-btn">
             <button class="btn btn-default" type="submit">
               <i class="fa fa-search"></i>
            </button>
           </div>
         </div>
         </form>
        </li>
    </ul>





<section class="webdesigntuts-workshop">

  <div class="one">
  <div class="table">
  <table style="width:500px;float:left;">
  <tr>
    <th>Serial Number</th>
    <th>Playlist item</th> 
    <th>Actions</th>
  </tr>
 <?php 
  $h="play" ;
   $k=1;
  $g="download";
                                for($l=0;$l<$p;$l++)
                                   {   echo "<tr>";
                                       echo "<td>". $k ."</td>";
                                       echo "<td>".$multid_array[$l][0]."</td>";
                                       echo "<td>". $h ."<td>";
                                      
                                      
                                       $k++;
                                    
                                }
                                   
                                ?>




</table>
</div>
  <div class="boxed">
    <div class="pics">
      <h6>FAVOURITES:</h6>
      <br/>
    <img src="1.jpg" style="width:150px;height:150px;margin-top:15px;margin-left:10px;float:center;"/>
    <img src="2.jpg" style="width:150px;height:150px;margin-top:15px;margin-left:10px;float:center;"/>
    <img src="3.jpg" style="width:150px;height:150px;margin-top:15px;margin-left:10px;float:center;"/>
    <img src="4.jpg" style="width:150px;height:150px;margin-top:15px;margin-left:10px;float:center"/>
    <!-- The overlay -->
<div id="myNav" class="overlay">

  <!-- Button to close the overlay navigation -->
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <!-- Overlay content -->
  <div class="overlay-content">
    <img src="1.jpg" style="width:300px;height:300px;margin-top:15px;margin-left:10px;float:center;"/>
    <img src="2.jpg" style="width:300px;height:300px;margin-top:15px;margin-left:10px;float:center;"/>
    <img src="3.jpg" style="width:300px;height:300px;margin-top:15px;margin-left:10px;float:center;"/>
    <img src="4.jpg" style="width:300px;height:300px;margin-top:15px;margin-left:10px;float:center"/>
    <br/>
    <img src="5.jpg" style="width:300px;height:300px;margin-top:15px;margin-left:10px;float:center;"/>
    <img src="6.jpg" style="width:300px;height:300px;margin-top:15px;margin-left:10px;float:center;"/>
    <img src="7.jpg" style="width:300px;height:300px;margin-top:15px;margin-left:10px;float:center;"/>
    <img src="8.jpg" style="width:300px;height:300px;margin-top:15px;margin-left:10px;float:center"/>
    <br/>
    <img src="9.jpg" style="width:300px;height:300px;margin-top:15px;margin-left:10px;float:center;"/>
    <img src="10.jpg" style="width:300px;height:300px;margin-top:15px;margin-left:10px;float:center;"/>
    <img src="11.jpg" style="width:300px;height:300px;margin-top:15px;margin-left:10px;float:center;"/>
    <img src="12.jpg" style="width:300px;height:300px;margin-top:15px;margin-left:10px;float:center"/>
  </div>

</div>

<!-- Use any element to open/show the overlay navigation menu -->
<span onclick="openNav()"><button type="button">more>></button></span>
    <br/>
    <img src="5.jpg" style="width:150px;height:150px;margin-top:15px;margin-left:10px;float:center;"/>
    <img src="6.jpg" style="width:150px;height:150px;margin-top:15px;margin-left:10px;float:center;"/>
    <img src="7.jpg" style="width:150px;height:150px;margin-top:15px;margin-left:10px;float:center;"/>
    <img src="8.jpg" style="width:150px;height:150px;margin-top:15px;float:center;"/>
    <div id="myNav" class="overlay">

  <!-- Button to close the overlay navigation -->
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <!-- Overlay content -->
  <!--<div class="overlay-content">
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
  </div>-->

</div>

<!-- Use any element to open/show the overlay navigation menu -->
<span onclick="openNav()"><button type="button">more>></button></span>

    <br/>
    <img src="9.jpg" style="width:150px;height:150px;margin-top:15px;margin-left:10px;float:center;"/>
    <img src="10.jpg" style="width:150px;height:150px;margin-top:15px;margin-left:10px;float:center;"/>
    <img src="11.jpg" style="width:150px;height:150px;margin-top:15px;margin-left:10px;float:center;"/>
    <img src="12.jpg" style="width:150px;height:150px;margin-top:15px;float:center;"/>
    <div id="myNav" class="overlay">

  <!-- Button to close the overlay navigation -->
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <!-- Overlay content -->

</div>

<!-- Use any element to open/show the overlay navigation menu -->
<span onclick="openNav()"><button type="button">more>></button></span>

</div>
</div>
</div>
  <!--
  <div id="fat-menu">
  <div class="first-column">
    Songs
  </div>
  <div class="column">
    Videos
  </div>
  <div class="column">
    Remove
  </div>
  <div class="column">
    Play
  </div>
  <div style="clear:both;"></div>
</div>--> 
	</body>
</html>