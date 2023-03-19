<?php
    require_once '../DBManager.php';
    session_start();

    try{
        $db = getDb();
        if(isset($_POST['action'])){
            $action = $_POST['action'];
            if(isset($_SESSION['article_id'])){

            }else{
                
            }
            if($action == 'upload'){
                $stt = $db -> prepare("INSERT INTO articles(author, content, title, isDisclosed, isDropped) VALUES(:author, :content, :title,1,0)");
                $stt -> bindParam(':title', $_POST['title'], PDO::PARAM_STR);
                $stt -> bindParam(':author', $_SESSION['user_name'], PDO::PARAM_STR);
                $stt -> bindParam(':content', $_POST['content'], PDO::PARAM_STR);
                $stt -> execute();

                header('Location:http://kotaro.jp/pokemonDungeonPortal/index.html');
            }else if($action == 'save'){
                $stt = $db -> prepare("INSERT INTO articles(author, content, title, isDisclosed, isDropped) VALUES(:author, :content, :title,0,0)");
                $stt -> bindParam(':title', $_POST['title'], PDO::PARAM_STR);
                $stt -> bindParam(':author', $_SESSION['user_name'], PDO::PARAM_STR);
                $stt -> bindParam(':content', $_POST['content'], PDO::PARAM_STR);
                $stt -> execute();

                header('Location:http://kotaro.jp/pokemonDungeonPortal/index.html');
            }
        }
        
    }catch(PDOException $e){
        die("エラーメッセージ:{$e->getMessage()}");
    }