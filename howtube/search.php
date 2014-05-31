<?php include "config.php"; 
$q = $_REQUEST['q'];?>
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
var maxResults = '<?php echo MAX_SEARCH_RESULTS; ?>';
var nextPageToken = "";
var prevPageToken = "";
function makeCall(q, pageToken){
// alert("token: "+pageToken);
var url = "https://www.googleapis.com/youtube/v3/search?part=snippet&q="+q+"&type=video&videoDefinition=high&order=date&publishedBefore=<?php echo Date('Y-m-d').'T00:00:00Z'; ?>&key=<?php echo KEY; ?>&maxResults="+maxResults;
if(pageToken != ""){
	url=url+"&pageToken="+nextPageToken;
	$("#grid").html("");
}
//alert (url);
// get JSON-formatted data from the server
$.getJSON(url, function( resp ) {
	var x = resp["items"];
	nextPageToken = resp["nextPageToken"];
	if(resp["prevPageToken"] != "undefined")
	{	prevPageToken = resp["prevPageToken"]; }
	// alert(prevPageToken+", "+nextPageToken);
	var totalResults = resp["pageInfo"].totalResults;
	$("#total_results").html("About "+totalResults+" results");
	$.each(x,function(key, value){
		var vid = value.id.videoId;
		var title = value.snippet.title;
		var desc = value.snippet.description;
		var channelTitle = value.snippet.channelTitle;
		$('<li><a href="play.php?v='+vid+'"><img src="http://img.youtube.com/vi/'+vid+'/hqdefault.jpg" title="'+title+'"></a><h3>'+title+'</h3><span class="time">By '+channelTitle+' .1 month ago . 91,944 Views</span><p>'+desc.substring(0, 100)+'...</p><div class="hd-new">HD</div> <div class="hd-new">NEW</div><div class="clearfix"></div></li>').appendTo("#grid");
	});
});
}


$(document).ready(function(){
	makeCall("<?php echo $q; ?>", nextPageToken);
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
<div class="col-lg-3"><a href="index.html"><img src="images/howtube-logo.png" alt="How Tube"/></a></div>
<div class="col-lg-7"><form method="GET" action="search.php" >
	<input type="text" name="q" placeholder="Search Videos & Guides" class="search" value="<?php echo $q; ?>">
	<input type="submit" class="btn btn-warning" value="Search">
</form></div>
<div class="col-lg-2 category-drop">
<!-- <div class="dropdown pull-right">
  <a data-toggle="dropdown" href="#">UPLOAD<i class="glyphicon glyphicon-cloud-upload"></i></a>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
   <li><a href="#">Category 1</a></li>
    <li><a href="#">Category 2</a></li>
	 <li><a href="#">Category 3</a></li>
	  <li><a href="#">Category 5</a></li>
	   <li><a href="#">Category 5</a></li>
  </ul>
</div>-->
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
<div class="search-left-panel">
<div class="filter-wrapper">
<div class="btn-group">
 <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown">
    Filters <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
   <li><a href="#">Category 1</a></li>
    <li><a href="#">Category 2</a></li>
	 <li><a href="#">Category 3</a></li>
	  <li><a href="#">Category 5</a></li>
	   <li><a href="#">Category 5</a></li>
  </ul>
</div>

<span class="count pull-right" id="total_results"></span>
</div>


<div class="search-videos">
<ul id="grid">
<!-- <li>
 <a href="#"> <img src="http://img.youtube.com/vi/AP5VIhbJwFs/hqdefault.jpg" ></a>
 <h3>Four decisions-mastering the habits workshops</h3>
<span class="time">By Tampa,FL .1 month ago . 91,944 Views</span>
<p>In sit adipiscing in integer in? Amet nunc sed, placerat in porta in lundium in lorem! Sagittis pulvinar, pellentesque cum turpis sit</p>
<div class="hd-new">HD</div> <div class="hd-new">NEW</div>
</li>

<li>
   <a href="#"> <img src="http://img.youtube.com/vi/tVncWY2eppk/hqdefault.jpg" ></a>
 <h3>Four decisions-mastering the habits workshops</h3>
<span class="time">By Tampa,FL .1 month ago . 91,944 Views</span>
<p>In sit adipiscing in integer in? Amet nunc sed, placerat in porta in lundium in lorem! Sagittis pulvinar, pellentesque cum turpis sit</p>
<div class="hd-new">HD</div> <div class="hd-new">NEW</div>
</li>

<li>
   <a href="#"> <img src="http://img.youtube.com/vi/Os64PrbnCmc/hqdefault.jpg" ></a>
 <h3>Four decisions-mastering the habits workshops</h3>
<span class="time">By Tampa,FL .1 month ago . 91,944 Views</span>
<p>In sit adipiscing in integer in? Amet nunc sed, placerat in porta in lundium in lorem! Sagittis pulvinar, pellentesque cum turpis sit</p>
<div class="hd-new">HD</div> <div class="hd-new">NEW</div>
</li>

<li>
 <a href="#"> <img src="http://img.youtube.com/vi/Yhg02ALLT6c/hqdefault.jpg" ></a>
 <h3>Four decisions-mastering the habits workshops</h3>
<span class="time">By Tampa,FL .1 month ago . 91,944 Views</span>
<p>In sit adipiscing in integer in? Amet nunc sed, placerat in porta in lundium in lorem! Sagittis pulvinar, pellentesque cum turpis sit</p>
<div class="hd-new">NEW</div>
</li>

<li>
  <a href="#"> <img src="http://img.youtube.com/vi/Hd2o2BoNNss/hqdefault.jpg" ></a>
 <h3>Four decisions-mastering the habits workshops</h3>
<span class="time">By Tampa,FL .1 month ago . 91,944 Views</span>
<p>In sit adipiscing in integer in? Amet nunc sed, placerat in porta in lundium in lorem! Sagittis pulvinar, pellentesque cum turpis sit</p>
<div class="hd-new">HD</div> <div class="hd-new">NEW</div>
</li>

<li>
  <a href="#"> <img src="http://img.youtube.com/vi/swM9IXZE3Lk/hqdefault.jpg" ></a>
 <h3>Four decisions-mastering the habits workshops</h3>
<span class="time">By Tampa,FL .1 month ago . 91,944 Views</span>
<p>In sit adipiscing in integer in? Amet nunc sed, placerat in porta in lundium in lorem! Sagittis pulvinar, pellentesque cum turpis sit</p>
<div class="hd-new">HD</div> <div class="hd-new">NEW</div>
</li>

<li>
 <a href="#"> <img src="http://img.youtube.com/vi/AP5VIhbJwFs/hqdefault.jpg" ></a>
 <h3>Four decisions-mastering the habits workshops</h3>
<span class="time">By Tampa,FL .1 month ago . 91,944 Views</span>
<p>In sit adipiscing in integer in? Amet nunc sed, placerat in porta in lundium in lorem! Sagittis pulvinar, pellentesque cum turpis sit</p>
<div class="hd-new">HD</div> <div class="hd-new">NEW</div>
</li>

<li>
 <a href="#"> <img src="http://img.youtube.com/vi/AP5VIhbJwFs/hqdefault.jpg" ></a>
 <h3>Four decisions-mastering the habits workshops</h3>
<span class="time">By Tampa,FL .1 month ago . 91,944 Views</span>
<p>In sit adipiscing in integer in? Amet nunc sed, placerat in porta in lundium in lorem! Sagittis pulvinar, pellentesque cum turpis sit</p>
<div class="hd-new">HD</div> <div class="hd-new">NEW</div>
</li>


<li>
 <a href="#"> <img src="http://img.youtube.com/vi/AP5VIhbJwFs/hqdefault.jpg" ></a>
 <h3>Four decisions-mastering the habits workshops</h3>
<span class="time">By Tampa,FL .1 month ago . 91,944 Views</span>
<p>In sit adipiscing in integer in? Amet nunc sed, placerat in porta in lundium in lorem! Sagittis pulvinar, pellentesque cum turpis sit</p>
<div class="hd-new">HD</div> <div class="hd-new">NEW</div>
</li>


<li>
 <a href="#"> <img src="http://img.youtube.com/vi/AP5VIhbJwFs/hqdefault.jpg" ></a>
 <h3>Four decisions-mastering the habits workshops</h3>
<span class="time">By Tampa,FL .1 month ago . 91,944 Views</span>
<p>In sit adipiscing in integer in? Amet nunc sed, placerat in porta in lundium in lorem! Sagittis pulvinar, pellentesque cum turpis sit</p>
<div class="hd-new">HD</div> <div class="hd-new">NEW</div>
</li> -->


</ul>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<div class="pagination-wrapper">
<ul class="pagination">
<li><a href="#page-content" onclick="makeCall('<?php echo $q; ?>', prevPageToken);">» Prev</a></li>
  <!-- <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li> -->
   <li><a href="#page-content" onclick="makeCall('<?php echo $q; ?>', nextPageToken);">Next »</a></li>
  </ul>
  </div>
  
<div class="clearfix"></div>

</div>
<!--Eof Left Panel-->
</div>

<div class="col-lg-4">
<div class="right-panel">
<div class="right-ad"><img src="images/ad-3.jpg"/></div>
<div class="right-ad"><img src="images/ad-4.jpg"/></div>
<div class="right-ad"><img src="images/ad-5.jpg"/></div>
<div class="right-ad"><img src="images/ad-7.jpg"/></div>
<div class="right-ad"><img src="images/ad-8.jpg"/></div>
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
