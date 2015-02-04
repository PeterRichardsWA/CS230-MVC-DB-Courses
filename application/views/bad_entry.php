<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Invalid Entry</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/courses.css">
</head>
<body>
<?php
	// echo "title is empty? ".empty($title);
	if(empty($title)) {
		$title = "&lt;blank title entered&gt;";
	} else {
		$title = $title.' :: TOO LONG ('.strlen($title)." letters)";
	}
	// echo "<p>".$title;
	// exit;
?>
<div id="container">

	<div id="course-verify">
		<h4>The title of your course is either too long or empty. Please use less 15 letters or less.</h4>
		<div class="inline-h">Course Title:</div>
		<div class="inline-d"><?= $title ?></div>
		<div class="clear"></div>
	</div>

	<div id="actions"><a href="/">Go back to Entry</a></div>

</div>

</body>
</html>