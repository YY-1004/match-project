<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-08">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="/css/home.css">
    </head>

    <body>
        <h1>CHUNITHM Score Attack</h1>
        <p>{{ $tournament->name }}(検索用ID：{{ $tournament->search_id }})</p>
        
        @if($round === 'start')
            <p>メンバーを募集中です</p>
            <p>現在{{ $count }}名が参加申請済みです</p>
            
            @if($count >= 8)
                <a href="/matches/select/{{ $tournament->id }}">参加者を選択し、大会を開始する<a>
            @else
                <a>参加申請が8名以上で大会を開始します</a>
            @endif
            
            <p id=members_list>参加申請済みメンバー</p>
            @foreach($members as $member)
                <a>{{ $member->nickname }}</a><br>
            @endforeach
            
        @elseif( $round === "end" )
            <p>全試合が終了しました</p>
            
        @else
            <p>現在{{ $round }}です</p>
            <p>{{ $round }}のスコアを確定し次に進みますか？</p>
            <button type="button" onclick="location.href='/next/{{ $tournament->id }}'">確定</button>
            
        @endif
        
        <a href="#" onclick="history.back()">戻る</a>
    </body>
</html>