<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-08">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="/css/home.css">
    </head>

    <x-app-layout>
        <x-slot name="header">
            {{ $tournament->name }}
        </x-slot>
    <body>
        <form action="/members/confirmation/{{$tournament->id}}" method="POST">
            @csrf
            <!--<p>参加者</p>-->
            <!--@foreach($entries as $entry)-->
            <!--    <a>{{ $entry->nickname }}</a><br>-->
            <!--    <input type="hidden" name="entry_id[]" value={{$entry->id}}></input>-->
            <!--@endforeach-->
            
            <p class="center">メンバーを確定し大会を開始しますか？</p>
            
            <table class="entry_table">
                <tr>
                    <td id="members_list">選択したメンバー</td>
                </tr>
                @foreach($entries as $entry)
                    <tr>
                        <td id="entries_list">{{ $entry->nickname }}</td>
                    </tr>
                    <input type="hidden" name="entry_id[]" value={{$entry->id}}></input>
                @endforeach
            </table>
            
            <input type="submit" value="開始" id="start"></input>
        </form>
        
        <a href="#" onclick="history.back()" class="center">戻る</a>
        
    </body>
    </x-app-layout>

</html>