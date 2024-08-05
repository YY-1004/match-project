<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="/css/home.css">
    </head>

    <body>
        <h1>CHUNITHM Score Attack</h1>
        <p>{{ $tournament->name }}</p>
        <p>結果</p>
        <div class="result_data">
            @if(isset($Ascores[0]))
                <details>
                    <summary class="result_title">準々決勝</summary>
                        <div class='results'>
                            @foreach($Ateams as $Ateam)
                                @if ($loop->odd)
                                    <div class='odd'>
                                        <h2 id ='result{{ $loop->iteration }}'>{{ $Ateam }} vs</h2>
                                    </div>
                                @else
                                    <h2 id ='result{{ $loop->iteration }}'>{{ $Ateam }}</h2>

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

            @if(isset($Bscores[0]))
                <details>
                    <summary class="result_title">準決勝</summary>
                        <div class='results'>
                            @foreach($Bteams as $Bteam)
                                @if ($loop->odd)
                                    <div class='odd'>
                                        <h2 id ='result{{ $loop->iteration + 8 }}'>{{ $Bteam }}vs</h2>
                                    </div>
                                @else
                                    <h2 id ='result{{ $loop->iteration + 8 }}'>{{ $Bteam }}</h2>
        
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
        
            @if(isset($Cscores[0]))
                <details>
                    <summary class="result_title">決勝</summary>
                        <div class='results'>
                            @foreach($Cteams as $Cteam)
                                @if ($loop->odd)
                                    <div class='odd'>
                                        <h2 id ='result{{ $loop->iteration + 12 }}'>{{ $Cteam }}vs</h2>
                                    </div>
                                @else
                                    <h2 id ='result{{ $loop->iteration + 12 }}'>{{ $Cteam }}</h2>
        
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

        <p><a href="/{{ $tournament->id }}">戻る</a></p>
    </body>
</html>