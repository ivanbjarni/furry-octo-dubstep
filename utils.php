<?php
	function cutString ($string) {
		if (strlen($string >= 50)) {
			return substr($string, 0, 50);
		}
		return $string;
	}

?>