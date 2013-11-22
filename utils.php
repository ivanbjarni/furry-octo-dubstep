<?php
	function cutString ($string) {
		if (strlen($string) > 250) {
			return substr($string, 0, 250).'...';
		}
		return $string;
	}

?>