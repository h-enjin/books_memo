<?php
require_once "DAO.php";

$db = new DAO();

$sql = "select * from messages";
// $sql = "insert into messages (username, message) value ('enjin', '日本語テスト')";

$test = $db->pdo($sql);
echo "num username message\n";
foreach ($test as $obj) {
	echo $obj["id"] . " " . $obj["username"] . " " . $obj["message"] . "\n";
}