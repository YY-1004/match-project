<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-08">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="/css/home.css">
    </head>

    <x-app-layout>
        <x-slot name="header">
            {{ $tournament->name }}　(検索用ID：{{ $tournament->search_id }})
        </x-slot>
    <body>
        <!--<p class="center">{{ $tournament->name }}</p>-->
        
        @if($round === 'start')
            <p class="center">メンバーを募集中です</p>
            <p class="center">現在{{ $count }}名が参加申請済みです</p>
            
            @if($count >= 8)
                <a href="/matches/select/{{ $tournament->id }}" class="center">参加者を選択し、大会を開始する</a>
            @else
                <p class="center">参加申請が8名以上で大会を開始できます</p>
            @endif
            
            @if($count != 0)
                <table class="entry_table">
                    <tr>
                        <td id="members_list">参加申請済みメンバー</td>
                    </tr>
                    @foreach($members as $member)
                        <tr>
                            <td id="entries_list">{{ $member->nickname }}</td>
                        </tr>
                    @endforeach
                </table>
                <!--<p id=members_list>参加申請済みメンバー</p>-->
                <!--@foreach($members as $member)-->
                <!--    <a>{{ $member->nickname }}</a><br>-->
                <!--@endforeach-->
            @endif
            
        @elseif( $round === "end" )
            <p class="center">全試合が終了しました</p>
            
        @else
            <p class="center">現在{{ $round }}です</p>
            <p class="center">{{ $round }}のスコアを確定し次に進みますか？</p>
            <button type="button" onclick="location.href='/next/{{ $tournament->id }}'" id="proceed">確定</button>
            
        @endif
        
        <a href="#" onclick="history.back()" class="center">戻る</a>
    </body>
    </x-app-layout>

</html>