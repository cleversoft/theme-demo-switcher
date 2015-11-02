<?php 
	require( "config.php" );
	global $redirect, $current_theme; 
	$redirect = true; require( "index.php" ); 
?>
<!doctype html>
<html lang="en-US">
<head>
  	<!-- meta -->
  	<meta charset="utf-8">
  	<meta name="author" content="<?php echo $author; ?>">
    <meta name="description" content="<?php echo $description; ?>">
  	
  	<link href="<?php echo $site_url; ?>favicon.png?v=1" rel="shortcut icon" type="image/x-icon" />
	
    <title>Redirecting...</title>
        
    <script type="text/javascript">
		top.location.href = "<?php echo $demo_url; ?>?theme=<?php echo $current_theme; ?>";
	</script>   
</head>
<body>
    <p>Redirecting...</p>
    <noscript>
        <p>You need Javascript enabled to see this website.</p>
    </noscript>
</body>
</html>