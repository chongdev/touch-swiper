<!DOCTYPE html>
<html>
<head>
	
	<title></title>
	

	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="styles.css">

	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="slideshow.js"></script>
</head>
<body>
	<div id="container">
		<div id="app">
			<div id="content" style="width: 800px;margin: 0 auto">
					
				<div id="blog" class="section">
					
					<div class="blog-header"></div>
				</div>
				<?php require_once 'slideshow.php'; ?>
				
				<div id="txt" class="tac">Loading...</div>
				<div id="touchStart" class="tac">Loading...</div>
				<div id="touchMove" class="tac">Loading...</div>
				<div id="touchEnd" class="tac">Loading...</div>
			</div>
		</div>
	</div>
	

	<script type="text/javascript">
		
		$('[data-plugins=slideshow]').slideshow({
			effect: 'slide'
		});
	</script>
</body>
</html>