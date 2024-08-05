<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\Entry;
use App\Models\Eight_member;
use App\Models\Four_member;
use App\Models\Two_member;
use App\Models\Score;
use App\Models\Confirmed_score;

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
        }
        else{
            $Ateams = [];
        }
        
        if(isset($B)){
            for($i = 1; $i < 5; $i++){
                $team = $B -> { "entry".$i }->nickname;
                $entry_id = $B -> { "entry".$i }->id;
                $Bteams[] = $team;
                $Bentries_id[] = $entry_id;
            }
        }
        else{
            $Bteams = [];
        }
        
        if(isset($C)){
            for($i = 1; $i < 3; $i++){
                $team = $C -> { "entry".$i }->nickname;
                $entry_id = $C -> { "entry".$i }->id;
                $Cteams[] = $team;
                $Centries_id[] = $entry_id;
            }
        }
        else{
            $Cteams = [];
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
        
        foreach ($Bentries_id as $Bentry_id){
            $Bscores[] = Score::where('entry_id', $Bentry_id)->where('member', 4)->value("score");
        }
        
        foreach ($Centries_id as $Centry_id){
            $Cscores[] = Score::where('entry_id', $Centry_id)->where('member', 2)->value("score");
        }
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
    
    public function home()
    {
        return view('matches.home');
    }
    
    public function home2()
    {
        $tournament = Tournament::get();
        return view('matches.home')->with(['tournaments' => $tournament]);
    }
    
    public function make()
    {
        return view('matches.make');
    }
    
    public function operation()
    {
        return view('matches.operation');
    }
}
