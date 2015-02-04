<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Show Courses</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/courses.css">
</head>
<body>

<div id="container">
	
	<table id="mytable">
		<tr>
			<th colspan=2>Add a new course:</th>
		</tr>
		<form method="post" action="/addmycourse" id="myform">
		<tr>
			<td>Title:</td><td><input type="text" name="title" class="txt-inp" placeholder = "Course Title Here..." size=40 maxlength=100></td>
		</tr>
		<tr>
			<td>Description:</td><td><textarea name="description" class="txt-inp" placeholder = "Course description here..." rows=5 cols=40></textarea></td>
		</tr>
		<tr>
			<td colspan=2 class="right"><input type="submit" name="submit" value="SAVE" class="inp-button"></td>
		</tr>
		</form>
	</table>


	<div id="course-table">
		<h4>Courses</h4>
		<table id="coursetable">
			<tr>
				<th>Course Name</th><th>Description</th><th>Date Added</th><th>Actions</th>
			</tr>
			<?php
				// loop through results of query here so we can display.
				// echo "<pre>";
				// var_dump($data);
				// echo "</pre>";
				// die();

				if (is_array($mydata)) {
					$n=0;
					foreach($mydata as $row) {
						$n = !$n;
						if($n) {
							$tmp = 'odd';
						} else {
							$tmp = 'even';
						}
						?>
						<tr class="<?=$tmp ?>">
							<td><?=$row['title'] ?></td>
							<td><?=$row['description'] ?></td>
							<td><?=$row['created_at'] ?></td>
							<td><a href="remove/<?=$row['id'] ?>">remove</td>
						</tr>
						<?php
					}
				}
			?>
		</table>

	</div>
</div>

</body>
</html>