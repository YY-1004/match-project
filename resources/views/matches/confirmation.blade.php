<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-08">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="/css/home.css">
    </head>

    <x-app-layout>
    <body>
        
        <div class="entry_form">
            <p>参加申請フォーム</p>
            <!--<p>大会名：{{ $tournament->name }}</p>-->
            <!--<p>詳細：{{ $tournament->body }}</p>-->
                <table>
                    <tr>
                        <td class="table-heading">大会名</td>
                        <td id="serach-result-title"><a class="normal">{{ $tournament->name }}</a></td>
                    </tr>
                    <tr>
                        <td class="table-heading">詳細</td>
                        <td id="serach-result-explanation">{{ $tournament->body }}</td>
                    </tr>
                </table>
        
            @if(isset($closed))
                <p>募集が終了しています</p>
            @else
                <form action="/entry/confirmation/{{$tournament->id}}" method="POST">
                    @csrf
                    <div class="nickname_form">
                        <label for="nickname">ニックネーム：</label>
                        <input type="text" name="entry[nickname]" id="nickname" maxlength="20" placeholder="20文字以内"/><br>
                    </div>
                    <input type="submit" id="entry_confirmation" value="参加する"/>
                </form>
            @endif
        </div>
        <p><a href="#" onclick="history.back()" class="center">戻る</a></p>
    </body>
    </x-app-layout>

</html>