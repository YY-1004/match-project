<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="/css/home.css">
    </head>

    <body>
        <h1>CHUNITHM Score Attack</h1>
        <h3>{{ $tournament->name }}</h3>
        
        @if( $round === "start")
            <p>メンバー募集中です</p>
            <p>開始までもうしばらくお待ちください</p>
        @else
            <a href="/matches/tournament/{{ $tournament->id }}">結果はこちら</a>
            @if( $round === "end" )
                <p>全試合が終了しました</p>
            @else
                <div class="content">
                    <form action="/scores/" method="POST">
                    @csrf
                    @method('PUT')
                        <div class='content__title'>
                            <h4>スコア登録</h4>
                            <p>現在{{ $round }}です</p>
                            <label for="team">チーム選択:</label>
                            <select size="1" name="score[id]" id="team">
                                @if (isset($Cscores_id[0]))
                                    @foreach($Cteams as $Cteam)
                                        <option value="{{ $Cscores_id[$loop->index] }}">{{ $Cteam }}</option>
                                    @endforeach
                                @elseif (isset($Bscores_id[0]))
                                    @foreach($Bteams as $Bteam)
                                        <option value="{{ $Bscores_id[$loop->index] }}">{{ $Bteam }}</option>
                                    @endforeach
                                @else
                                    @foreach($Ateams as $Ateam)
                                        <option value="{{ $Ascores_id[$loop->index] }}">{{ $Ateam }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
        
                        <div class='content__body'>
                            <label for="score">SCORE:</label>
                            <input type="number" min="0" max="1010000"  id="score" name="score[score]" value="0"><br>
        
                            <label for="justice-critical">JUSTICE CRITICAL:</label>
                            <input type="number" min="0" max="10000" id="justice-critical" name="score[justice_critical]" value="0"><br>
        
                            <label for="justice">JUSTICE:</label>
                            <input type="number" min="0" max="10000" id="justice" name="score[justice]" value="0"><br>
        
                            <label for="attack">ATTACK:</label>
                            <input type="number" min="0" max="10000" id="attack" name="score[attack]" value="0"><br>
        
                            <label for="miss">MISS:</label>
                            <input type="number" min="0" max="10000" id="miss" name="score[miss]" value="0"><br>
                        </div>
                        <input type="submit" value="保存"/><br>
                    </form>
                </div>
            @endif
        @endif
        <a href="#" onclick="history.back()">戻る</a>
    </body>
</html>