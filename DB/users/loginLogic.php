<?php
    session_start();
    require_once '../DBManager.php';
    try{
        $db = getDb();
        $stt = $db -> prepare('SELECT member_name, member_pwd FROM memberinfo WHERE member_name = :member_name' );
        $stt -> bindValue(':member_name', $_POST['member_name']);

        $stt -> execute();
        $userInfo = $stt -> fetch(PDO::FETCH_ASSOC);
        if(password_verify($_POST['pwd'], $userInfo['member_pwd'])){
            $_SESSION['user_name'] = $userInfo['member_name'];
            header('Location:http://kotaro.jp/pokemonDungeonPortal/index.html');
        }else{
            header('Location:http://kotaro.jp/pokemonDungeonPortal/registration/login.html');
        }
       
    }catch(PDOException $e){
        die("エラーメッセージ:{$e->getMessage()}");
    }