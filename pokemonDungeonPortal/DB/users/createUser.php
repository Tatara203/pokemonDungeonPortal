<?php
    require_once '../DBManager.php';

    try{
        $db = getDb();
        $stt = $db ->prepare('INSERT INTO memberinfo(member_name, member_pwd) values (:member_name, :pwd)');

        //INSERT命令にポストデータの内容をセット
        $stt->bindValue(':member_name', $_POST['member_name']);
        $hashedPass = password_hash($_POST['pwd'],PASSWORD_DEFAULT);
        $stt->bindValue(':pwd', $hashedPass);

        //INSERT命令を実行
        $stt->execute();
        //処理後は登録完了ページに移動
        $_SESSION['member_name'] = $_POST['member_name'];
        $_SESSION['pwd'] = $_POST['pwd'];
        header('Location:http://kotaro.jp/pokemonDungeonPortal/registration/registerCompleted.html');
    }catch(PDOException $e){
        die("エラーメッセージ:{$e->getMessage()}");
    }