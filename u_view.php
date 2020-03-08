<?php

$id = $_GET['id'];

try {
    $pdo = new PDO('mysql:dbname=kadai06_db;
    charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
}

$sql = 'SELECT * FROM kadai06_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id' , $id, PDO::PARAM_INT);
$status = $stmt->execute();

$view="";
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="uView">
    <div class="wrapper">
        <section class="title">
            <div id="title">
                <h1>更新ページ</h1>
            </div>
        </section>

        <section class="new">
            <form action="update.php" method="post" class="entry">
                <div class="flexField">
                    <div class="pj">
                        <p class="p">プロジェクト名▼</p class="p">
                        <input type="text" placeholder="プロジェクトを入力" value="<?=$row['project']?>" name="project" id="pj">
                    </div>
                    <div class="content">
                        <p class="p">To Do▼</p class="p">
                        <input type="text" placeholder="タスクを入力" value="<?=$row['content']?>" name="content" id="content">
                    </div>
                    <div class="month">
                        <p class="p">いつまで▼</p class="p">
                        <input type="text" placeholder="何月" value="<?=$row['month']?>" name="month" id="month">
                    </div>
                    <div class="date">
                        <p class="p">（半角数字）</p class="p">
                        <input type="text" placeholder="何日" value="<?=$row['date']?>" name="date" id="date">
                        <input type="hidden" name="id" value="<?=$row['id']?>">
                    </div>
                    <div class="regist">
                        <button id="regist">登録</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</body>
</html>