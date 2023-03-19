<?php
    require_once '../DBManager.php';
    session_start();

    try{
        $db = getDb();
        $stt = $db -> prepare("SELECT id, title, content FROM articles WHERE author = :author AND title = :title");

        $stt -> bindValue(':author', $_SESSION['user_name'], PDO::PARAM_STR);
        $stt -> bindValue(':title', $_GET['title'], PDO::PARAM_STR);
        $stt -> execute();

        $rows = $stt -> fetchAll(PDO::FETCH_ASSOC);
        
        $_SESSION['search_result'] = $rows;
        header('Location:http://kotaro.jp/pokemonDungeonPortal/articles/writeArticle.html');
        
    }catch(PDOException $e){
        die("エラーメッセージ:{$e->getMessage()}");
    }