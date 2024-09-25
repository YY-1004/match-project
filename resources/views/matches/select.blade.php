<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-08">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="/css/home.css">
    </head>
    
    <x-app-layout>
    <body>
        <h1>CHUNITHM Score Attack</h1>
        <p>{{ $tournament->name }}</p>
        <p>参加者を8名選択してください</p>
        
        <form action="/matches/start/{{$tournament->id}}" method="GET">
            @csrf
            @foreach($members as $member)
                <input type="checkbox" name="members[]" value="{{ $member->id }}">{{ $member->nickname }}</input></br>
            @endforeach
            <input type="submit" value="決定"/>
        </form>
        
        <a href="#" onclick="history.back()">戻る</a>
    </body>
    </x-app-layout>

</html>