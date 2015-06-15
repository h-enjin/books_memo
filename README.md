#books_memo

##Description
	欲しい本をメモする
##Function
	・本のタイトルをDBに保存し、管理する
##Future
	・Amazonもしくは楽天から本を検索し、URLへリダイレクトできるようにする。
	・発売日をチェックする。


##Language
	PHP5.6.10

##DataBase
	MySQL5.6.25

##CSS Framework
	Honoka


##DB定義
	ユーザテーブル(users)
		id
		name
		password
		e-mail
	本テーブル(books)
		name
		buy_flg
		users_id
		