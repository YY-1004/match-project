<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Tournament;
use App\Models\Entry;
use App\Models\Eight_member;
use App\Models\Four_member;
use App\Models\Two_member;
use App\Models\Score;
use App\Models\Confirmed_score;
use App\Http\Requests\CreateRequest;

class TournamentController extends Controller
{
    public function tournament($tournament_id)
    {
        $quarterfinals = Eight_member::where("tournament_id", $tournament_id)->first();
        $semifinals = Four_member::where("tournament_id", $tournament_id)->first();
        $finals = Two_member::where("tournament_id", $tournament_id)->first();
        $teams = [];
        
        // 準々決勝のメンバーを送信
        for($i = 1; $i < 9; $i++){
            $team = $quarterfinals -> { "entry".$i }->nickname;
            $teams[] = $team;
        }
        // 準決勝のメンバーを送信
        if(isset($semifinals)){
            for($i = 1; $i < 5; $i++){
                $team = $semifinals -> { "entry".$i }->nickname;
                $teams[] = $team;
            }
        }
        // 決勝のメンバーを送信
        if(isset($finals)){
            for($i = 1; $i < 3; $i++){
                $team = $finals -> { "entry".$i }->nickname;
                $teams[] = $team;
            }
        }
        
        $D = Tournament::find($tournament_id);
        
        // 優勝者を送信
        if(isset($D)){
            $champion = $D -> champion;
            $tournament = $D;
        }
        else{
            $champion = ' ';
            $tournament = Tournament::find(1);
        }
        
        return view('matches.tournament3')->with(['teams' => $teams, 'tournament' => $tournament, 'champion' => $champion]);
    }

    public function result($tournament_id){
        $quarterfinals = Eight_member::where("tournament_id", $tournament_id)->first();
        $semifinals = Four_member::where("tournament_id", $tournament_id)->first();
        $finals = Two_member::where("tournament_id", $tournament_id)->first();
        
        // 準々決勝の結果を送信
        if(isset($quarterfinals)){
            for($i = 1; $i < 9; $i++){
                // $team = $quarterfinals -> { "entry".$i }->nickname;
                // $entry_id = $quarterfinals -> { "entry".$i }->id;
                // $Ateams[] = $team;
                // $Aentries_id[] = $entry_id;
                $Ateams[] = $quarterfinals -> { "entry".$i };
            }
            foreach ($Ateams as $Ateam){
                $Ascores[] = Score::where('entry_id', $Ateam["id"])->where('member', 8)->value("score");
            }
        }
        else{
            $Ateams = [];
            $Ascores = [];
        }
        
        // 準決勝の結果を送信
        if(isset($semifinals)){
            for($i = 1; $i < 5; $i++){
                // $team = $semifinals -> { "entry".$i }->nickname;
                // $entry_id = $semifinals -> { "entry".$i }->id;
                // $Bteams[] = $team;
                // $Bentries_id[] = $entry_id;
                $Bteams[] = $semifinals -> { "entry".$i };
            }
            
            foreach ($Bteams as $Bteam){
                $Bscores[] = Score::where('entry_id', $Bteam["id"])->where('member', 4)->value("score");
            }
        }
        else{
            $Bteams = [];
            $Bscores = [];
        }
        
        // 決勝の結果を送信
        if(isset($finals)){
            for($i = 1; $i < 3; $i++){
                // $team = $finals -> { "entry".$i }->nickname;
                // $entry_id = $finals -> { "entry".$i }->id;
                // $Cteams[] = $team;
                // $Centries_id[] = $entry_id;
                $Cteams[] = $finals -> { "entry".$i };
            }
            
            foreach ($Cteams as $Cteam){
                $Cscores[] = Score::where('entry_id', $Cteam["id"])->where('member', 2)->value("score");
            }
        }
        else{
            $Cteams = [];
            $Cscores = [];
        }
        
        $tournament_tentative = Tournament::find($tournament_id);
        if(isset($tournament_tentative)){
            $tournament = $tournament_tentative;
        }
        else{
            $tournament = Tournament::find(1);
        }
        
        return view('matches.result')->with(['Ateams' => $Ateams, 'Bteams' => $Bteams, 'Cteams' => $Cteams, 'tournament' => $tournament, 'Ascores' => $Ascores, 'Bscores' => $Bscores, 'Cscores' => $Cscores]);
    }
            
    public function ban()
    {
        return view('matches.ban');
    }
    
    public function ban2($tournament_id)
    {
        $A = Tournament::find($tournament_id);
        if(isset($A)){
            $tournament = $A;
        }
        else{
            $tournament = Tournament::find(1);
        }

        return view('matches.ban2')->with(['tournament' => $tournament]);
    }
    
    public function entry()
    {
        return view('matches.entry');
    }
    
    public function search(Request $request, Tournament $tournament)
    {
        $search_id = $request->input('search_id');
        $match = Tournament::where("search_id", $search_id)->first();
        
        // 大会IDがヒットした場合は大会データを送信、ヒットしない場合はエラーを送信
        if(isset($match)){
            $match_name = $match->name;
            $tournament_body = $match->body;
            $tournament_id = $match->id;
            return view('matches.entry')->with(['match' => $match_name,'tournament_body' => $tournament_body, 'tournament_id' => $tournament_id, 'research' => $search_id]);
        }
        else{
            $error = "error";
            return view('matches.entry')->with(['error' => $error, 'research' => $search_id]);
        }
    }
    
    public function confirmation(Tournament $tournament)
    {
        $A = Eight_member::where("tournament_id", $tournament['id'])->first();
        if(isset($A)){
            $closed = "closed";
            
            return view('matches.confirmation')->with(['tournament' => $tournament, "closed" => $closed]);
        }
        else {
            return view('matches.confirmation')->with(['tournament' => $tournament]);
        }
    }

    public function home(Tournament $tournament, Entry $entry)
    {
        $applied = Entry::where("user_id", Auth::user()->id)->exists();
        
        // ログインしたユーザーが参加している大会データを送信、参加していない場合はNULLを送信
        if($applied){
            $users = Entry::where("user_id", Auth::user()->id)->get();
            foreach($users as $user){
                $tournament_entried[] = Tournament::find($user->tournament_id);
            }
        }else{
            $tournament_entried = NULL;
        }
        
        return view('matches.home')->with(['tournaments' => $tournament_entried]);
    }
    
    public function entryConfirmation(Request $request, Tournament $tournament, Entry $entry)
    {
        $input = $request['entry'];
        $entry->tournament_id = $tournament->id;
        $entry->nickname = $input["nickname"];
        $entry->save();
        return redirect('/');
    }
    
    public function register(Tournament $tournament)
    {
        $A = Eight_member::where("tournament_id", $tournament->id)->first();
        $B = Four_member::where("tournament_id", $tournament->id)->first();
        $C = Two_member::where("tournament_id", $tournament->id)->first();
        
        // 現在の大会状況を送信
        if(isset($tournament->champion)){
            $round = 'end';
        }
        elseif(isset($C)){
            $round = "決勝戦";
        }
        elseif(isset($B)){
            $round = "準決勝";
        }
        elseif(isset($A)){
            $round = "準々決勝";
        }
        else{
            $round = "start";
        }
        
        // 準々決勝のデータを送信
        if(isset($A)){
            for($i = 1; $i < 9; $i++){
                $team = $A -> { "entry".$i }->nickname;
                $entry_id = $A -> { "entry".$i }->id;
                $scores = Score::where("entry_id", $entry_id)->where("member", 8)->first();
                $Ateams[] = $team;
                $Aentries_id[] = $entry_id;
                $Ascores_id[] = $scores->id;
            }
        }
        else{
            $Ateams = [];
            $Aentries_id = [];
            $Ascores_id = [];
        }
    
        // 準決勝のデータを送信
        if(isset($B)){
            for($i = 1; $i < 5; $i++){
                $team = $B -> { "entry".$i }->nickname;
                $entry_id = $B -> { "entry".$i }->id;
                $scores = Score::where("entry_id", $entry_id)->where("member", 4)->first();
                $Bteams[] = $team;
                $Bentries_id[] = $entry_id;
                $Bscores_id[] = $scores->id;
            }
        }
        else{
            $Bteams = [];
            $Bentries_id = [];
            $Bscores_id = [];
        }
        
        // 決勝のデータを送信
        if(isset($C)){
            for($i = 1; $i < 3; $i++){
                $team = $C -> { "entry".$i }->nickname;
                $entry_id = $C -> { "entry".$i }->id;
                $scores = Score::where("entry_id", $entry_id)->where("member", 2)->first();
                $Cteams[] = $team;
                $Centries_id[] = $entry_id;
                $Cscores_id[] = $scores->id;
            }
        }
        else{
            $Cteams = [];
            $Centries_id = [];
            $Cscores_id = [];
        }
        
        return view('matches.register')->with(['tournament' => $tournament, 'round' => $round, 'Ateams' => $Ateams, 'Aentries_id' => $Aentries_id, 'Ascores_id' =>$Ascores_id, 'Bteams' => $Bteams, 'Bentries_id' => $Bentries_id, 'Bscores_id' =>$Bscores_id, 'Cteams' => $Cteams, 'Centries_id' => $Centries_id, 'Cscores_id' =>$Cscores_id,]);
    }
    
    public function update(Request $request, Score $score)
    {
        $input_score = $request['score'];
        $score = Score::find($input_score['id']);
        $score->entry_id = Score::where('id', $input_score['id'])->first()->entry_id;
        $score->member = Score::where('id', $input_score['id'])->first()->member;
        $score->number = 1;
        $score->score = $input_score["score"];
        $score->exscore = $input_score["justice"] + $input_score["attack"] * 3 + $input_score["miss"] * 3;
        $score->justice_critical = $input_score["justice_critical"];
        $score->justice = $input_score["justice"];
        $score->attack = $input_score["attack"];
        $score->miss = $input_score["miss"];
        $score->save();
        
        return redirect('/');
    }
    
    public function judge(Tournament $tournament)
    {
        $A = Eight_member::where("tournament_id", $tournament->id)->first();
        $B = Four_member::where("tournament_id", $tournament->id)->first();
        $C = Two_member::where("tournament_id", $tournament->id)->first();
        $members = Entry::where('tournament_id', $tournament->id)->get();
        $count = count($members);
        
        // 現在の大会状況を送信
        if(isset($tournament->champion)){
            $round = 'end';
        }
        elseif(isset($C)){
            $round = "決勝戦";
        }
        elseif(isset($B)){
            $round = "準決勝";
        }
        elseif(isset($A)){
            $round = "準々決勝";
        }
        else{
            $round = "start";
        }
        
        return view('matches.judge')->with(['tournament' => $tournament, 'members' => $members, 'count' => $count, 'round' => $round]);
    }
    
    public function nextMatch(Tournament $tournament, Score $score, Four_member $four_member, Two_member $two_member)
    {
        $A = Eight_member::where("tournament_id", $tournament->id)->first();
        $B = Four_member::where("tournament_id", $tournament->id)->first();
        $C = Two_member::where("tournament_id", $tournament->id)->first();
        
        // 勝敗を決定し、次の試合のデータを送信
        if(isset($C)){
            for($i = 1; $i < 3; $i++){
                $entries_id[] = $C -> { "entry".$i } -> id;
            }
            
            foreach($entries_id as $entry_id){
                $scores[] = Score::where('entry_id', $entry_id)->where('member', 2)->value("score");
            }
            
            if ($scores[0] >= $scores[1]){
                    $champion_id = $entries_id[0];
            }
            else{
                    $champion_id = $entries_id[1];
            }
            
            $champion = Entry::find($champion_id);
            $tournament->champion = $champion->nickname;
            $tournament->save();
            
        }
        elseif(isset($B)){
            for($i = 1; $i < 5; $i++){
                $entries_id[] = $B -> { "entry".$i } -> id;
            }
            
            foreach($entries_id as $entry_id){
                $scores[] = Score::where('entry_id', $entry_id)->where('member', 4)->value("score");
            }
            
            for($i = 1; $i < 3; $i++){
                if ($scores[$i * 2 - 2] >= $scores[$i * 2 - 1]){
                    $Centry[] = $entries_id[$i * 2 - 2];
                }
                else{
                    $Centry[] = $entries_id[$i * 2 - 1];
                }
                
                $score->create([
                    'entry_id' => $Centry[$i - 1],
                    'member' => 2,
                    'number' => 1,
                    'score' => 0,
                    'exscore' => 10000,
                    'justice_critical' => 0,
                    'justice' => 1,
                    'attack' => 0,
                    'miss' => 3333,
                    ]);
            }
            
            $two_member->tournament_id = $tournament->id;
            $two_member->entry1_id = $Centry[0];
            $two_member->entry2_id = $Centry[1];
            $two_member->save();
            
        }
        else{
            for($i = 1; $i < 9; $i++){
                $entries_id[] = $A -> { "entry".$i } -> id;
            }
            
            foreach($entries_id as $entry_id){
                $scores[] = Score::where('entry_id', $entry_id)->where('member', 8)->value("score");
            }

            for($i = 1; $i < 5; $i++){
                if ($scores[$i * 2 - 2] >= $scores[$i * 2 - 1]){
                    $Bentry[] = $entries_id[$i * 2 - 2];
                }
                else{
                    $Bentry[] = $entries_id[$i * 2 - 1];
                }
                
                $score->create([
                    'entry_id' => $Bentry[$i - 1],
                    'member' => 4,
                    'number' => 1,
                    'score' => 0,
                    'exscore' => 10000,
                    'justice_critical' => 0,
                    'justice' => 1,
                    'attack' => 0,
                    'miss' => 3333,
                    ]);
            }

            $four_member->tournament_id = $tournament->id;
            $four_member->entry1_id = $Bentry[0];
            $four_member->entry2_id = $Bentry[1];
            $four_member->entry3_id = $Bentry[2];
            $four_member->entry4_id = $Bentry[3];
            $four_member->save();
        }
        
        return redirect('/');
    }
    
    public function make()
    {
        return view('matches.make');
    }
    
    public function create(CreateRequest $request, Tournament $tournament)
    {
        $input = $request['tournament'];
        $tournament->search_id = Str::random(6);
        $tournament->password = Hash::make($input["password"]);
        $tournament->name = $input["name"];
        $tournament->body = $input["body"];
        $tournament->champion = NULL;
        $tournament->justice_point = 1;
        $tournament->attack_point = 3;
        $tournament->miss_point = 3;
        $tournament->save();
        return redirect('/matches/operation');
    }
    
    public function operation(){
        $tournament = Tournament::get();
        return view('matches.operation')->with(['tournaments' => $tournament]);
    }
    
    public function select(Tournament $tournament){
        $members = Entry::where('tournament_id', $tournament->id)->get();
        return view('matches.select')->with(['tournament' => $tournament, 'members' => $members]);
    }
    
    public function start(Request $request, Tournament $tournament){
        $members = $request['members'];
        foreach($members as $member){
            $entries[] = Entry::find($member);
        }
        
        return view('matches.start')->with(['tournament' => $tournament, 'entries' => $entries]);
    }
    
    public function membersConfirmation(Request $request, Tournament $tournament, Score $score, Eight_member $eight_member){
        $input = $request["entry_id"];
        
        for($i = 1; $i < 9; $i++){
            $score->create([
                'entry_id' => $input[$i - 1],
                'member' => 8,
                'number' => 1,
                'score' => 0,
                'exscore' => 10000,
                'justice_critical' => 0,
                'justice' => 1,
                'attack' => 0,
                'miss' => 3333,
            ]);
        }
        
        $eight_member->tournament_id = $tournament->id;
        $eight_member->entry1_id = $input[0];
        $eight_member->entry2_id = $input[1];
        $eight_member->entry3_id = $input[2];
        $eight_member->entry4_id = $input[3];
        $eight_member->entry5_id = $input[4];
        $eight_member->entry6_id = $input[5];
        $eight_member->entry7_id = $input[6];
        $eight_member->entry8_id = $input[7];
        $eight_member->save();
        
        return redirect('/matches/operation');
    }
    
    public function profile(){
        $tournament = Tournament::get();
        return view('matches.profile');
    }
    
    public function music(){
                // クライアントインスタンス生成
        $client = new \GuzzleHttp\Client();

        // GET通信するURL
        $url = 'https://api.chunirec.net/2.0/music/showall.json';
        // $url = 'https://api.chunirec.net/2.0/music/search.json?q=The wheel to the right&region=jp2&token=875059118a4bb982f1ae9c6b04c54ccd853a1cc59dce716eb73838136e7a5df9fc094a154d8e9c6cc0d7f021140908c7a21e5e5d1c68b7e9f57dc99412dc4880';

        // リクエスト送信と返却データの取得
        // Bearerトークンにアクセストークンを指定して認証を行う
        $response = $client->request(
            'GET',
            $url,
            ['query' => ['region' => "jp2", 'token' => config('services.chunirec.token'),]
            ]
        );
        // dd($response);
        
        // API通信で取得したデータはjson形式なので
        // PHPファイルに対応した連想配列にデコードする
        $questions = json_decode($response->getBody(), true);
        
        $level = 10;
        $data = array_column($questions, 'data');
        $mas = array_column($data, 'MAS');
        $results = array_keys(array_column($mas, 'level'), $level);
        $meta = array_column($questions, 'meta');
        
        foreach($results as $result){
            // $music[] = array_column($meta[$result], 'title');
            $music_list[] = $meta[$result];
        }
        // dd($music_list);
        
        return view('matches.music')->with(['music_list' => $music_list, 'level' => $level]);
    }
    
    public function selectLevel(Request $request){
        $level = $request["level"];
        
                // クライアントインスタンス生成
        $client = new \GuzzleHttp\Client();

        // GET通信するURL
        $url = 'https://api.chunirec.net/2.0/music/showall.json';
        // $url = 'https://api.chunirec.net/2.0/music/search.json?q=The wheel to the right&region=jp2&token=875059118a4bb982f1ae9c6b04c54ccd853a1cc59dce716eb73838136e7a5df9fc094a154d8e9c6cc0d7f021140908c7a21e5e5d1c68b7e9f57dc99412dc4880';

        // リクエスト送信と返却データの取得
        // Bearerトークンにアクセストークンを指定して認証を行う
        $response = $client->request(
            'GET',
            $url,
            ['query' => ['region' => "jp2", 'token' => config('services.chunirec.token'),]
            ]
        );
        // dd($response);
        
        // API通信で取得したデータはjson形式なので
        // PHPファイルに対応した連想配列にデコードする
        $questions = json_decode($response->getBody(), true);
        
        $data = array_column($questions, 'data');
        $mas = array_column($data, 'MAS');
        $results = array_keys(array_column($mas, 'level'), $level);
        $meta = array_column($questions, 'meta');
        
        foreach($results as $result){
            // $music[] = array_column($meta[$result], 'title');
            $music_list[] = $meta[$result];
        }

        return view('matches.music')->with(['music_list' => $music_list, 'level' => $level]);
    }
    
    public function constRange(Request $request){
        $level = $request["level"];
        $const_min = $request["const_min"];
        $const_max = $request["const_max"];
        
        // dump($level);
        // dump($const_min);
        // dd($const_max);
        
                // クライアントインスタンス生成
        $client = new \GuzzleHttp\Client();

        // GET通信するURL
        $url = 'https://api.chunirec.net/2.0/music/showall.json';
        // $url = 'https://api.chunirec.net/2.0/music/search.json?q=The wheel to the right&region=jp2&token=875059118a4bb982f1ae9c6b04c54ccd853a1cc59dce716eb73838136e7a5df9fc094a154d8e9c6cc0d7f021140908c7a21e5e5d1c68b7e9f57dc99412dc4880';

        // リクエスト送信と返却データの取得
        // Bearerトークンにアクセストークンを指定して認証を行う
        $response = $client->request(
            'GET',
            $url,
            ['query' => ['region' => "jp2", 'token' => config('services.chunirec.token'),]
            ]
        );
        
        // API通信で取得したデータはjson形式なので
        // PHPファイルに対応した連想配列にデコードする
        $questions = json_decode($response->getBody(), true);
        
        $data = array_column($questions, 'data');
        $mas = array_column($data, 'MAS');
        $results = array_keys(array_column($mas, 'level'), $level);
        $meta = array_column($questions, 'meta');
        
        foreach($results as $result){
            $music_tbd = $mas[$result];
            if($const_min <= $music_tbd["const"] && $music_tbd["const"] <= $const_max){
                $music_list[] = $meta[$result];
            }
        }
        
        // dd($music_list);
        return view('matches.music')->with(['music_list' => $music_list, 'level' => $level, 'const_min' => $const_min, 'const_max' => $const_max]);
    }
    
    public function searchMusic(){
                // クライアントインスタンス生成
        $client = new \GuzzleHttp\Client();

        // GET通信するURL
        $url = 'https://api.chunirec.net/2.0/music/showall.json';
        // $url = 'https://api.chunirec.net/2.0/music/search.json?q=The wheel to the right&region=jp2&token=875059118a4bb982f1ae9c6b04c54ccd853a1cc59dce716eb73838136e7a5df9fc094a154d8e9c6cc0d7f021140908c7a21e5e5d1c68b7e9f57dc99412dc4880';

        // リクエスト送信と返却データの取得
        // Bearerトークンにアクセストークンを指定して認証を行う
        $response = $client->request(
            'GET',
            $url,
            ['query' => ['region' => "jp2", 'token' => config('services.chunirec.token'),]
            ]
        );
        // dd($response);
        
        // API通信で取得したデータはjson形式なので
        // PHPファイルに対応した連想配列にデコードする
        $questions = json_decode($response->getBody(), true);
        
        $data = array_column($questions, 'data');
        $mas = array_column($data, 'MAS');
        $results = array_keys(array_column($mas, 'level'), $level);
        $meta = array_column($questions, 'meta');
        
        foreach($results as $result){
            // $music[] = array_column($meta[$result], 'title');
            $music_list[] = $meta[$result];
        }
        
        return view('matches.music')->with(['music_list' => $music_list]);
    }
}
