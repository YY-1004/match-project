<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-08">
        <title>CHUNITHM_Match</title>
        <link rel="stylesheet" href="/css/home.css">
    </head>

    <x-app-layout>
    <body>
        
        <!--<div class='setting'>-->
            <form action="/level" method="GET">
                @csrf
                
                <h2 class="center">課題曲を選択してください</h2>
                
                <div class="level_select">
                    <select onchange="submit(this.form)" size="1" name="level">
                        <!--LEVEL 10～15を一覧表示　選択した難易度を初期値に設定-->
                        @for($i = 10; $i < 16; $i++)
                            @if($i==$level)
                                <option value="{{ $i }}" selected>LEVEL {{ $i }}</option>
                            @else
                                <option value="{{ $i }}">LEVEL {{ $i }}</option>
                            @endif
                            
                            <!--15+は存在しないためループを抜ける処理-->
                            @if($i==15)
                                @break
                            @endif
                            
                            @if($i==$level-0.5)
                                <option value="{{ $i + 0.5 }}" selected>LEVEL {{ $i }}+ </option>
                            @else
                                <option value="{{ $i + 0.5 }}">LEVEL {{ $i }}+ </option>
                            @endif
                        @endfor
                    </select>
                </div>
            </form>
            
            <form action="/const" method="GET">
                <input type="hidden" name="level" value={{ $level }}></input>
                
                <div class="const_range">
                    <h3 class="center">譜面定数</h3>
                    
                    <select onchange="submit(this.form)" size="1" name="const_min">
                        <!--譜面定数を一覧表示　選択した定数を初期値に設定-->
                        @if(isset($const_min))
                            @for($i = 0; $i < 5; $i++)
                                @if($i/10 + $level > $const_max)
                                    @break
                                @endif
                                
                                @if($const_min == $i/10 + $level)
                                    <option value="{{ $i/10 + $level }}" selected>{{ $i/10 + $level }}</option>
                                @else
                                    <option value="{{ $i/10 + $level }}">{{ $i/10 + $level }}</option>
                                @endif
                            @endfor
                            
                        @else
                            @for($i = 0; $i < 5; $i++)
                                <option value="{{ $i/10 + $level }}">{{ $i/10 + $level }}</option>
                            @endfor
                        @endif
                    </select>
                    
                    <a class="normal">～</a>
                    
                    <select onchange="submit(this.form)" size="1" name="const_max">
                        @if(isset($const_max))
                            @for($i = 0; $i < 5; $i++)
                                @if($i/10 + $level < $const_min)
                                    @continue
                                @endif
                                
                                @if($const_max == $i/10 + $level)
                                    <option value="{{ $i/10 + $level }}" selected>{{ $i/10 + $level }}</option>
                                @else
                                    <option value="{{ $i/10 + $level }}">{{ $i/10 + $level }}</option>
                                @endif
                            @endfor
                            
                        @else
                            @for($i = 0; $i < 5; $i++)
                                @if($i==4)
                                    <option value="{{ $i/10 + $level }}" selected>{{ $i/10 + $level }}</option>
                                @else
                                    <option value="{{ $i/10 + $level }}">{{ $i/10 + $level }}</option>
                                @endif
                            @endfor
                        @endif
                    </select>
                        
                </div>
            </form>
                
            <form action="/music" method="GET">
                @csrf
                
                <!--選択した難易度の楽曲を一覧表示-->
                <div class="contents_box" id="music_list">
                    @foreach($music_list as $music)
                        <input type="radio" name="music" value={{ $music["id"] }}>{{ $music["title"] }}</input><br>
                    @endforeach
                </div>
                
                <!--<input type="submit" value="作成"/>-->
            </form>
        </div>
            
        <p><a href="#" onclick="history.back()">戻る</a></p>

    </body>
    </x-app-layout>

</html>