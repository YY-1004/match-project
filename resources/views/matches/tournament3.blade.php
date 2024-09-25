<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="/css/tournament.css">
    </head>

    <x-app-layout>
        <x-slot name="header">
            {{ $tournament->name }}
        </x-slot>
    <body class="mySVG">
        <!--<h1>CHUNITHM Score Attack</h1>-->
        <!--<p>{{ $tournament->name }}</p>-->
        <img
            class="tournament_image"
            src="/svg/tournament.svg"
            alt=""
        />
        
        <div class='teams'>
            @foreach ($teams as $team)
                <div class='team'>
                    @if ($loop->odd)
                        <a id="team{{ $loop->iteration }}" href="/matches/result/{{ $tournament->id }}#result{{ $loop->iteration }}">{{ $team }}</a>
                    @else
                        <a id="team{{ $loop->iteration }}" href="/matches/result/{{ $tournament->id }}#result{{ $loop->iteration }}">{{ $team }}</a>
                    @endif
                </div>
            @endforeach
            
            <a id="team15" href="/matches/result/{{ $tournament->id }}#result14">{{ $champion }}</a>
        </div>
        
        <p><a id="re" href="#" onclick="history.back()">戻る</a></p>

    </body>
    </x-app-layout>

</html>