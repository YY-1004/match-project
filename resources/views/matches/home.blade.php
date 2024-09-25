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
        <label for="match1"><h3 id=match>参加中の大会（BAN曲指定、スコア登録、結果などはこちら）</h3></label>
            @if(isset($tournaments))
                <div class="contents_box" id=match1>
                    @foreach($tournaments as $tournament)
                        <div><a href="/matches/register/{{ $tournament->id }}">{{ $tournament->name }}</a></div>
                    @endforeach
                </div>
            @else
                <div class="contents_box" id=match1>
                    大会に参加していません
                </div>
            @endif
        <!--<p><a href="/matches/entry">大会の参加はこちら</a></p>-->
        <!--<p><a href="/matches/operation">運営はこちら</a></p>-->
    </body>
    </x-app-layout>

</html>