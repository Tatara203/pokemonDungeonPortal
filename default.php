<?php
    function printheader():void{
        echo '
        <header class="header">
            ポケモン不思議のダンジョン攻略サイト
            <h1>ポケモン不思議のダンジョン攻略サイトへようこそ!</h1>
        </header>';
    }

    function printSideMenu():void{
        echo '
        <div id="content_search">
            <h3>検索</h3>
            <p><span>各シリーズの</span><span>ポケモンの</span><span>データを</span><span>検索</span>できます。</p>
            <a href="../searchdetail/pokemonsearch.html">ポケモン検索</a>
            <p><span>各シリーズの</span><span>道具の効果・入手法などを</span><span>検索</span>できます。</p>
            <a href="../searchdetail/goodsSearch.html">どうぐ検索</a>
            <p><span>わなの種類と</span><span>効果、</span><span>出現する</span><span>ダンジョンなどを</span><span>検索</span>できます。</p>
            <a href="../searchdetail/trapsSearch.html">わな検索</a>
        </div>
        <div id="user_search">
            <p>ユーザ検索</p>
            <form type="get" action="../db/users/searchUser.php">
                <input type="text" placeholder="名前で検索">
                <input type="submit" id="userSearch" value="検索">
            </form>
            <p><span>攻略記事などを</span><span>投稿している</span><span>ユーザを</span>検索できます。</p>
        </div>
        <div id="createArticle">
            <h3>攻略記事投稿</h3>
                <form method="get" action="./createArticle/editPage.html">
                    <button type="button" id="createArticle">作成する</button>
                </form>
            <p>ダンジョンの攻略記事を作成しましょう!</p>
        </div>';
    }