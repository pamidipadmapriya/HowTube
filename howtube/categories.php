<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	
	
 	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How Tube</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/carousel.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		 <link href="css/owl.carousel.css" rel="stylesheet">
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="js/carousels.js"></script>

		<script type="text/javascript" src="js/jquery.sticky.js"></script>
		<script>
  $(document).ready(function(){
    $("nav").sticky({topSpacing:0});
  });
</script>

    <script src="js/owl.carousel.js"></script>
	 <script>
    $(document).ready(function() {

      $("#owl-demo").owlCarousel({
	   	autoPlay: 3000, //Set AutoPlay to 3 seconds
        items : 6,
		 itemsDesktop : [1000,5], //5 items between 1000px and 901px
         itemsDesktopSmall : [900,4], // betweem 900px and 601px
         itemsTablet: [600,3], //2 items between 600 and 0
         itemsMobile : [600,2], // itemsMobile disabled - inherit from itemsTablet option
        lazyLoad : true,
		lazyFollow : true,
		lazyEffect:"fade",
        navigation : true,
		stopOnHover:true
		
      });

    });
    </script>

	<script src="js/modernizr.custom.js"></script>
   
	 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<script>
var maxResults = "20";
var nextPageToken = "";
function makeCall(pageToken){
var url = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=soccer&type=video&videoDefinition=high&key=AIzaSyDRCGfzxr2aSZiNt-pM2dwOHiGes4d7lks&maxResults="+maxResults;

if(pageToken != ""){
	url=url+"&pageToken="+nextPageToken;
}

// get JSON-formatted data from the server
$.getJSON(url, function( resp ) {
	var x = resp["items"];
	nextPageToken = resp["nextPageToken"];
	$.each(x,function(key, value){
		var vid = value.id.videoId;
		var title = value.snippet.title;
		// var desc = value.snippet.description;
		$('<li class="brick"><a href="video-play.php?v='+vid+'"><img src="http://img.youtube.com/vi/'+vid+'/hqdefault.jpg" ></a><div class="info"><h3>'+title+'</h3><div class="vid-info"><div class="user">By Tampa,FL</div><div class="views-count">91,944 Views <span class="time">1 month ago</span></div><div class="clearfix"></div></div></div></li>').appendTo("#grid");
		
		// $("#img_small").attr("src",value.snippet.thumbnails.default.url);
		// $("#img_medium").attr("src",value.snippet.thumbnails.medium.url);
		// $("#img_large").attr("src",value.snippet.thumbnails.high.url);
		// exit;
	});
	MyAnimOnScroll();
});
}
$(document).ready(function(){
 makeCall("");
});
</script>
</head>
<body>
<header>
<div class="container">
<div class="col-lg-3"><a href="\"><img src="images/howtube-logo.png" alt="How Tube"/></a></div>
<div class="col-lg-7"><input type="text" placeholder="Search Videos & Guides" class="search"><input type="submit" class="btn btn-warning" value="Search"></div>
<div class="col-lg-2 category-drop">
<div class="dropdown pull-right">
  <a data-toggle="dropdown" href="#">CATEGORIES<i class="glyphicon glyphicon-th"></i></a>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
   <li><a href="#">Category 1</a></li>
    <li><a href="#">Category 2</a></li>
	 <li><a href="#">Category 3</a></li>
	  <li><a href="#">Category 5</a></li>
	   <li><a href="#">Category 5</a></li>
  </ul>
</div></div>
</div>
</header>
<!--Eof Header-->

<!--Sof Nav-->
<nav class="navbar" role="navigation">
<div class="container">
 <div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><i class="glyphicon glyphicon-align-justify"></i></button>
</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li><a href="#">Food</a></li>
<li><a href="#">Health</a></li>
<li><a href="#">Money & Business</a></li>
<li><a href="#">Perenting</a></li>
<li><a href="#">Tech</a></li>
<li><a href="#">Beauty</a></li>
<li><a href="#">Diy </a></li>
<li><a href="#">Relationships</a></li>
<li><a href="#">Sports</a></li>
</ul>
</div>
</div>
</nav>
<!--Eof Nav-->
<section id="page-content">

<!-- ===============CAROUSEL SECTION==============
================================================== -->

<div id="banner">
<div class="container">
 <div class="latest-title-mobile">Latest Videos</div>
 <div class="latest-title"><img src="images/latest-videos-title.png"/></div>
 <div id="owl-demo" class="owl-carousel">
    <div class="item"> <a href="#"><img src="images/scroll-video-1.jpg"/></a></div>
    <div class="item"> <a href="#"> <img src="images/scroll-video-2.jpg"/></a></div>
   <div class="item"><a href="#"><img src="images/scroll-video-3.jpg"/></a></div>
   <div class="item"><a href="#"><img src="images/scroll-video-4.jpg"/></a></div>
   <div class="item"><a href="#"> <img src="images/scroll-video-2.jpg"/></a></div>
    <div class="item"><a href="#"> <img src="images/scroll-video-3.jpg"/></a></div>
	<div class="item"> <a href="#"><img src="images/scroll-video-1.jpg"/></a></div>
    <div class="item"> <a href="#"> <img src="images/scroll-video-2.jpg"/></a></div>
   <div class="item"><a href="#"><img src="images/scroll-video-3.jpg"/></a></div>
   <div class="item"><a href="#"><img src="images/scroll-video-4.jpg"/></a></div>
   <div class="item"><a href="#"> <img src="images/scroll-video-2.jpg"/></a></div>
    <div class="item"><a href="#"> <img src="images/scroll-video-3.jpg"/></a></div>
 </div>
	<!--<div id="myCarousel" class="carousel slide" data-ride="carousel">
	
		<div class="carousel-inner">
        
			<div class="item active">
				<div class="container">
				<div class="carousel-image">
                <a href="#"><img src="images/scroll-video-1.jpg"/></a>
               <a href="#"> <img src="images/scroll-video-2.jpg"/></a>
                <a href="#"><img src="images/scroll-video-3.jpg"/></a>
                <a href="#"><img src="images/scroll-video-4.jpg"/></a>
                <a href="#"> <img src="images/scroll-video-2.jpg"/></a>
                <a href="#"> <img src="images/scroll-video-3.jpg"/></a>
                </div>
				</div>
			</div>
			<div class="item">
				<div class="container">
				<div class="carousel-image">
                 <a href="#"><img src="images/scroll-video-1.jpg"/></a>
               <a href="#"> <img src="images/scroll-video-2.jpg"/></a>
                <a href="#"><img src="images/scroll-video-3.jpg"/></a>
                <a href="#"><img src="images/scroll-video-4.jpg"/></a>
                <a href="#"> <img src="images/scroll-video-2.jpg"/></a>
                <a href="#"> <img src="images/scroll-video-3.jpg"/></a>
                </div>
				</div>
			</div>
			
			<div class="item">
				<div class="container">
				<div class="carousel-image">
                 <a href="#"><img src="images/scroll-video-1.jpg"/></a>
               <a href="#"> <img src="images/scroll-video-2.jpg"/></a>
                <a href="#"><img src="images/scroll-video-3.jpg"/></a>
                <a href="#"><img src="images/scroll-video-4.jpg"/></a>
                <a href="#"> <img src="images/scroll-video-2.jpg"/></a>
                <a href="#"> <img src="images/scroll-video-3.jpg"/></a>
                </div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	</div>-->
</div>
</div>

<div id="home-videos">
<div class="container">

<ul class="grid effect-2" id="grid">
			<!-- <li class="brick">
		       <a href="#"> <img src="http://img.youtube.com/vi/tVncWY2eppk/hqdefault.jpg" ></a>
		        <div class="info">
		            <h3>How to create a leadership</h3>
		           <div class="vid-info">
				   <div class="user">By Tampa,FL</div>
				   <div class="views-count">91,944 Views <span class="time">1 month ago</span></div>
				    <div class="clearfix"></div>
				   </div>
		        </div>
		    </li>
			
			
		     <li class="brick">
		       <a href="#"> <img src="http://img.youtube.com/vi/AP5VIhbJwFs/hqdefault.jpg" ></a>
		        <div class="info">
		            <h3>Four decisions-mastering the habits workshops</h3>
		           <div class="vid-info">
				   <div class="user">By Tampa,FL</div>
				   <div class="views-count">91,944 Views <span class="time">1 month ago</span></div>
				    <div class="clearfix"></div>
				   </div>
		        </div>
		    </li>
			
		     <li class="brick">
		       <a href="#"> <img src="http://img.youtube.com/vi/Os64PrbnCmc/hqdefault.jpg" ></a>
		        <div class="info">
		            <h3>Four decisions-mastering the habits workshops</h3>
		           <div class="vid-info">
				   <div class="user">By Tampa,FL</div>
				   <div class="views-count">91,944 Views <span class="time">1 month ago</span></div>
				    <div class="clearfix"></div>
				   </div>
		        </div>
		    </li>
			
		     <li class="brick">
		       <a href="#"> <img src="http://img.youtube.com/vi/6GOFssxhR_Q/hqdefault.jpg" ></a>
		        <div class="info">
		            <h3>How to create a leadership</h3>
		           <div class="vid-info">
				   <div class="user">By Tampa,FL</div>
				   <div class="views-count">91,944 Views <span class="time">1 month ago</span></div>
				    <div class="clearfix"></div>
				   </div>
		        </div>
		    </li> -->
			

			
		</ul>

</div>
</div>

</section>

<!--Sof Footer-->
<footer>
<div class="container">
<ul class="footer-links">
<li><a href="#">About Howtube</a></li>
<li><a href="#">Advertising</a></li>
<li><a href="#">Businesses</a></li>
<li><a href="#">Terms& Privacy</a></li>
<li><a href="#">Sitemap</a></li>
<li><a href="#">International</a></li>
<li><a href="#">Help</a></li>
</ul>
</div>
</footer>
<!--Eof Footer-->
   <script src="js/masonry.pkgd.min.js"></script>
		<script src="js/imagesloaded.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/AnimOnScroll.js"></script>
		<script>
		function MyAnimOnScroll(){
			new AnimOnScroll( document.getElementById( 'grid' ), {
				minDuration : 0.4,
				maxDuration : 0.7,
				viewportFactor : 0.2
			} );
		}
		</script>
	<script>
	$(window).scroll(function(){
		if ($(window).scrollTop() == $(document).height() - $(window).height()){
			// alert("last");
			makeCall(nextPageToken);
		}
	});
	</script>
</body>
</html>
