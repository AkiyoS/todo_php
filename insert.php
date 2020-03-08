<?php

$project = $_POST['project'];
$content = $_POST['content'];
$month = $_POST['month'];
$date = $_POST['date'];

try {
    $pdo = new PDO('mysql:dbname=kadai06_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('DbConnectError:'.
    $e->getMessage());
}

$stmt = $pdo->prepare("INSERT INTO kadai06_table(id,project,content,month,date)VALUES(NULL, :project, :content,:month,:date)");

$stmt->bindValue(':project' , $project, PDO::PARAM_STR);
$stmt->bindValue(':content' , $content, PDO::PARAM_STR);
$stmt->bindValue(':month' , $month, PDO::PARAM_INT);
$stmt->bindValue(':date' , $date, PDO::PARAM_INT);

$status = $stmt->execute();

if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    header("Location: index.php");
    exit;
}


?>