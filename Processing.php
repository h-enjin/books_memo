<?php
// 処理系
require_once "DAO.php";

class Processing {
    private DAO $dao;
    
    public function __construct() {
        $this->dao = new DAO();
    }
    
    // 特殊文字対策
    public function h(string $str): string {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }
    
    public function processBookForm(): void {
        // 本の追加処理
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['b_title']) && !empty($_POST['b_title'])) {
            $bookTitle = $this->h($_POST['b_title']);
            
            // For now, we'll use a default user ID of 1
            $userId = 1;
            
            $result = $this->dao->insertBook($bookTitle, $userId);
            
            if ($result) {
                echo '<div class="alert alert-success mt-3" role="alert">本が追加されました！</div>';
            } else {
                echo '<div class="alert alert-danger mt-3" role="alert">本の追加に失敗しました。</div>';
            }
        }
        
        // 本の削除処理
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_book_id']) && !empty($_POST['delete_book_id'])) {
            $bookId = (int)$_POST['delete_book_id'];
            
            $result = $this->dao->deleteBook($bookId);
            
            if ($result) {
                echo '<div class="alert alert-success mt-3" role="alert">本が削除されました！</div>';
            } else {
                echo '<div class="alert alert-danger mt-3" role="alert">本の削除に失敗しました。</div>';
            }
        }
    }
    
    public function getBooks(): array {
        return $this->dao->getBooks();
    }
}