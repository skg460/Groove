<?php
  include 'api.php';
?>
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
    
}
?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
  <title>
    Groove
  </title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="jquery/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css"  href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="half-slider.css">
  <script type="text/javascript">
  $(document).ready(function() {
   $("#lightSlider").lightSlider(); 
  });
</script>

   <link rel="stylesheet"  href="lightslider.css"/>
   <style>

/* Tablet Landscape */
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
background-color:rgba(0,0,0,0);
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
background-color:rgba(0,0,0,0);
color:#fff;
cursor:default !important;
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
background-color:rgba(0,0,0,0);
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
background:rgba(0,0,0,0);
}

.plyr__progress--played, .plyr__volume--display {
color:rgba(0,0,0,0);
}

.plyr--audio .plyr__progress--buffer,
.plyr--audio .plyr__volume--display {
background:rgba(0,0,0,0);
}

.plyr--audio .plyr__progress--buffer {
color:rgba(0,0,0,0);
}

</style>
    <style>
      ul{
      list-style: none outside none;
        padding-left: 0px;
            margin: 0px;
    }
        .col-lg-8 .demo .item{
            margin-bottom: 60px;
        }
    .col-lg-8 .content-slider li{
        background-color: #000000;
        text-align: center;
        color: #FFF;
    }
    .col-lg-8 .content-slider h3 {
        margin: 0;
        padding: 40px 0;
    }
    .col-lg-8 .demo{
      width: 800px;
    }
    </style>



    <!--                             :(                   -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --> 
    



    <script src="lightslider.js"></script> 
    <script>
       $(document).ready(function() {
      $(".content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
    });
    </script>
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
                <input type="email" name="email" class="form-control" id="email" placeholder="Email-Id" required>
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" name="password" class="form-control" id="pwd" placeholder="password" required>
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


<div class="no-padding col-lg-12  col-md-12 col-sm-12 col-xs-12" >

                              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                      <!-- Indicators -->
                                      <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                      </ol>

                                      <!-- Wrapper for slides -->
                                      <div class="carousel-inner">
                                        <div class="item active">
                                          <img src="http://takelessons.com/blog/wp-content/uploads/2015/05/How-To-Improve-Your-Cover-Songs.jpg" alt="First Slide" width="1375px" height="200px">
                                          <div class="carousel-caption">
                                          First Slide
                                          </div>
                                        </div>
                                        <div class="item">
                                         <img src="https://s-media-cache-ak0.pinimg.com/originals/10/f2/6d/10f26d96f3ab137c7e2d8ba5fd90cc29.jpg" alt="Second Slide" width="1375px" height="200px">
                                          <div class="carousel-caption">
                                           Second Slide
                                          </div>
                                        </div>

                                            <div class="item">
                                         <img src="https://s-media-cache-ak0.pinimg.com/736x/05/cd/d7/05cdd7f377917076d1cf451cddd91ccf--cover-photos-facebook-facebook-profile.jpg" alt="Third Slide" width="1375px" height="200px">
                                          <div class="carousel-caption">
                                           Third Slide
                                          </div>
                                        </div>

                                      </div>

                                      <!-- Controls -->
                                      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                      </a>
                                      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                      </a>
                            </div>





                       </div>

                </div>


    </div>  


     <div id="menu">
       <ul>
        <li>
         <button  id="btns" class="btn btn-default btn-md" onclick="myfunction()">About</button>
        </li>
          <li>
         <button  id="btns"  class="btn btn-default btn-md" onclick="myfunction3()">Albums</button>
        </li>
          <li>
         <button   id="btns"  class="btn btn-default btn-md" onclick="myfunction4()">Artist</button>
        </li>
          <li>
         <button  id="btns" class="btn btn-default btn-md" onclick="myfunction5()">Language</button>
        </li>
         
            <li>
         <button  id="btns" class="btn btn-default btn-md" onclick="myfunction2()">Contact</button>
        </li>
        </ul>

        </div>
         <script>
   
  function myfunction() {
    var txt;
    alert("This is a digital music service that gives you access to millions of songs!!") ;}
  
 </script>
   <script>
   
  function myfunction2() {
    var txt;
    alert("for more details...contact 9876543210 or xyz@gmail.com") ;}
  function myfunction3() {
    var txt;
    alert("Work under construction!") ;}
  function myfunction4() {
    var txt;
    alert("work under construction!") ;}
  function myfunction5() {
    var txt;
    alert("work under construction") ;}
  
 </script>
          <div id="myNav" class="containers">
               <!--<div class="row">-->
               <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
                  <div class="col-lg-8">
                   <!--<div class="container2">-->
                    <!--<div id="myNav" class="overlay">-->


<!--<span onclick="openNav()"><button type="button">more>></button></span>-->
<div class="demo">

        <div class="item">
        <h3 style="color:white; text-align: center;">Top Artists</h3>
<ul  class="content-slider">
  
                <li>
                    
                    <a href="genre.php?index=0"><img src="<?php echo $top_artists['artists']['artist'][$j++]['image'][2]['#text']; ?>" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/></a>
                </li>
                <li>
                    
                    <a href="genre.php?index=1"><img src="<?php echo $top_artists['artists']['artist'][$j++]['image'][2]['#text']; ?>" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/></a>
                </li>
                <li>
                    
                    <a href="genre.php?index=2"><img src="<?php echo $top_artists['artists']['artist'][$j++]['image'][2]['#text']; ?>" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/></a>
                </li>
                <li>
                    
                    <a href="genre.php?index=3"><img src="<?php echo $top_artists['artists']['artist'][$j++]['image'][2]['#text']; ?>" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/></a>
                </li>
                <li>
                    
                    <a href="genre.php?index=4"><img src="<?php echo $top_artists['artists']['artist'][$j++]['image'][2]['#text']; ?>" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/></a>
                </li>
                <li>
                    
                    <a href="genre.php?index=5"><img src="<?php echo $top_artists['artists']['artist'][$j++]['image'][2]['#text']; ?>" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/></a>
                </li>
                <li>
                    
                    <a href="genre.php?index=6"><img src="<?php echo $top_artists['artists']['artist'][$j++]['image'][2]['#text']; ?>" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/></a>
                </li>
                <li>
                    
                    <a href="genre.php?index=7"><img src="<?php echo $top_artists['artists']['artist'][$j++]['image'][2]['#text']; ?>" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/></a>
                </li>
                <li>
                    
                    <a href="genre.php?index=8"><img src="<?php echo $top_artists['artists']['artist'][$j++]['image'][2]['#text']; ?>" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/></a>
                </li>
                <li>
                    
                    <a href="genre.php?index=9"><img src="<?php echo $top_artists['artists']['artist'][$j++]['image'][2]['#text']; ?>" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/></a>
                </li>
                
            </ul>

            <h3 style="color:white; text-align: center;">Top Albums</h3>

            <ul class="content-slider">
               
                <li>
                    
                    <img src="1.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                <li>
                    
                    <img src="2.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                <li>
                    
                    <img src="3.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                <li>
                    
                    <img src="4.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                <li>
                    
                    <img src="5.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                <li>
                    
                    <img src="6.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                <li>
                    
                    <img src="7.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                <li>
                    
                    <img src="8.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                <li>
                    
                    <img src="9.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                <li>
                    
                    <img src="10.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                
            </ul>

          <h3 style="color:white; text-align: center;">Top Tracks</h3>
          <ul  class="content-slider">

                <li>
                    
                    <img src="1.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                <li>
                    
                    <img src="2.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                <li>
                    
                    <img src="3.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                <li>
                    
                    <img src="4.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                <li>
                    
                    <img src="5.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                <li>
                    
                    <img src="6.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                <li>
                    
                    <img src="7.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                <li>
                    
                    <img src="8.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                <li>
                    
                    <img src="9.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                <li>
                    
                    <img src="10.jpg" style="width:250px;height:150px;margin-top:0px;margin-left:0px;float:center;"/>
                </li>
                
            </ul>
          
        </div>
      </div>
    </div>
                <div class="col-lg-4">
                  <div class="mq">
               
    
      <center><font size="+1"><b style="color:black"><div style="background-color:#1C85A4" > New Releases</div><br></b></font></center>
        <marquee direction="up"  height="500px" onMouseOver="this.stop();" onMouseOut="this.start();">
      <!--<center><a href="new.html" style="text-decoration:none"><font size="+1"><b>Judwa 2</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Look What You Made Me To</b></font></a></center><br>-->
            <center><a href="#come" style="text-decoration:none"><font size="+1"><b>Kabhi Jo Baadal Barse</b></font></a></center><br>
            <center><a href="#come" style="text-decoration:none"><font size="+1"><b>Har Kisi Ko</b></font></a></center><br>
            <center><a href="#come" style="text-decoration:none"><font size="+1"><b>Rashk-e-Qamar</b></font></a></center><br>
            <center><a href="#come" style="text-decoration:none"><font size="+1"><b>Oonchi Hai Building</b></font></a></center><br>
            <center><a href="#come" style="text-decoration:none"><font size="+1"><b>Tu Mera Meet Hai</b></font></a></center><br>
            <center><a href="#come" style="text-decoration:none"><font size="+1"><b>Hawayein</b></font></a></center><br>


    </marquee>
     
     </div>
  </div>
  </div>
 <div  id="come" class="container3">
       <div class="row">
        <div class="col-lg-2 col-sm-6 text-center mb-4">
          <a href="Hollywood.html"><img class="ratio img-responsive img-circle" src="http://img.wynk.in/unsafe/240x240/top/http://s3-ap-southeast-1.amazonaws.com/bsbcms/music/mood-boosters-300x300.png" alt="" width="150" height="150">
          <h5>Hollywood</h5></a>
           
        </div>
        
        <div class="col-lg-2 col-sm-6 text-center mb-4">
          <a href="Folk.html"><img class="ratio img-responsive img-circle" src="http://a10.gaanacdn.com/images/playlists/9/166109/crop_175x175_166109.jpg" alt="" width="150" height="150">
          <h5>Folk Music</h5></a>
           
        </div>
        <!--<div class="col-lg-2 col-sm-6 text-center mb-4">
          <a href="hollywood.html"><img class="ratio img-responsive img-circle" src="http://img.wynk.in/unsafe/240x240/top/http://s3-ap-southeast-1.amazonaws.com/bsbcms/music/mood-boosters-300x300.png" alt="" width="150" height="150">
          <h5>Hollywood</h5></a>
           
        </div>-->
        <div class="col-lg-2 col-sm-6 text-center mb-4">
          <a href="retro.html"><img class="ratio img-responsive img-circle" src="http://a10.gaanacdn.com/images/albums/47/1947/crop_175x175_1947.jpg" alt="" width="150" height="150">
          <h5>Retro Melodies</h5></a>
            
        </div>
         <div class="col-lg-2 col-sm-6 text-center mb-4">
          <a href="devotional.html"><img class="ratio img-responsive img-circle" src="http://img.wynk.in/unsafe/240x240/top/http://s3-ap-southeast-1.amazonaws.com/bsbcms/music/srch_timesmusic_timesmusic3468.jpg" alt="" width="150" height="150">
          <h5>Devotional</h5></a>
            
        </div>

 <div class="col-lg-2 col-sm-6 text-center mb-4">
          <a href="party.html"><img class="ratio img-responsive img-circle" src="http://img.wynk.in/unsafe/240x240/top/http://s3-ap-southeast-1.amazonaws.com/bsbcms/music/package/lazy-300x300.png" alt="" width="150" height="150">
          <h5>Party</h5></a>
            
        </div>

 <div class="col-lg-2 col-sm-6 text-center mb-4">
          <a href="unplugged.html"><img class="ratio img-responsive img-circle" src="http://img.wynk.in/unsafe/240x240/top/http://s3-ap-southeast-1.amazonaws.com/bsbcms/music/Coffee-Time-Classics-300x300.png" alt="" width="150" height="150">
          <h5>Unplugged</h5></a>
            
        </div>
        <div class="player">
        <!--<audio id="myAudio">
     <source src="1.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>-->
<div class="container">
    <div class="column add-bottom">
        <div id="mainwrap">
            <div id="nowPlay">
               <!-- <span class="left" id="npAction">Paused...</span>-->
                <span class="right" id="npTitle"></span>
            </div>
            <div id="audiowrap">
                
                    <center><audio preload id="myAudio" controls="controls"><source src="1.mp3" type="audio/mpeg">Your browser does not support HTML5 Audio!</audio></center>
                    <!--<audio id="myAudio1" controls="controls"><source src="2.mp3" type="audio/mpeg">Your browser does not support HTML5 Audio!</audio>
                <audio id="myAudio2" controls="controls"><source src="3.mp3" type="audio/mpeg">Your browser does not support HTML5 Audio!</audio>-->
                
               
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

<script>
var x =document.getElementById('myAudio'); 

function playAudio() { 
    x.play(); 
} 

function pauseAudio() { 
    x.pause(); 
} 
 
</script>
<script src="index.js"></script>
</div>
</div>

        
      </div>

    </div>







      

</body>
</html>