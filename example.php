<?php
// Allows us to reset the cookie for testing purposes.
if(isset($_GET['reset'])){
	setcookie ('resolution', '', time() - 3600, '/'); // Destroys cookie
	header('Location: index.php?analysis');
	exit;
}

// Temporary intermediary stage (for display purposes only)
// between resetting cookie and setting again, to make sure the cookie has really cleared.
if(isset($_GET['analysis'])){
	echo '<h1>Cookies:</h1>';
	echo '<pre>';
	var_dump($_COOKIE);
	echo '</pre>';
	echo '<a href="index.php">View site fresh</a>';
	exit;
}

// If user shows up and doesn't have a cookie set
if(!isset($_COOKIE['resolution'])) {
	?>
	<script>
	/* If we decide to use viewport in the future:
	   from: http://andylangton.co.uk/articles/javascript/get-viewport-size-javascript/
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	var screenwidth = Math.max(screen.width,screen.height); */
	// Set cookie based on screen size (from adaptive-images)
	document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';
	location.reload(true);
	</script>
	<?php 
// If user doesn't have JavaScript, they'll just keep moving past here like nothing happened.
// ISSUE: since there's no php exit here, will the folks getting the reload up above pre-load any of the elements below?
// Ran tests using Charles and when I showed up with a desktop browser, I didn't see any elements included in the mobile navigation loaded at all.
}

$res = !empty($_COOKIE['resolution']) ? $_COOKIE['resolution'] : 500; // Arbitrary mobile resolution.
echo '<div class="alert">STATUS: Resolution is set at '.$res.'px wide <a href="?reset" style="display: block; float: right;">Reset</a></div>';
?>

<!doctype html>
<!--[if lt IE 8]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title></title>
	<meta name="description" content="">
	<meta name="author" content="">
	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<style>
		html { max-width: 1000px; margin: 0 auto;}
		.alert { padding: .5em; background: #eee; border: 1px solid #ddd; }
	</style>
</head>

<body>
	<div id="container">
		<header>
			<h1>Content</h1>
			<?php
				if($res > 800) {
					echo 'Showing desktop navigation. <a href="#" style="background: red; color: white; padding: 50px; display: block;">Go home</a>';
				} else {
					echo 'Showing mobile navigation. <a href="#" style="background: red; color: white; padding: 5px; display: block;">Go home</a>';
				}
			?>
		</header>
		<div id="main" role="main">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

		</div>
		<footer>
		
		</footer>
	</div> <!--! end of #container -->
	
</body>
</html>