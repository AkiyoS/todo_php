<?php

$id = $_GET['id'];

try {
    $pdo = new PDO('mysql:dbname=kadai06_db;
    charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
}

$sql = 'DELETE FROM kadai06_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id' , $id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    header("Location: index.php");
    exit;
}

?>