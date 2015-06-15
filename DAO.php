<?php
// データの保存や削除など
class DAO {
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