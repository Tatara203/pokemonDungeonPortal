<?php
    require_once '../DBManager.php';
    session_start();
    try{
        $db = getDb();
        $stt = $db -> prepare('SELECT member_name FROM memberinfo WHERE member_name LIKE :membername');
        $stt -> bindValue(':membername', "%{$_POST['membername']}%", PDO::PARAM_STR);

        $stt -> execute();
        $memberName = $stt -> fetchAll(PDO::FETCH_ASSOC);
        if(isset($memberName)){
            $_SESSION['membername'] = $memberName;
            header('Location:http://kotaro.jp/pokemonDungeonPortal/users/userSearchResult.html');
        }else{
            header('Location:http://kotaro.jp/pokemonDungeonPortal/users/userSearchResult.html');
            throw new PDOException('ユーザが見つかりません。');
        }
    }catch(PDOException $e){
        die("エラーメッセージ:{$e->getMessage()}");
    }