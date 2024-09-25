<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-08">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="/css/home.css">
    </head>

    <x-app-layout>
    <body>
        <h2>大会名：{{ $tournament->name }}</h2></br>
        <a class="normal">詳細：{{ $tournament->body }}</a></br>
        
        @if(isset($closed))
            <a class="normal">募集が終了しています</a>
        @else
            <form action="/entry/confirmation/{{$tournament->id}}" method="POST">
                @csrf
                <label for="nickname">ニックネーム：</label>
                <input type="text" name="entry[nickname]" id="nickname" maxlength="20" placeholder="20文字以内"/><br>
                <input type="submit" value="参加する"/>
            </form>
        @endif
        
        <p><a href="#" onclick="history.back()">戻る</a></p>
    </body>
    </x-app-layout>

</html>