<?php
    require_once '../DBManager.php';
    session_start();

    try{
        $db = getDb();
        if(isset($_POST['action'])){
            $action = $_POST['action'];
            //新規記事の投稿か、既存記事の更新かを判定
            if(isset($_SESSION['id'])){
                //公開ステータスの判定
                if($action == 'upload'){
                    //既存記事を更新し、投稿状態にする処理
                    $stt = $db -> prepare("UPDATE articles SET title = :title, content = :content, isDisclosed = 1 WHERE id = :id");
                    $stt -> bindParam(':id', $_SESSION['id'], PDO::PARAM_STR);
                    $stt -> bindParam(':title', $_POST['title'], PDO::PARAM_STR);
                    $stt -> bindParam(':content', $_POST['content'], PDO::PARAM_STR);
                    $stt -> execute();
    
                    header('Location:http://kotaro.jp/pokemonDungeonPortal/users/userHome.html');
                }else if($action == 'save'){
                    //既存記事を更新し、一時保存する処理
                    $stt = $db -> prepare("UPDATE articles SET title = :title, content = :content, isDisclosed = 0 WHERE id = :id");
                    $stt -> bindParam(':id', $_SESSION['id'], PDO::PARAM_STR);
                    $stt -> bindParam(':title', $_POST['title'], PDO::PARAM_STR);
                    $stt -> bindParam(':content', $_POST['content'], PDO::PARAM_STR);
                    $stt -> execute();
                    
                    header('Location:http://kotaro.jp/pokemonDungeonPortal/users/userHome.html');
            }else{
                //公開ステータスの判定
                if($action == 'upload'){
                    //新規記事を登録し、投稿状態にする処理
                $stt = $db -> prepare("INSERT INTO articles(author, content, title, isDisclosed, isDropped) VALUES(:author, :content, :title,1,0)");
                $stt -> bindParam(':title', $_POST['title'], PDO::PARAM_STR);
                $stt -> bindParam(':author', $_SESSION['user_name'], PDO::PARAM_STR);
                $stt -> bindParam(':content', $_POST['content'], PDO::PARAM_STR);
                $stt -> execute();

                header('Location:http://kotaro.jp/pokemonDungeonPortal/users/userHome.html');
            }else if($action == 'save'){
                //新規記事を登録し、一時保存する処理
                $stt = $db -> prepare("INSERT INTO articles(author, content, title, isDisclosed, isDropped) VALUES(:author, :content, :title,0,0)");
                $stt -> bindParam(':title', $_POST['title'], PDO::PARAM_STR);
                $stt -> bindParam(':author', $_SESSION['user_name'], PDO::PARAM_STR);
                $stt -> bindParam(':content', $_POST['content'], PDO::PARAM_STR);
                $stt -> execute();

                header('Location:http://kotaro.jp/pokemonDungeonPortal/users/userHome.html');
            }
                //処理が失敗した場合、ホーム画面に遷移する
                header('Location:http://kotaro.jp/pokemonDungeonPortal/index.html');
            }
        }
        }
    }catch(PDOException $e){
        error_log("エラーメッセージ:{$e->getMessage()}");
        die();
    }