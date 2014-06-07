<?php include "config.php"; 
$vid = $_REQUEST['v']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How Tube</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet">
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>

		<script type="text/javascript" src="js/jquery.sticky.js"></script>
		<script>
  $(document).ready(function(){
    $("nav").sticky({topSpacing:0});
  });
</script>

<script>
var DateDiff = { 
    inDays: function(d1, d2) {
        var t2 = d2.getTime();
        var t1 = d1.getTime();
 
        return parseInt((t2-t1)/(24*3600*1000));
    },
 
    inWeeks: function(d1, d2) {
        var t2 = d2.getTime();
        var t1 = d1.getTime();
 
        return parseInt((t2-t1)/(24*3600*1000*7));
    },
 
    inMonths: function(d1, d2) {
        var d1Y = d1.getFullYear();
        var d2Y = d2.getFullYear();
        var d1M = d1.getMonth();
        var d2M = d2.getMonth();
 
        return (d2M+12*d2Y)-(d1M+12*d1Y);
    },
 
    inYears: function(d1, d2) {
        return d2.getFullYear()-d1.getFullYear();
    }
}

var today = new Date("<?php echo Date('Y-m-d'); ?>");
function getDuration( publishedDate ){
	var publishedOn = new Date(publishedDate.substr(0,10));
	var days = DateDiff.inDays(publishedOn, today);
	if (days > 0){
		if (days <= 30){
			return (days+" day(s) ago");
		} else if (days > 30 && days < 365) {
			return (Math.floor(days/30)+" month(s) ago");
		} else if (days > 365) {
			return (Math.floor(days/365)+" year(s) ago");
		}
	}
}

var month = new Array();
month[0] = "January";
month[1] = "February";
month[2] = "March";
month[3] = "April";
month[4] = "May";
month[5] = "June";
month[6] = "July";
month[7] = "August";
month[8] = "September";
month[9] = "October";
month[10] = "November";
month[11] = "December";

function getVideodetails(vid){
// https://www.googleapis.com/youtube/v3/videos?id=UYOV7NPuyp4&key=AIzaSyDRCGfzxr2aSZiNt-pM2dwOHiGes4d7lks&part=snippet,statistics&fields=items(id,snippet,statistics)
var url = "https://www.googleapis.com/youtube/v3/videos?id="+vid+"&key=<?php echo KEY; ?>&part=snippet,statistics&fields=items(id,snippet,statistics)";
// get JSON-formatted data from the server
$.getJSON(url, function( resp ) {
	var x = resp["items"];
	$.each(x,function(key, value){
		// var vid = value.id.videoId;
		$("#vtitle").html(value.snippet.title);
		$("#vdesc").html(value.snippet.description);
		var x = new Date(value.snippet.publishedAt);
		$("#vdateat").html(month[x.getMonth()]+" "+x.getDate()+", "+x.getFullYear()+" by "+value.snippet.channelTitle);
		$("#vcount").html(value.statistics.viewCount+" views");
		$("#vlikecount").html(value.statistics.likeCount);
		$("#vdislikecount").html(value.statistics.dislikeCount);
		$("#mnts").html(getDuration(value.snippet.publishedAt));
		//value.statistics.favoriteCount
		//value.statistics.commentCount
	});
});
}

var nextPageToken = "";
function getRelatedVideos (vid,pageToken){
	var url = "https://www.googleapis.com/youtube/v3/search?part=snippet&relatedToVideoId="+vid+"&type=video&maxResults=10&key=<?php echo KEY; ?>";
	if(pageToken != ""){
		url=url+"&pageToken="+nextPageToken;
	}
	// alert(url);
	$.getJSON(url, function( resp ) {
		var x = resp["items"];
		nextPageToken = resp["nextPageToken"];
		$.each(x,function(key, value){
			var vid = value.id.videoId;
			$('<li><a href="play.php?v='+vid+'"><img src="http://img.youtube.com/vi/'+vid+'/mqdefault.jpg" width="173" height="97" /></a><h5><a href="play.php?v='+vid+'">'+value.snippet.title+'</a></h5><span>by '+value.snippet.channelTitle+'</span><span></span></li>').appendTo("#related_videos");
		});
	});
}

$(document).ready(function(){
 getVideodetails('<?php echo $vid; ?>');
 getRelatedVideos('<?php echo $vid; ?>','');
});
</script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header>
<div class="container">
<div class="col-lg-3"><a href="index.php"><img src="images/howtube-logo.png" alt="How Tube"/></a></div>
<div class="col-lg-7"><form method="GET" action="search.php" >
	<input type="text" name="q" placeholder="Search Videos & Guides" class="search">
	<input type="submit" class="btn btn-warning" value="Search">
</form></div>
<div class="col-lg-2 category-drop">
<!-- <div class="dropdown pull-right">
  <a data-toggle="dropdown" href="javascript:void(0);">UPLOAD<i class="glyphicon glyphicon-cloud-upload"></i></a>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
   <?php
// foreach($categories as $key=>$val) {
	// echo '<li><a href="'.$val.'">'.$key.'</a></li>';
// }
?>
  </ul>
</div> -->
</div>
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
<?php
foreach($categories as $key=>$val) {
	echo '<li><a href="'.$val.'">'.$key.'</a></li>';
}
?>
</ul>
</div>
</div>
</nav>
<!--Eof Nav-->
<section id="page-content">
<div class="container">
<div class="col-lg-8">
<div class="left-panel">
<div class="video-play">
<iframe width="730" height="405" src="//www.youtube.com/embed/<?php echo $vid; ?>" frameborder="0" allowfullscreen></iframe>

<!--<object width="730" height="405"><param name="movie" value="//www.youtube.com/v/<?php echo $vid; ?>?hl=en_US&amp;version=3"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="//www.youtube.com/v/<?php echo $vid; ?>?hl=en_US&amp;version=3" type="application/x-shockwave-flash" width="730" height="405" allowscriptaccess="always" allowfullscreen="true"></embed></object>-->
</div>

<div class="video-content">

<div class="video-title">
<div class="col-lg-9 row">
<h2 id="vtitle">The Muppets - Dconstructed -- The Muppet Show Theme (Shy Kidx Remix) </h2>
<span class="date" id="vdateat">November 14, 2013 by Abu Antar</span>
</div>

<div class="col-lg-3 row pull-right">
<div class="likes pull-right"><img src="images/like-icon.gif"/><span class="green" id="vlikecount"></span>
<img src="images/dislike-icon.gif"/><span class="red" id="vdislikecount"></span></div>
<div class="views pull-right"><span class="red" id="vcount"></span><span id="mnts"></span> </div>
</div>
</div>
<div class="clearfix"></div>
<p id="vdesc"></p>

<div class="clearfix"></div>
<div class="video-footer">
<div class="col-lg-7 row"><span></span></div>
<div class="col-lg-6 row pull-right"><strong><span class="red"></span></strong> <strong> License:  <span class="red">Standard YouTube License</span></strong></div>
<div class="clearfix"></div>
</div>
</div>
<!--Eof Video Content-->


<!-- <div id="comment-box-wrapper">
<div class="comment-box">
<h4>Leave Reply</h4>
<span class="pull-right">Your email address will not be published.Required fields are marked*</span>
<form>
<div class="col-lg-6"><textarea placeholder="Comment" class="textarea"></textarea></div>

<div class="col-lg-6">
<input type="text"/>
<input type="text"/>
<button class="btn btn-danger pull-right">Post Comment</button>
</div>
</form>
</div>


<div id="user-comments-header">
<h3>All Comments(157)</h3>
<span class="red pull-right"><a href="javascript:void(0);">Top Comments  <i class="caret"></i></a></span>
</div>
<div class="user-comments">
<ul>
<li>
<div class="col-lg-1"><img src="images/user-thumnail.jpg"/></div>
<div class="col-lg-11"><h5> Balssem Agoummadane</h5><span class="daysago">50 days ago</span>
<p>Et magna natoque sed amet? Facilisis dolor egestas nisi risus in, parturient ultricies? Adipiscing. Cras! 
Lorem et amet turpis cursus etiam augue rhoncus. Cum.</p>
</div>
<span class="reply"><a href="javascript:void(0);">Reply <i class="glyphicon glyphicon glyphicon-thumbs-up"></i> <i class="glyphicon glyphicon glyphicon-thumbs-down"></i></a></span>
</li>

<li>
<div class="col-lg-1"><img src="images/user-thumnail.jpg"/></div>
<div class="col-lg-11"><h5> Balssem Agoummadane</h5><span class="daysago">50 days ago</span>
<p>Et magna natoque sed amet? Facilisis dolor egestas nisi risus in, parturient ultricies? </p>
</div>
<span class="reply"><a href="javascript:void(0);">Reply <i class="glyphicon glyphicon glyphicon-thumbs-up"></i> <i class="glyphicon glyphicon glyphicon-thumbs-down"></i></a></span>
</li>

<li>
<div class="col-lg-1"><img src="images/user-thumnail.jpg"/></div>
<div class="col-lg-11"><h5> Balssem Agoummadane</h5><span class="daysago">50 days ago</span>
<p>Et magna natoque sed amet? Facilisis dolor egestas nisi risus</p>
</div>
<span class="reply"><a href="javascript:void(0);">Reply <i class="glyphicon glyphicon glyphicon-thumbs-up"></i> <i class="glyphicon glyphicon glyphicon-thumbs-down"></i></a></span>
</li>
<a href="javascript:void(0);" class="showmore-button">show more</a>
</ul>
</div> -->
<!--Eof User comments-->
<!-- <div class="clearfix"></div>
</div> -->
<!--Eof comment box wrapper-->

</div>
<!--Eof Left Panel-->
</div>

<div class="col-lg-4">
<div class="right-panel">
<div class="right-ad"><img src="images/banner-ad-1.gif"/></div>

<div class="suggested-videos">
<h3>Related Videos</h3>
<ul id="related_videos">
<!-- <li> <a href="#"> <img src="images/related-video-1.jpg"/></a>
<h5><a href="#">Mix - LMFAO - Party Rock  Anthem ft. Lauren Bennett</a></h5>
<span>by Disney MusicVEVO</span>
<span>58,486 views</span>
</li>

<li> <a href="#"> <img src="images/related-video-1.jpg"/></a>
<h5><a href="#">Mix - LMFAO - Party Rock  Anthem ft. Lauren Bennett</a></h5>
<span>by Disney MusicVEVO</span>
<span>58,486 views</span>
</li>

<li> <a href="#"> <img src="images/related-video-1.jpg"/></a>
<h5><a href="#">Mix - LMFAO - Party Rock  Anthem ft. Lauren Bennett</a></h5>
<span>by Disney MusicVEVO</span>
<span>58,486 views</span>
</li>

<li> <a href="#"> <img src="images/related-video-1.jpg"/></a>
<h5><a href="#">Mix - LMFAO - Party Rock  Anthem ft. Lauren Bennett</a></h5>
<span>by Disney MusicVEVO</span>
<span>58,486 views</span>
</li>

<li> <a href="#"> <img src="images/related-video-1.jpg"/></a>
<h5><a href="#">Mix - LMFAO - Party Rock  Anthem ft. Lauren Bennett</a></h5>
<span>by Disney MusicVEVO</span>
<span>58,486 views</span>
</li> 

<li> <a href="#"> <img src="images/related-video-1.jpg"/></a>
<h5><a href="#">Mix - LMFAO - Party Rock  Anthem ft. Lauren Bennett</a></h5>
<span>by Disney MusicVEVO</span>
<span>58,486 views</span>
</li> -->
</ul>
<a href="javascript:void(0);" onclick="getRelatedVideos('<?php echo $vid; ?>',nextPageToken);" class="loadmore-button">Load more suggetions</a>
</div>

<div class="right-ad"><img src="images/banner-ad-1.gif"/></div>
</div>
<!--Eof Right Panel-->
</div>
</div>
</section>

<!--Sof Footer-->
<?php include "footer.php"; ?>
<!--Eof Footer-->
 
</body>
</html>
