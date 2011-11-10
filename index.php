<?php 
	$fallback_resolution = 480; // Set your fallback resolution

	// If user shows up and doesn't have a cookie set
	if(!isset($_COOKIE['resolution'])) {
		// Set cookie based on screen size (from adaptive-images.com)  
?>
<script>
document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';
location.reload(true);
</script>
<?php 
	}
$res = !empty($_COOKIE['resolution']) ? $_COOKIE['resolution'] : $fallback_resolution; ?>

<html>
<body>
<header>
	<h1>Insert your HTML code here.</h1>
	<nav><?php
	if($res < 800) {
		echo 'Smaller nav component.';
	} else {
		echo 'Larger nav component.';
	}
?></nav>
</header>
<section>
	<p>Your screen width is: <i><?php echo $res; ?>px wide.</i></p>
</section>
</body>
</html>