<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-08">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="/css/home.css">
    </head>

    <body>
        <h1>CHUNITHM Score Attack</h1>
        <p>運営中の大会</p>
        <a>大会名：{{ $tournament->name }}</a></br>
        <a>詳細：{{ $tournament->body }}</a></br>
        
        <form action="/entry/confirmation/{{$tournament->id}}" method="POST">
            @csrf
            <label for="nickname">ニックネーム：</label>
            <input type="text" name="entry[nickname]" id="nickname" maxlength="20" placeholder="20文字以内"/><br>
            <input type="submit" value="参加する"/>
        </form>
        
        <p><a href="#" onclick="history.back()">戻る</a></p>
    </body>
</html>