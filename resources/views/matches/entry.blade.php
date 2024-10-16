<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-08">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="/css/home.css">
    </head>

    <x-app-layout>
    <body id=entry>
        <!--<h1>CHUNITHM Score Attack</h1>-->
        <!--<p>運営中の大会</p>-->
        
        <form action="/search" method="GET">
            
            @if(isset($research))
                <div class="search">
                    <label for="match-research"><h3>大会を探す</h3></label>
                    <div class="serach_form">
                        <input type="search" name="search_id" id="match-research" maxlength="6" value="{{ $research }}" placeholder="6文字のIDを入力">
                        <button type="submit">検索</button>
                    </div>
                </div>
            @else
                <div class="search">
                    <label for="match-search"><h3>大会を探す</h3></label>
                    <div class="serach_form">
                        <input type="search" name="search_id" id="match-search" maxlength="6" placeholder="6文字のIDを入力">
                        <button type="submit">検索</button>
                    </div>
                </div>
            @endif
            
            @if(isset($match))
                <p id="serach-result">検索結果</p>
                <table>
                    <tr>
                        <td class="table-heading">大会名</td>
                        @if($recruitment_status=="募集中")
                            <td id="serach-result-title"><a href="/matches/confirmation/{{$tournament_id}}">{{ $match }}</a></td>
                        @else
                            <td id="serach-result-title"><p>{{ $match }}</p></td>
                        <!--<td><a href=/matches/confirmation/{{$tournament_id}} id="serach-result-title">{{ $match }}</a></td>-->
                        @endif
                    </tr>
                    <tr>
                        <td class="table-heading">詳細</td>
                        <td id="serach-result-explanation">{{ $tournament_body }}</td>
                    </tr>
                    <tr>
                        <td class="table-heading">募集状況</td>
                        <td id="status">{{ $recruitment_status }}</td>
                    </tr>
                </table>
                
                @if($recruitment_status=="募集中")
                    <p class="center">大会名をクリックすると参加申請ページに移動します</p>
                @endif
                
            @elseif(isset($error))
                <p id="serach-error">指定したIDの大会は存在しません</p>
            @endif
            
            <!--<p><a href="/">戻る</a></p>-->
        </form>
    </body>
    </x-app-layout>

</html>