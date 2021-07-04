<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>管理者登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">管理者一覧</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div><!-- ここを追記 -->
                <div class="navbar-header"><a class="navbar-brand" href="unlogin.php">ログイン無しで見れるページ</a></div><!-- ここを追記 -->
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>管理者登録</legend>
                <label>名前：<input type="text" name="name"></label><br>
                <label>管理者ID：<input type="text" name="lid"></label><br>
                <label>管理者PW：<input type="text" name="lpw"></label><br>
                <!-- <label>管理者/スーパー管理者：<select name="kanri_flg"><option value=0>管理者</option><option value=1>スーパー管理者</option></label><br>
                <label>退社/入社：<input type="radio" name="life_flg" value=0>退社<input type="radio" name="life_flg" value=1>入社</label><br> -->
                <label>管理者/スーパー管理者：
                <input type="checkbox" name="kanri_flg" value=0 >管理者
                <input type="checkbox" name="kanri_flg" value=1 >スーパー管理者
                </label><br>
                <label>退社/入社：
                <input type="checkbox" name="life_flg" value=0 >退社
                <input type="checkbox" name="life_flg" value=1 >入社
                </label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
