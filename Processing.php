<?php
// 処理系
class Processing {
	// 特殊文字対策
	function h($strings) {
		return htmlspecialchars($strings, ENT_QUOTES);
	}
}