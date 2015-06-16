<?php
// データの保存や削除など
class DAO {
	
	// DBから取得
	function pdo($sql) {
		try {
			$pdo = new PDO(
				'mysql:dbname=;host=localhost;charset=utf8',
				'root',
				'',
				array(
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_EMULATE_PREPARES => false,
				)
			);
		} catch (PDOException $e) {
			echo 'error' . $e->getMessage;
			die();
		}
		$stmt = $pdo->query($sql);
		$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $items;
	}
	
	// ユーザ登録関数
	function registerUser($username, $password, $email) {
		$sql = "INSERT INTO users (name, password, email) VALUES (:name, :password, :email)";
		
		
	}
	// ユーザ削除関数
	function deleteUser($user_id) {
		$sql = "DELETE WHERE id=:user_id";
	}
	// 本の登録関数
	function insertBook($bookname, $user_id) {
		$sql = "INSERT INTO books (name, buy_flg, user_id) VALUES (:name, :buy_flg, :user_id)";
		
		
	}
	// 本の登録情報更新関数
	function updateBook($book_id) {
		$sql = "UPDATE ";
	}
	// 本の登録削除関数
	function deleteBook($book_id) {
		$sql = "DELETE WHERE id=:book_id";
	}
}