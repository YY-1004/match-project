<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
    public function tournament()
    {
        $A = Eight_member::find(1);
        $B = Four_member::find(1);
        $C = Two_member::find(1);
        $teams = [];
        
        if(isset($A)){
           for($i = 1; $i < 9; $i++){
                $team = $A -> { "entry".$i }->nickname;
                $teams[] = $team;
            }
        }
        
        if(isset($B)){
            for($i = 1; $i < 5; $i++){
                $team = $B -> { "entry".$i }->nickname;
                $teams[] = $team;
            }
        }
        
        if(isset($C)){
            for($i = 1; $i < 3; $i++){
                $team = $C -> { "entry".$i }->nickname;
                $teams[] = $team;
            }
        }
        
        $D = Tournament::find(1);
        
        if(isset($D)){
            $champion = $D -> champion;
        }
        else{
            $champion = ' ';
        }
        
        $tournament = Tournament::find(1);
        return view('matches.tournament3')->with(['teams' => $teams, 'tournament' => $tournament, 'champion' => $champion]);
    }
    
    public function tournament2($tournament_id)
    {
        $A = Eight_member::where("tournament_id", $tournament_id)->first();
        $B = Four_member::where("tournament_id", $tournament_id)->first();
        $C = Two_member::where("tournament_id", $tournament_id)->first();
        $teams = [];
        
        if(isset($A)){
           for($i = 1; $i < 9; $i++){
                $team = $A -> { "entry".$i }->nickname;
                $teams[] = $team;
            }
        }
        
        if(isset($B)){
            for($i = 1; $i < 5; $i++){
                $team = $B -> { "entry".$i }->nickname;
                $teams[] = $team;
            }
        }
        
        if(isset($C)){
            for($i = 1; $i < 3; $i++){
                $team = $C -> { "entry".$i }->nickname;
                $teams[] = $team;
            }
        }
        
        $D = Tournament::find($tournament_id);
        
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
    
    public function result(){
        $A = Eight_member::where("tournament_id", 1)->first();
        $B = Four_member::where("tournament_id", 1)->first();
        $C = Two_member::where("tournament_id", 1)->first();
        
        if(isset($A)){
            for($i = 1; $i < 9; $i++){
                $team = $A -> { "entry".$i }->nickname;
                $Ateams[] = $team;
            }
        }
        else{
            $Ateams = [];
        }
        
        if(isset($B)){
            for($i = 1; $i < 5; $i++){
                $team = $B -> { "entry".$i }->nickname;
                $Bteams[] = $team;
            }
        }
        else{
            $Bteams = [];
        }
        
        if(isset($C)){
            for($i = 1; $i < 3; $i++){
                $team = $C -> { "entry".$i }->nickname;
                $Cteams[] = $team;
            }
        }
        else{
            $Cteams = [];
        }
        
        $D = Tournament::find(1);
        if(isset($D)){
            $tournament = $D;
        }
        else{
            $tournament = ' ';
        }
        
        return view('matches.result')->with(['Ateams' => $Ateams, 'Bteams' => $Bteams, 'Cteams' => $Cteams, 'tournament' => $tournament]);
    }
    
    public function result2($tournament_id){
        $A = Eight_member::where("tournament_id", $tournament_id)->first();
        $B = Four_member::where("tournament_id", $tournament_id)->first();
        $C = Two_member::where("tournament_id", $tournament_id)->first();
        
        if(isset($A)){
            for($i = 1; $i < 9; $i++){
                $team = $A -> { "entry".$i }->nickname;
                $entry_id = $A -> { "entry".$i }->id;
                $Ateams[] = $team;
                $Aentries_id[] = $entry_id;
            }
            foreach ($Aentries_id as $Aentry_id){
                $Ascores[] = Score::where('entry_id', $Aentry_id)->where('member', 8)->value("score");
            }
        }
        else{
            $Ateams = [];
            $Ascores = [];
        }
        
        if(isset($B)){
            for($i = 1; $i < 5; $i++){
                $team = $B -> { "entry".$i }->nickname;
                $entry_id = $B -> { "entry".$i }->id;
                $Bteams[] = $team;
                $Bentries_id[] = $entry_id;
            }
            
            foreach ($Bentries_id as $Bentry_id){
                $Bscores[] = Score::where('entry_id', $Bentry_id)->where('member', 4)->value("score");
            }
        }
        else{
            $Bteams = [];
            $Bscores = [];
        }
        
        if(isset($C)){
            for($i = 1; $i < 3; $i++){
                $team = $C -> { "entry".$i }->nickname;
                $entry_id = $C -> { "entry".$i }->id;
                $Cteams[] = $team;
                $Centries_id[] = $entry_id;
            }
            
            foreach ($Centries_id as $Centry_id){
                $Cscores[] = Score::where('entry_id', $Centry_id)->where('member', 2)->value("score");
            }
        }
        else{
            $Cteams = [];
            $Cscores = [];
        }
        
        $D = Tournament::find($tournament_id);
        if(isset($D)){
            $tournament = $D;
        }
        else{
            $tournament = Tournament::find(1);
        }
        
        foreach ($Aentries_id as $Aentry_id){
            $Ascores[] = Score::where('entry_id', $Aentry_id)->where('member', 8)->value("score");
        }
    
        // foreach ($Bentries_id as $Bentry_id){
        //     $Bscores[] = Score::where('entry_id', $Bentry_id)->where('member', 4)->value("score");
        // }
        
        // foreach ($Centries_id as $Centry_id){
        //     $Cscores[] = Score::where('entry_id', $Centry_id)->where('member', 2)->value("score");
        // }
        //dd($Cscores);

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
        return view('matches.confirmation')->with(['tournament' => $tournament]);
    }
    
    public function home()
    {
        return view('matches.home');
    }
    
    public function home2()
    {
        $tournament = Tournament::get();
        return view('matches.home')->with(['tournaments' => $tournament]);
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
}
