<?php
require_once "DAO.php";

// try {
// 	$pdo = new PDO(
// 		'mysql:dbname=;host=localhost;charset=utf8',
// 		'root',
// 		'',
// 		array(
// 			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
// 			PDO::ATTR_EMULATE_PREPARES => false,
// 		)
// 	);
// } catch (PDOException $e) {
// 	echo 'error' . $e->getMessage();
// 	die();
// }

$db = new DAO();

$sql = "select * from messages";
// $sql = "insert into messages (username, message) value ('enjin', '日本語テスト')";

$test = $db->pdo($sql);
echo "num username message\n";
foreach ($test as $obj) {
	echo $obj["id"] . " " . $obj["username"] . " " . $obj["message"] . "\n";
}
// var_dump($test);