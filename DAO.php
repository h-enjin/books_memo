<?php
// データの保存や削除など
class DAO {
        private ?PDO $pdo = null;
        
        // Get PDO connection
        private function getConnection(): PDO {
                if ($this->pdo === null) {
                        try {
                                $this->pdo = new PDO(
                                        'mysql:dbname=niko;host=localhost;charset=utf8mb4',
                                        'root',
                                        '',
                                        [
                                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                                PDO::ATTR_EMULATE_PREPARES => false,
                                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                                        ]
                                );
                        } catch (PDOException $e) {
                                echo 'Database connection error: ' . $e->getMessage();
                                die();
                        }
                }
                return $this->pdo;
        }
        
        // Execute query and return results
        public function pdo(string $sql): array {
                $pdo = $this->getConnection();
                $stmt = $pdo->query($sql);
                return $stmt->fetchAll();
        }
        
        // Execute prepared statement
        public function execute(string $sql, array $params = []): bool {
                $pdo = $this->getConnection();
                $stmt = $pdo->prepare($sql);
                return $stmt->execute($params);
        }
        
        // Get data with prepared statement
        public function getDataWithParams(string $sql, array $params = []): array {
                $pdo = $this->getConnection();
                $stmt = $pdo->prepare($sql);
                $stmt->execute($params);
                return $stmt->fetchAll();
        }
        
        // Get all messages
        public function getData(): array {
                $sql = "SELECT * FROM messages";
                return $this->pdo($sql);
        }
        
        // Register user
        public function registerUser(string $username, string $password, string $email): bool {
                $sql = "INSERT INTO users (name, password, email) VALUES (:name, :password, :email)";
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                
                return $this->execute($sql, [
                        ':name' => $username,
                        ':password' => $hashedPassword,
                        ':email' => $email
                ]);
        }
        
        // Delete user
        public function deleteUser(int $user_id): bool {
                $sql = "DELETE FROM users WHERE id = :user_id";
                return $this->execute($sql, [':user_id' => $user_id]);
        }
        
        // Insert book
        public function insertBook(string $bookname, int $user_id): bool {
                $sql = "INSERT INTO books (name, buy_flg, user_id) VALUES (:name, :buy_flg, :user_id)";
                return $this->execute($sql, [
                        ':name' => $bookname,
                        ':buy_flg' => 0,  // Use 0 instead of false for MySQL boolean
                        ':user_id' => $user_id
                ]);
        }
        
        // Update book
        public function updateBook(int $book_id, array $data): bool {
                $setClause = [];
                $params = [':book_id' => $book_id];
                
                foreach ($data as $key => $value) {
                        $setClause[] = "$key = :$key";
                        $params[":$key"] = $value;
                }
                
                $sql = "UPDATE books SET " . implode(', ', $setClause) . " WHERE id = :book_id";
                return $this->execute($sql, $params);
        }
        
        // Delete book
        public function deleteBook(int $book_id): bool {
                $sql = "DELETE FROM books WHERE id = :book_id";
                return $this->execute($sql, [':book_id' => $book_id]);
        }
        
        // Get all books
        public function getBooks(): array {
                $sql = "SELECT * FROM books";
                return $this->pdo($sql);
        }
}