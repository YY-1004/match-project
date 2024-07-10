<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-08">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="css/tournament.css">
    </head>

    <body class="mySVG">
        <h1>CHUNITHM Score Attack</h1>
        <p>大会名</p>
        <img
            class="tournament_image"
            src="svg/tournament.svg"
            alt=""
        />
        <a id="A" href="result.blade.php#resultAB">{{$team_1}}</a>
        <a id="B" href="result.blade.php#resultAB">{{$team_2}}</a>
        <a id="C" href="result.blade.php#resultCD">{{$team_3}}</a>
        <a id="D" href="result.blade.php#resultCD">{{$team_4}}</a>
        <a id="E" href="result.blade.php#resultEF">{{$team_5}}</a>
        <a id="F" href="result.blade.php#resultEF">{{$team_6}}</a>
        <a id="G" href="result.blade.php#resultGH">{{$team_7}}</a>
        <a id="H" href="result.blade.php#resultGH">{{$team_8}}</a>
        <a id="I" href="result.blade.php#resultIJ">{{$team_9}}</a>
        <a id="J" href="result.blade.php#resultIJ">{{$team_10}}</a>
        <a id="K" href="result.blade.php#resultKL">{{$team_11}}</a>
        <a id="L" href="result.blade.php#resultKL">{{$team_12}}</a>
        <a id="M" href="result.blade.php#resultMN">{{$team_13}}</a>
        <a id="N" href="result.blade.php#resultMN">{{$team_14}}</a>
        <a id="O" href="result.blade.php#resultMN">{{$team_15}}</a>

        <p><a id="re" href="/match/resources/views/matches/ban.blade.php">戻る</a></p>

    </body>
</html>