<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-08">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="/css/home.css">
    </head>

    <x-app-layout>
    <body>
        <p id=setting>大会の設定</p>
        
        <div class='setting'>
            <form action="/create" method="POST">
                @csrf
                
                <label for="match-make">大会名：</label>
                
                <input type="text" name="tournament[name]" id="match-make" maxlength="20" placeholder="20文字以内"/><br>
                @if($errors->has('tournament.name'))
                    <p class="error" style="color:red">※必須項目です</p>
                @endif
            
                <label for="explanation">説明文：</label>
                <textarea type="text" name="tournament[body]" id="explanation" minlength="1" maxlength="100" placeholder="100文字以内"></textarea><br>
                @if($errors->has('tournament.body'))
                    <p class="error" style="color:red">※必須項目です</p>
                @endif
                
                <!--<label for="match-id">大会ID：</label>-->
                <!--<input type="search" id="match-id">-->
                <!--<br>-->
        
                <!--<label for="max-people">-->
                <!--    最大参加人数：<input type="search" id="max-people">人-->
                <!--</label>-->
                <!--<br>-->
        
                <!--<label for="min-people">-->
                <!--    最小参加人数：<input type="search" id="min-people">人-->
                <!--</label>-->
                <!--<br>-->
        
                <!--<label for="match-type">大会形式：-->
                <!--<input type="search" id="match-type">-->
                <!--</label>-->
                <!--<br>-->
        
                <!--<label for="score-type">スコア形式：</label>-->
                <!--<input type="search" id="score-type">-->
                <!--<br>-->
        
                <!--<label for="primary">予選の有無：</label>-->
                <!--    <input type="radio" name="primary">有-->
                <!--    <input type="radio" name="primary">無-->
                
                <label for="password">パスワード：</label>
                <input type="text" name="tournament[password]" id="password" minlength="4" maxlength="20" placeholder="4文字以上20文字以内"/><br>
                @if($errors->has('tournament.password'))
                    <p class="error" style="color:red">※必須項目です</p>
                @endif
                
                <input type="submit" value="作成"/>
            </form>
        </div>
            
        <p><a href="#" onclick="history.back()">戻る</a></p>

    </body>
    </x-app-layout>

</html>