<?php
    require_once '../db/DBManager.php';

    function searchUserArticle($user_name): array{
        try{
            $db = getDb();
            $stt = $db -> prepare("SELECT title, update_date, isDisclosed FROM articles WHERE author = :author ORDER BY update_date DESC");

            $stt -> bindValue(':author', $user_name, PDO::PARAM_STR);
            $stt -> execute();
            $rows = $stt -> fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }catch(PDOException $e){
            error_log("エラーメッセージ:{$e->getMessage()}");
            die();
        }
    }