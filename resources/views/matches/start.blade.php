<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-08">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="/css/home.css">
    </head>

    <body>
        <h1>CHUNITHM Score Attack</h1>
        <p>{{ $tournament->name }}</p>
        
        <form action="/members/confirmation/{{$tournament->id}}" method="POST">
            @csrf
            <p>参加者</p>
            @foreach($entries as $entry)
                <a>{{ $entry->nickname }}</a><br>
                <input type="hidden" name="entry_id[]" value={{$entry->id}}></input>
            @endforeach
            
            <p>メンバーを確定し大会を開始しますか？</p>
            <input type="submit" value="開始"></input>
        </form>
        
        <a href="#" onclick="history.back()">戻る</a>
        
    </body>
</html>