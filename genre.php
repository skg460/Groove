<?php
  include 'top_tracks.php';
  $in = $_GET['index'];
  $name = $top_artists['artists']['artist'][$in]['name'];
     $service_url = 'http://ws.audioscrobbler.com/2.0/?method=artist.gettoptracks&artist='.$name.'&api_key=7d9f8229c0938ebad0e26bdda23cb5a4&format=json';
      $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, $service_url); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 
        $artist_tracks = json_decode($output,true);
        // close curl resource to free up system resources 
        curl_close($ch);
        
        //print_r($top_artists);
        //echo $top_artists['artists']['artist'][0]['image'][2]['#text'];
        $k=1;


?>


<?php
session_start();
require("connect.php");
$fmsg="";
$rmsg="";
$jk=0;
$l=0;
if(isset($_SESSION['email']))
{  $in=$_GET['index'];
  $email=$_SESSION['email'];
   $jk=1;
    $sql= "SELECT * FROM `users` WHERE email ='$email';";
    //echo $sql;
    $result= mysqli_query($connection, $sql);
    //echo $result;
    while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
    { 
      $username=$row['username'];
      
  }
   if(isset($_POST['Follow']))
   {  
        $query = "SELECT * FROM artist WHERE artist='$name' ";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result)>0)
    {
      $rmsg="You are already following this artist!";
    }
    else
    {
      $query = "INSERT INTO `artist` (email,artist) values ('$email','$name')";
      $result = mysqli_query($connection,$query);
      if(!$result)
      {
        $rmsg="Error in registering!";
      }
      else
      {
          $rmsg="You are following this artist!";
         }
     }
     }
   }
 else if(isset($_POST['Add']))
   	{ $song=$_SESSION['l'];

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
		      $rmsg="song successfully added to the playlist!";
	       }
	   }
	   }
    
}
else
	$fmsg="Login to add this song to your playlist";

    ?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
	<title>
		genre
	</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="jquery/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css"  href="font-awesome/css/font-awesome.min.css">


	<link rel="stylesheet" type="text/css" href="genre.css">
		<link rel="stylesheet" type="text/css" href="half-slider.css">


           <script src="//connect.soundcloud.com/sdk/sdk-3.2.1.js"></script>
           <style>
           @media screen and (max-width: 768px) {
    #primary { width:100%; }
    #secondary { width:100%; margin:0; border:none; }
}
img { max-width: 100%; }
html { font-size:100%; } 
@media (min-width: 640px) { body {font-size:1rem;} } 
@media (min-width:960px) { body {font-size:1.2rem;} } 
@media (min-width:1100px) { body {font-size:1.5rem;} } 

           </style>

</head>
<body>

  <ul class="login">
      <li><?php if($jk!=1) {?>
      <li class="log"><a class="anchor" onclick="login()">Login</a></li>
      <li class="log"><a class="anchor" onclick="signup()">Signup</a></li>
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
      <?php } 
      else {
      ?>
            <li class="log"><a class="anchor" href="logout.php">Logout</a></li>
             <li class="log"><a class="anchor" href="dash.php">Playlist</a></li>
              <li class="log"><a class="anchor" href="index.php">Home</a></li>
            <li class="log"><a class="anchor" href="dash.php"><?php if($jk==1){echo"welcome $username";} ?></a></li>

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
        <?php } ?>
    </ul>


<div id="login" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Login Form</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="login.php">
              <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" name="email" class="form-control" id="email" required>
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" name="password" class="form-control" id="pwd" required>
              </div>
              <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
              <button type="submit" class="btn btn-default">Submit</button>
          </form>


        </div>
      </div>
    </div>
  </div>



  <div id="signup" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Signup Form</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="signup.php">
            <div class="form-group">
                <label for="username">Name</label>
                <input type="text" name="username" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" name="password" class="form-control" id="pwd" required>
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>


        </div>
      </div>
    </div>
  </div>



<script>
    function login(){
        $('#login').modal('show') 
    }
    function signup(){
      $('#signup').modal('show')
    }
</script>

			<div class="col-md-12 upperbox1">
				<div class="col-md-3" id="genre-photo">
					<img src="<?php echo $top_artists['artists']['artist'][$in]['image'][2]['#text'] ?>" alt="">
					<h2>Classics</h2>
						<div id="play-button">
							<button class="btn">               
		    				<img  src="photos/play.png" width="30" height="30"/>
		    				<span><b>Play All</b></span>
							</button>
						</div>
				</div>

        <?php
        $url="genre.php?index=".$in;
        ?>
				<div class="col-md-9 playlist-side">
					<div id="playlist-side">
						<form action="genre.php" method="post">
            <button type="submit" name="Follow" value="Follow">Follow</button>
            </form>
						
					</div>
					<div>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Song</th>
								<th>Add to playlist</th>
							</tr>
						</thead>
						<tbody id="tbody">
                          <?php if($jk!=1&&isset($fmsg)&&isset($_POST['Add'])){ ?><div class="alert alert-danger" role="alert"><?php echo $fmsg; ?></div>
                        <?php   } ?>
                         <?php 
                             
                         if($jk==1&&isset($_POST['Add'])){ ?><div class="alert alert-success" role="alert"><?php echo $rmsg; ?></div>
                        <?php   } ?>
					<?php 
                $p = 20;
                                for($l=0;$l<$p;$l++)
                                   {   echo "<tr>";
                                       echo "<td>". $k ."</td>";
                                       echo "<td>". $artist_tracks['toptracks']['track'][$k]['name']."</td>";
                                       ?>
                                       <td><a href="playlist.php?index=<?php echo $in;?>&name=<?php 
                                          echo $artist_tracks['toptracks']['track'][$k++]['name'] ?>">Add</a></td>
                                      <?php  echo "</tr>";
                                       
                                    
                                  }
                                ?>
							
						</tbody>
					</table>
				</div>
			</div>
			</div>

</body>
</html>