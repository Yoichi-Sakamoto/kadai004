<?php
//selsect.phpから処理を持ってくる
//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)
session_start();

require_once('funcs.php');

loginCheck();

$pdo = db_conn();

//2.対象のIDを取得
$id = $_GET["id"];

//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}



?>

<!-- 以下はindex.phpのHTMLをまるっと持ってくる -->
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
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>管理者情報</legend>
                <label>名前：<input type="text" name="name" value="<?= $result['name']?>"></label><br>
                <label>管理者ID：<input type="text" name="lid" value="<?= $result['lid']?>"></label><br>
                <label>管理者PW：<input type="text" name="lpw" value="<?= $result['lpw']?>"></label><br>
                <!-- <label>管理者/スーパー管理者：<select name="kanri_flg" value="<?= $result['kanri_flg']?>"><option value=0>管理者</option><option value=1>スーパー管理者</option></label><br>
                <label>退社/入社：<input type="radio" name="life_flg" value=0>退社<input type="radio" name="life_flg" value=1>入社</label><br> -->

                <label>管理者/スーパー管理者：
                <input type="checkbox" name="kanri_flg" value=0 <?php if($result['kanri_flg'] === '0') echo 'checked="checked"'?>>管理者
                <input type="checkbox" name="kanri_flg" value=1 <?php if($result['kanri_flg'] === '1') echo 'checked="checked"'?>>スーパー管理者
                </label><br>
                <label>退社/入社：
                <input type="checkbox" name="life_flg" value=0 <?php if($result['life_flg'] === '0') echo 'checked="checked"'?>>退社
                <input type="checkbox" name="life_flg" value=1 <?php if($result['life_flg'] === '1') echo 'checked="checked"'?>>入社
                </label><br>

                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
