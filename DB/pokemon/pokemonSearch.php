<?php
    require_once '../pokeDBManager.php';
    require_once '../../encode.php';
    session_start();
?>
<?php
    $pokeName = isset($_POST['pokemon_name']) ? $_POST['pokemon_name'] : '';
    try{
        $db = getDb();
        $stt = $db -> prepare("SELECT * FROM pokemon_details WHERE pokemon_name LIKE :pokemon_name");
        $stt -> bindValue(':pokemon_name', "%{$pokeName}%", PDO::PARAM_STR);

        $stt -> execute();
        $rows = $stt -> fetchAll(PDO::FETCH_ASSOC);
        
        $_SESSION['search_result'] = $rows;
        header('Location:http://kotaro.jp/pokemondungeonportal/searchdetail/pokemonsearchResult.html');
    } catch(PDOException $e){
        die("エラーメッセージ:{$e->getMessage()}");
    }
   