<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="/css/tournament.css">
    </head>

    <body class="mySVG">
        <h1>CHUNITHM Score Attack</h1>
        <p>{{ $tournaments[0]['name'] }}</p>
        <img
            class="tournament_image"
            src="svg/tournament.svg"
            alt=""
        />
        <a id="A" href="/matches/result#resultAB">{{ $teams[0]['nickname'] }}</a>
        <a id="B" href="/matches/result#resultAB">{{ $teams[1]['nickname'] }}</a>
        <a id="C" href="/matches/result#resultCD">{{ $teams[2]['nickname'] }}</a>
        <a id="D" href="/matches/result#resultCD">{{ $teams[3]['nickname'] }}</a>
        <a id="E" href="/matches/result#resultEF">{{ $teams[4]['nickname'] }}</a>
        <a id="F" href="/matches/result#resultEF">{{ $teams[5]['nickname'] }}</a>
        <a id="G" href="/matches/result#resultGH">{{ $teams[6]['nickname'] }}</a>
        <a id="H" href="/matches/result#resultGH">{{ $teams[7]['nickname'] }}</a>
        <a id="I" href="/matches/result#resultIJ">{{ $teams[0]['nickname'] }}</a>
        <a id="J" href="/matches/result#resultIJ">{{ $teams[2]['nickname'] }}</a>
        <a id="K" href="/matches/result#resultKL">{{ $teams[4]['nickname'] }}</a>
        <a id="L" href="/matches/result#resultKL">{{ $teams[6]['nickname'] }}</a>
        <a id="M" href="/matches/result#resultMN">{{ $teams[2]['nickname'] }}</a>
        <a id="N" href="/matches/result#resultMN">{{ $teams[4]['nickname'] }}</a>
        <a id="O" href="/matches/result#resultMN">{{ $teams[2]['nickname'] }}</a>

        <p><a id="re" href="/matches/ban">戻る</a></p>

    </body>
</html>