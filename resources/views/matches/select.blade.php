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
        <p class="center">参加者を8名選択してください</p>
        
        <form action="/matches/start/{{$tournament->id}}" method="GET" class="select_members">
            @csrf
            @foreach($members as $member)
                <input type="checkbox" name="members[]" value="{{ $member->id }}" onchange="change()"> {{ $member->nickname }}</input></br>
            @endforeach
            <input type="submit" id="select_confirmed" value="決定" disabled/>
        </form>
        
        <a href="#" onclick="history.back()" class="center">戻る</a>
        
        <script>
            function change() {
        	    const submitBtn = document.getElementById('select_confirmed');
        	    const checkboxes = document.querySelectorAll('input[name="members[]"]:checked');
        	    if (checkboxes.length === 8) {
        		    submitBtn.disabled = false;
        	    } else {
        		    submitBtn.disabled = true;
    	        }
            }
        </script>

    </body>
    </x-app-layout>
    
</html>