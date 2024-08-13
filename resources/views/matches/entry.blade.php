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
        
        <form action="/search" method="GET">
            
            @if(isset($research))
                <label for="match-search">大会を探す</label>
                <input type="search" name="search_id" id="match-research" maxlength="6" value={{ $research }} placeholder="6文字のIDを入力">
                <button type="submit">検索</button>
            @else
                <label for="match-search">大会を探す</label>
                <input type="search" name="search_id" id="match-search" maxlength="6" placeholder="6文字のIDを入力">
                <button type="submit">検索</button>
            @endif
            
            
            
            @if(isset($match))
                <p>検索結果</p>
                <a href=/matches/confirmation/{{$tournament_id}}>{{ $match }}</a><br>
                <a>{{ $tournament_body }}</a>
            @elseif(isset($error))
                <p>指定したIDの大会は存在しません</p>
            @endif
            
            <p><a href="/">戻る</a></p>
        </form>
    </body>
</html>