




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
}
  ?>












<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
    <title>unplugged</title>
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="jquery/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css"  href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="genre.css">
        <link rel="stylesheet" type="text/css" href="half-slider.css">

    <script src="unplugged.js"></script>
    <style>
     @media screen and (max-width: 1060px) {
    #primary { width:67%; }
    #secondary { width:30%; margin-left:3%;}  
}

/* Tabled Portrait */
@media screen and (max-width: 768px) {
    #primary { width:100%; }
    #secondary { width:100%; margin:0; border:none; }
}
img { max-width: 100%; }
html { font-size:100%; } 
@media (min-width: 640px) { body {font-size:1rem;} } 
@media (min-width:960px) { body {font-size:1.2rem;} } 
@media (min-width:1100px) { body {font-size:1.5rem;} } 

    html,body {
-webkit-font-smoothing:antialiased;
-webkit-text-size-adjust:100%;
background-color:#666666;
color:#fff;
font-size:105%;
font-family:"Oxygen", HelveticaNeue, "Helvetica Neue", Helvetica, Arial, sans-serif;
font-weight:300;
line-height:1.618;
padding:1rem 0;
}

* {
-webkit-tap-highlight-color:rgba(0,0,0,0);
-webkit-tap-highlight-color:transparent;
background:black;
}


/* Setup
================================================== */

.container { position:relative; margin:0 auto; max-width:800px; width:100%; }
.column { width:inherit; }


/* Typography / Links
================================================== */

p { color:#fff; display:block; font-size:.9rem; font-weight:400; margin:0 0 2px; }

a,a:visited { color:#8cc3e6; outline:0; text-decoration:underline; }
a:hover,a:focus { color:#bbdef5; }
p a,p a:visited { line-height:inherit; }


/* Misc.
================================================== */

.add-bottom { margin-bottom:2rem !important; }
.left { float:left; }
.right { float:right; }
.center { text-align:center; }


/* Audio Player Styles
================================================== */

audio {
margin:0 15px 0 14px;
width:670px;
}

#mainwrap {}

#audiowrap,
#plwrap {
margin:0 auto;
}

#tracks {
position:relative;
text-align:center;
}

#nowPlay {
display:inline;
}

#npAction {
padding:21px;
position:absolute;
}

#npTitle {
padding:21px;
}

#plList li {
cursor:pointer;
display:block;
margin:0;
padding:21px 0;
}

#plList li:hover {
background-color:rgba(0,0,0,.1);
}

.plItem {
position:relative;
}

.plTitle {
left:50px;
overflow:hidden;
position:absolute;
right:65px;
text-overflow:ellipsis;
top:0;
white-space:nowrap;
}

.plNum {
padding-left:21px;
width:25px;
}

.plLength {
padding-left:21px;
position:absolute;
right:21px;
top:0;
}

.plSel,
.plSel:hover {
background-color:rgba(0,0,0,.1);
color:#fff;
cursor:default !important;
}

#heading{
    font-size:50px;
    margin-left:60px;
}

a[id^="btn"] {
border-radius:3px;
color:#fff;
cursor:pointer;
display:inline-block;
font-size:2rem;
height:35px;
line-height:.8;
margin:0 20px 20px;
padding:10px;
text-decoration:none;
transition:background .3s ease;
width:35px;
}

a[id^="btn"]:last-child {
margin-left:-4px;
}

a[id^="btn"]:hover,
a[id^="btn"]:active {
background-color:rgba(0,0,0,.1);
color:#fff;
}

a[id^="btn"]::-moz-focus-inner {
border:0;
padding:0;
}


/* Plyr Overrides
================================================== */

.plyr--audio .plyr__controls {
background-color:transparent;
border:none;
color:#fff;
padding:20px 20px 20px 13px;
width:100%;
}

.plyr--audio .plyr__controls button.tab-focus:focus,
.plyr--audio .plyr__controls button:hover,
.plyr__play-large {
background:rgba(0,0,0,.1);
}

.plyr__progress--played, .plyr__volume--display {
color:rgba(0,0,0,.1);
}

.plyr--audio .plyr__progress--buffer,
.plyr--audio .plyr__volume--display {
background:rgba(0,0,0,.1);
}

.plyr--audio .plyr__progress--buffer {
color:rgba(0,0,0,.1);
}
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
    <div class="two">
        <img class="ratio img-responsive img-circle" src="http://img.wynk.in/unsafe/240x240/top/http://s3-ap-southeast-1.amazonaws.com/bsbcms/music/mood-boosters-300x300.png" alt="" width="150" height="150">
    <h3 id="heading">Unplugged</h3>
</div>
<div class="container">
    <div class="column add-bottom">
        <div id="mainwrap">
            <div id="nowPlay">
                <!--<span class="left" id="npAction">Paused...</span>-->
                <span class="right" id="npTitle"></span>
            </div>
            <div id="audiowrap">
                    <audio preload id="myAudio" controls="controls"><source src="Aaj Din Chadheya (Unplugged).mp3" type="audio/mpeg">Your browser does not support HTML5 Audio!</audio>
                <div id="tracks">
                    <a id="btnPrev">&larr;</a>
                    <a id="btnNext">&rarr;</a>
                </div>
            </div>
            <div id="plwrap">
                <ul id="plList"></ul>
            </div>
        </div>
    </div>
    <!--<div class="column add-bottom center">
        <p>Music by <a href="http://www.mythium.net/">Mythium</a></p>
        <p>Download: <a href="https://archive.org/download/mythium/mythium_vbr_mp3.zip">zip</a> / <a href="https://archive.org/download/mythium/mythium_archive.torrent">torrent</a></p>
    </div>-->
</div>
<script>
var x=document.getElementById('myAudio');
function play()
{
    x.play();
}
function pause()
{
    x.pause;
}
</script>
</body>
</html>
