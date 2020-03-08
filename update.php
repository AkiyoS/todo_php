<?php

$project = $_POST['project'];
$content = $_POST['content'];
$month = $_POST['month'];
$date = $_POST['date'];
$id = $_POST['id'];

try {
    $pdo = new PDO('mysql:dbname=kadai06_db;
    charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
}

$update = $pdo->prepare("UPDATE kadai06_table SET project=:project,content=:content,month=:month,date=:date WHERE id=:id");
$update->bindValue(':project' , $project, PDO::PARAM_STR);
$update->bindValue(':content' , $content, PDO::PARAM_STR);
$update->bindValue(':month' , $month, PDO::PARAM_INT);
$update->bindValue(':date' , $date, PDO::PARAM_INT);
$update->bindValue(':id' , $id, PDO::PARAM_INT);

$status = $update->execute();

if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    header("Location: index.php");
    exit;
}

?>