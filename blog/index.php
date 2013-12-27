<?php 
//open connection to the database
include ("functions.php");
include("../cms/db_connect.php");

//select 5 most recent posts
$sql = "SELECT post_id, title, post, DATE_FORMAT(postdate, '%e %b %Y at %H:%i') AS dateattime FROM posts ORDER BY post_id DESC LIMIT 7";
$result = mysql_query($sql);
$myposts = mysql_fetch_array($result);
?> 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<title>AJ's Blog</title>
		<style type="text/css"> @import url(blog.css); </style>
	</head>
	<body>
		
		<?php include("header.php"); ?>

		<!--this is the main part of the page-->
		<div id="maincontent">
			<div id="posts">
				<?php 
				if($myposts) {
					do {
						$post_id = $myposts["post_id"];
						$title = $myposts["title"];
						$post = format($myposts["post"]);
						$dateattime = $myposts["dateattime"];
						echo "<h2 id='post$post_id'><a href='post.php?post_id=$post_id' rel='bookmark'>
						$title</a></h2>\n";
						echo "<h4>Posted on $dateattime</h4>\n";
						echo "<div class='post'>$post</div>";
					} while ($myposts = mysql_fetch_array($result));
				} else {
					echo "<p>I haven't posted to my blog yet.</p>";
				}
				?>
			</div>
			<div id="sidebar">
				<div id="about">
					<h3>About this</h3>
					<p>This is a diary by ME.</p>
				</div>
				
				<?php include("searchform.php"); ?>

				<div id="recent">
					<h3>Recent posts</h3>
					<?php
					mysql_data_seek($result, 0);
					$myposts = mysql_fetch_array($result);

					if($myposts) {
						echo "<ul>\n";
						do {
							$post_id = $myposts["post_id"];
							$title = $myposts["title"];
						echo "<li><a href='post.php?post_id=$post_id' rel='bookmark'>
						$title</a></li>\n";
						} while ($myposts = mysql_fetch_array($result));
						echo "</ul>";
					}
					?>
				</div>
			</div>
			<!--sidebar ends-->
			
		</div>
		<!--maincontent ends-->
		<?php include("footer.php"); ?>
	</body>
</html>