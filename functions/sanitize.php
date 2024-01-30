<?php
// Convert/escape special html characters to/in string
function escape($string) {
	return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

// Convert back to html characters in string
function unescape($string) {
	return html_entity_decode($string, ENT_QUOTES);
}

// Convert strings to url
function decodeurl($string) {
	return urldecode($string);
}

// Convert url to string
function encodeurl($string) {
	return urlencode($string);
}
?>
