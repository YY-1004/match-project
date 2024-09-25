<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-08">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="/css/home.css">
    </head>

    <x-app-layout>
    <body>
        <!--<h1>CHUNITHM Score Attack</h1>-->
        <label for="match1"><h3 id=manage>運営中の大会</h3></label>
        <div class="contents_box" id="match1">
            @foreach($tournaments as $tournament)
                <div><a href="/matches/judge/{{ $tournament->id }}">{{ $tournament->name }}</a></div>
            @endforeach
        </div>
        
        <div class="operation">
            <div><a href="/matches/make">大会を運営したい方はこちら</a></div>
        </div>

        <!--<p><a href="/">戻る</a></p>-->
    </body>
    </x-app-layout>

</html>