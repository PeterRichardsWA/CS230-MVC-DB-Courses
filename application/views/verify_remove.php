<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Verify removing courses</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/courses.css">
</head>
<body>

<div id="container">

	<div id="course-verify">
		<h4>Are you sure you wish to delete the following course?</h4>
		<div class="inline-h">Course Title:</div><div class="inline-d"><?= $mydata['title'] ?></div><div class="clear"></div>
		<div class="inline-h">Description:</div><div class="inline-d"><?= $mydata['description'] ?></div><div class="clear"></div>
		<div class="inline-h">Last Modified:</div><div class="inline-d"><?= $mydata['updated_at'] ?></div><div class="clear"></div>

	</div>
	<div id="actions"><a href="/"><input type="button" id="no" class="inp-button" value="NO"></a><a href="/remove_for_real/<?=$mydata['id'] ?>"><input type="button"  class="inp-buttonr" id="yes" value="Yes! I want to remove this course!"></a>
</div>

</body>
</html>