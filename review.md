# Laravel Lesson レビュー①

## Todo一覧機能

### Todoモデルのallメソッドで実行しているSQLは何か
- SELECT * FROM todos;
### Todoモデルのallメソッドの返り値は何か
- Illuminate\Database\Eloquent\Collectionクラスのインスタンス
### 配列の代わりにCollectionクラスを使用するメリットは
- 配列よりもシンプルなコードで操作が可能
### view関数の第1・第2引数の指定と何をしているか
- 第一引数：画面に表示したいbladeファイルの相対パス
- 第二引数：blade内での変数名 => 代入したい値
### index.blade.phpの$todos・$todoに代入されているものは何か
- $todos：$todo->all();
- $todo：Todoモデルのインスタンス

## Todo作成機能

### Requestクラスのallメソッドは何をしているか
- フォームから送信された値を一括で取得している
### fillメソッドは何をしているか
- Requestクラスのallメソッドで取得した値をTodoモデルのインスタンスに一括で代入している。
### $fillableは何のために設定しているか
- 意図しないカラムが更新されないようにするため
### saveメソッドで実行しているSQLは何か
- INSERT INTO todos content VALUES $request->input('content');
### redirect()->route()は何をしているか
- 指定したルート名に設定されたURLへリダイレクトしている。

## その他

### テーブル構成をマイグレーションファイルで管理するメリット
- 現在のデータベースの状態を他の開発者に共有することができる
### マイグレーションファイルのup()、down()は何のコマンドを実行した時に呼び出されるのか
- artisanコマンド
### Seederクラスの役割は何か
- レコードを作成すること
### route関数の引数・返り値・使用するメリット
- 引数：ルート名
- 返り値：ルート名に対応するURL
- メリット：URLが簡潔になり可読性の向上するのと、URLの変更時の修正箇所が少なくなるため保守性が向上する。
### @extends・@section・@yieldの関係性とbladeを分割するメリット
- @extendsで継承する親Bladeファイルを指定し、@section('任意の文字列')から@endsectionで囲った部分を、継承した親Bladeファイルの@yield('任意の文字列')の箇所に挿入している。
- メリット：共通部分を別ファイルにまとめ、再利用可能にできる
### @csrfは何のための記述か
- CSRF対策のための記述
### {{ }}とは何の省略系か
- <?php echo e('任意の文字'); ?>