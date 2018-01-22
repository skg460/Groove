<?php
session_start();
require("connect.php");
$fmsg="";
$jk=0;
if(isset($_SESSION['email']))
{ $email=$_SESSION['email'];
   $jk=1;
    $sql= "SELECT * FROM `users` WHERE email ='$email';";
    //echo $sql;
    $result= mysqli_query($connection, $sql);
    //echo $result;
    while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
    { 
      $username=$row['username'];
      
  }

  if(isset())
    
}
else
	$fmsg="Login to add this song to your playlist";
if(isset($_POST['Add']))
	$fmsg="song successfully added to the playlist!"
    ?>


    <!DOCTYPE html>
<html>
<head>
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
					<img src="http://img.wynk.in/unsafe/240x240/top/http://s3-ap-southeast-1.amazonaws.com/bsbcms/music/package/lazy-300x300.png" alt="">
					<h2>Classics</h2>
						<div id="play-button">
							<button class="btn">               
		    				<img  src="photos/play.png" width="30" height="30"/>
		    				<span><b>Play All</b></span>
							</button>
						</div>
				</div>
				<div class="col-md-9 playlist-side">
					<div id="playlist-side">
           <form action="genre2.php" method="post">
						<button type="submit" name="follow" value="follow"></button>
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
                           
						<?php 
								$k="hello";
								$p = 20;
                                for($l=0;$l<$p;$l++)
                                   {   echo "<tr>";
                                       echo "<td>". $l ."</td>";
                                       echo "<td>". $k."</td>";
                                       echo "<td>"
                                       ?>
                                       <form  action="playlist.php" >
                                        <input type="submit" value="Add" name="Add" class="btn " />
                                       </form>
                                       <?php "</td>";
                                       echo "</tr>";
                                       
                                    
                                	}
                                ?>
							
						</tbody>
					</table>
				</div>
			</div>
			</div>
			
<div id="cp_widget_351d9b09-b6b3-4608-8759-15cec8ab9f2f">...</div><script type="text/javascript">
var cpo = []; cpo["_object"] ="cp_widget_351d9b09-b6b3-4608-8759-15cec8ab9f2f"; cpo["_fid"] = "AcEA_FeXOZu2";
var _cpmp = _cpmp || []; _cpmp.push(cpo);
(function() { var cp = document.createElement("script"); cp.type = "text/javascript";
cp.async = true; cp.src = "//www.cincopa.com/media-platform/runtime/libasync.js";
var c = document.getElementsByTagName("script")[0];
c.parentNode.insertBefore(cp, c); })(); </script><noscript><span>New Gallery 2017/9/26</span></noscript>
  <script>
  	function play(){
                     <div id="cp_widget_b3b19960-b8a1-4197-98d3-e2f79aee96d5">...</div> 
                                          var cpo = []; cpo["_object"] ="cp_widget_b3b19960-b8a1-4197-98d3-e2f79aee96d5"; cpo["_fid"] = "AAPAfb87XoKo!AkLDPXAfi1l6";                        var _cpmp = _cpmp || []; _cpmp.push(cpo);                        (function() { var cp = document.createElement("script"); cp.type = "text/javascript";                        cp.async = true; cp.src = "//www.cincopa.com/media-platform/runtime/libasync.js";                        var c = document.getElementsByTagName("script")[0];                        c.parentNode.insertBefore(cp, c); })(); 
   </script>
</body>
</html>