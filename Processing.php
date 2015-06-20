<?php
// 処理系
class Processing {
	// 特殊文字対策
	function h($str) {
		return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
	}
	
	
}