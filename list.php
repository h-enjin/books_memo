<?php
require_once "Processing.php";

$processing = new Processing();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Books MEMO</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                        <a class="navbar-brand" href="/">Books MEMO</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                        <li class="nav-item">
                                                <a class="nav-link" href="/">ホーム</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="list.php">本の一覧</a>
                                        </li>
                                </ul>
                        </div>
                </div>
        </nav>
        <div class="container mt-4">
                <h1>本を追加</h1>
                <?php $processing->processBookForm(); ?>
                <form action="" method="POST" class="mt-3">
                        <div class="mb-3">
                                <label for="bookTitle" class="form-label">本のタイトル</label>
                                <input type="text" class="form-control" id="bookTitle" name="b_title" placeholder="本のタイトルを入力してください">
                        </div>
                        <button type="submit" class="btn btn-primary">追加</button>
                </form>
                
                <h2 class="mt-5">本の一覧</h2>
                <div class="table-responsive mt-3">
                        <table class="table table-striped">
                                <thead>
                                        <tr>
                                                <th>ID</th>
                                                <th>タイトル</th>
                                                <th>状態</th>
                                                <th>操作</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        $books = $processing->getBooks();
                                        if (count($books) > 0) {
                                                foreach ($books as $book) {
                                                        echo '<tr>';
                                                        echo '<td>' . $book['id'] . '</td>';
                                                        echo '<td>' . $processing->h($book['name']) . '</td>';
                                                        echo '<td>' . ($book['buy_flg'] ? '購入済み' : '未購入') . '</td>';
                                                        echo '<td>';
                                                        echo '<form method="POST">';
                                                        echo '<input type="hidden" name="delete_book_id" value="' . $book['id'] . '">';
                                                        echo '<button type="submit" class="btn btn-danger btn-sm">削除</button>';
                                                        echo '</form>';
                                                        echo '</td>';
                                                        echo '</tr>';
                                                }
                                        } else {
                                                echo '<tr><td colspan="4" class="text-center">本が登録されていません</td></tr>';
                                        }
                                        ?>
                                </tbody>
                        </table>
                </div>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- 削除確認ダイアログは省略 -->
</body>
</html>