<?php
	require('connect.php');
	$fmsg="";
	if(isset($_POST['email']) && isset($_POST['password']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password=md5($password);
		$query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
		$result = mysqli_query($connection,$query);
         
		if(mysqli_num_rows($result)==1)
		{
			session_start();
			$_SESSION["email"] = $email;
			
			header("location:dash.php");
			
		}
		else
		{
			$fmsg="Invalid emailid or Password";

			
		}
	}

?>





<?php
  include 'api.php';
?>

<!DOCTYPE html>
<html>
<head>
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


                             
  <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"><?php echo $fmsg; ?></div>
                        <?php   } ?>


                       </div>

                </div>


    </div>  


     <div id="menu">
       <ul>
        <li>
         <a href="#">About</a>
        </li>
          <li>
         <a href="#">Albums</a>
        </li>
          <li>
         <a href="#">Genres</a>
        </li>
          <li>
         <a href="#">Artist</a>
        </li>
          <li>
         <a href="#">Languages</a>
        </li>
            <li>
         <a href="#">Contact</a>
        </li>
        </ul>
        </div>
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
      <center><a href="" style="text-decoration:none"><font size="+1"><b><?php echo $top_tracks['tracks']['track'][$i++]['name']; ?></b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Look What You Made Me To</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Bareilly Ki Barfi</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>You Already Know</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Lucknow Central</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Hungry</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Simran</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Pizza</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Baadshaho</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Tell Me You Love Me</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>BHoomi</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Jab Harry Met Sejal</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Qaidi Band</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Kayanaat</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Bom Diggy</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>A Gentleman</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Paas Aao</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Munna Michael</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Sniff</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Parinda</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Secret Superstar</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Ghar</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Poster Boys</b></font></a></center><br>



    </marquee>
     
     </div>
  </div>
  </div>
 <div class="container3">
       <div class="row">
        
        <div class="col-lg-2 col-sm-6 text-center mb-4">
          <img class="ratio img-responsive img-circle" src="http://a10.gaanacdn.com/images/playlists/9/166109/crop_175x175_166109.jpg" alt="" width="150" height="150">
          <h5>Featured Artists
           
        </div>
        <div class="col-lg-2 col-sm-6 text-center mb-4">
          <img class="ratio img-responsive img-circle" src="http://img.wynk.in/unsafe/240x240/top/http://s3-ap-southeast-1.amazonaws.com/bsbcms/music/mood-boosters-300x300.png" alt="" width="150" height="150">
          <h5>Top playlist
           
        </div>
        <div class="col-lg-2 col-sm-6 text-center mb-4">
          <img class="ratio img-responsive img-circle" src="http://a10.gaanacdn.com/images/albums/47/1947/crop_175x175_1947.jpg" alt="" width="150" height="150">
          <h5>Retro Melodies
            
        </div>
         <div class="col-lg-2 col-sm-6 text-center mb-4">
          <img class="ratio img-responsive img-circle" src="http://img.wynk.in/unsafe/240x240/top/http://s3-ap-southeast-1.amazonaws.com/bsbcms/music/srch_timesmusic_timesmusic3468.jpg" alt="" width="150" height="150">
          <h5>Devotional
            
        </div>

 <div class="col-lg-2 col-sm-6 text-center mb-4">
          <img class="ratio img-responsive img-circle" src="http://img.wynk.in/unsafe/240x240/top/http://s3-ap-southeast-1.amazonaws.com/bsbcms/music/package/lazy-300x300.png" alt="" width="150" height="150">
          <h5>Moods
            
        </div>

 <div class="col-lg-2 col-sm-6 text-center mb-4">
          <a href="genre.html"><img class="ratio img-responsive img-circle" src="http://img.wynk.in/unsafe/240x240/top/http://s3-ap-southeast-1.amazonaws.com/bsbcms/music/Coffee-Time-Classics-300x300.png" alt="" width="150" height="150">
          <h5>Classics</h5></a>
            
        </div>


        
      </div>

    </div>







      

</body>
</html>