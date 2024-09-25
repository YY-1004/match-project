<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="/css/home.css">
    </head>

    <x-app-layout>
    <x-slot name="header">
        {{ $tournament->name }}
    </x-slot>
    <body>
        <!--<h1>CHUNITHM Score Attack</h1>-->
        <!--<p>{{ $tournament->name }}</p>-->
        <h3>結果</h3>
        <div class="result_data">
            @if(isset($Bteams[0]))
                <details>
                    <summary class="result_title">準々決勝</summary>
                        <div class='results'>
                            @foreach($Ateams as $Ateam)
                                @if ($loop->odd)
                                    <div class='odd'>
                                        <h2 id ='result{{ $loop->iteration }}'>{{ $Ateam["nickname"] }} vs</h2>
                                    </div>
                                @else
                                    <h2 id ='result{{ $loop->iteration }}'>{{ $Ateam["nickname"] }}</h2>

                                    <table class="result_table">
                                        <tr>
                                            <th>1曲目</th><th>{{ $Ascores[$loop->index-1] }}</th><th>{{ $Ascores[$loop->index] }}</th>
                                        </tr>
                                    </table>
                                @endif
                            @endforeach
                        </div>
                </details>
            @endif

            @if(isset($Cteams[0]))
                <details>
                    <summary class="result_title">準決勝</summary>
                        <div class='results'>
                            @foreach($Bteams as $Bteam)
                                @if ($loop->odd)
                                    <div class='odd'>
                                        <h2 id ='result{{ $loop->iteration + 8 }}'>{{ $Bteam["nickname"] }} vs</h2>
                                    </div>
                                @else
                                    <h2 id ='result{{ $loop->iteration + 8 }}'>{{ $Bteam["nickname"] }}</h2>
        
                                    <table class="result_table">
                                        <tr>
                                            <th>1曲目</th><th>{{ $Bscores[$loop->index-1] }}</th><th>{{ $Bscores[$loop->index] }}</th>
                                        </tr>
                                    </table>
                                @endif
                            @endforeach
                        </div>
                </details>
            @endif
        
            @if(isset($tournament->champion))
                <details>
                    <summary class="result_title">決勝</summary>
                        <div class='results'>
                            @foreach($Cteams as $Cteam)
                                @if ($loop->odd)
                                    <div class='odd'>
                                        <h2 id ='result{{ $loop->iteration + 12 }}'>{{ $Cteam["nickname"] }}vs</h2>
                                    </div>
                                @else
                                    <h2 id ='result{{ $loop->iteration + 12 }}'>{{ $Cteam["nickname"] }}</h2>
        
                                    <table class="result_table">
                                        <tr>
                                            <th>1曲目</th><th>{{ $Cscores[$loop->index-1] }}</th><th>{{ $Cscores[$loop->index] }}</th>
                                        </tr>
                                    </table>
                                @endif
                            @endforeach
                        </div>
                </details>
            @endif
        </div>

        <p><a href="#" onclick="history.back()">戻る</a></p>
    </body>
    </x-app-layout>

</html>