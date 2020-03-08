<?php

try {
    $pdo = new PDO('mysql:dbname=kadai06_db;
    charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
}

$stmt = $pdo->prepare("SELECT * FROM kadai06_table");
$status = $stmt->execute();

$view="";
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    while($result = $stmt->fetch
    (PDO::FETCH_ASSOC)){
        $view .= '<dl>';
        $view .= '<a class="f" href="u_view.php?id='.$result["id"].'">';
        $view .= '<dt>'.$result['project']."：".'</dt>';
        $view .= '<dd>'.$result['content'].'</dd>';
        $view .= '<p class="viewP m">'."〆切：".$result['month'].'</p>';
        $view .= '<p class="viewP">'."／".$result['date'].'</p>';
        $view .= '</a>';
        $view .= "　";
        $view .= '<a href="delete.php?id='.$result["id"].'">';
        $view .= '<button class="delete">削除</button>';
        $view .= '</a>';
        $view .= '</dl>';
    }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoリスト</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <section class="top">
                <div id="title">
                    <h1>ToDoリスト</h1>
                </div>
            <section class="bg">
                <p class="s">背景を選択する</p>
                <p><img id="wallA" src="./img/wall.jpg" width="40px" height="40px"></p>
                <p id="wallC"><img src="./img/wall03.png" width="40px" height="40px"></p>
                <p id="wallD"><img src="./img/wall04.png" width="40px" height="40px"></p>
                <p id="wallE"><img src="./img/wall05.png" width="40px" height="40px"></p>
                <p id="wallF"><img src="./img/wall07.png" width="40px" height="40px"></p>
            </section>
        </section>
        <section class="new">
            <form action="insert.php" method="post">
                <div class="flexField">
                    <div class="pj">
                        <p class="p">プロジェクト名▼</p>
                        <input type="text" placeholder="プロジェクトを入力" value="" name="project" id="pj">
                    </div>
                    <div class="content">
                        <p class="p">To Do▼</p>
                        <input type="text" placeholder="タスクを入力" name="content" id="content">
                    </div>
                    <div class="month">
                        <p class="p">いつまで▼</p>
                        <input type="text" placeholder="何月" name="month" id="month">
                    </div>
                    <div class="date">
                        <p class="p">（半角数字）</p>
                        <input type="text" placeholder="何日" name="date" id="date">
                    </div>
                    <div class="regist">
                        <button id="regist">登録</button>
                    </div>
                </div>
                <!-- <div class="kensaku">
                    <input type="text" name="search" id="search">
                    <button id="kensaku">検索</button>
                </div> -->
            </form>    
        </section>    

        <section class="viewAll">
            <button id="viewAll">一覧表示／非表示▼</button>
        </section>    

        <section class="result">
            <div id="result"><?=$view?></div>
        </section>

    </div>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        $('#viewAll').on('click',function(){
            $('.result').toggle();
        })

        $('#wallA').on('click',function(){
            $('body').css("background-image","url(./img/wall.jpg)");
            localStorage.setItem('背景画像', 'wall');
        })
        $('#wallC').on('click',function(){
            $('body').css("background-image","url(./img/wall03.png)");
            localStorage.setItem('背景画像', 'wall03');
        })
        $('#wallD').on('click',function(){
            $('body').css("background-image","url(./img/wall04.png)");
            localStorage.setItem('背景画像', 'wall04');
        })
        $('#wallE').on('click',function(){
            $('body').css("background-image","url(./img/wall05.png)");
            localStorage.setItem('背景画像', 'wall05');
        })
        $('#wallF').on('click',function(){
            $('body').css("background-image","url(./img/wall07.png)");
            localStorage.setItem('背景画像', 'wall07');
        })

       
        // $('body').on('click',function(){
        //     var t = localStorage.getItem('背景画像');
        //     // var obj = t['キー1']
        //     console.log(t);
        // })

        $(function() {
            var bg = localStorage.getItem( "背景画像" ); 
            console.log(bg);

            if(bg){
                $('body').css("background-image",`url(./img/${bg}.png)`);
            }else{
                console.log("ないよ");
            }
        });



    </script>
    
</body>
</html>