<?php
function format($text) {
	$text = "<p>" . $text . "</p>";
	$search = array("\r", "\n\n", "\n");
	$replace = array("", "</p><p>", "<br />");
	$text = stripslashes($text);
	$text = str_replace($search, $replace, $text);
	return $text;
}
?>