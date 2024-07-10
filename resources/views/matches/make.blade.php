<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-08">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="./CSS/home.css">
    </head>

    <body>
        <h1>CHUNITHM Score Attack</h1>
        <p>大会の設定</p>

        <label for="match-name">大会名：</label>
        <input type="search" id="match-make">
        <br>

        <label for="match-id">大会ID：</label>
        <input type="search" id="match-id">
        <br>

        <label for="max-people">
            最大参加人数：<input type="search" id="max-people">人
        </label>
        <br>

        <label for="min-people">
            最小参加人数：<input type="search" id="min-people">人
        </label>
        <br>

        <label for="match-type">大会形式：</label>
        <input type="search" id="match-type">
        <br>

        <label for="score-type">スコア形式：</label>
        <input type="search" id="score-type">
        <br>

        <label for="primary">予選の有無：</label>
            <input type="radio" name="primary">有
            <input type="radio" name="primary">無

            
        <p><a href="operation.blade.php">戻る</a></p>

    </body>
</html>