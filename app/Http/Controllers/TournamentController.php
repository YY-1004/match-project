<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\Entry;
use App\Models\Eight_member;
use App\Models\Four_member;
use App\Models\Two_member;

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
    
    public function result(){
        $A = Eight_member::find(1);
        $B = Four_member::find(1);
        $C = Two_member::find(1);
        
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
        
        $tournament = Tournament::find(1);
        
        return view('matches.result')->with(['Ateams' => $Ateams, 'Bteams' => $Bteams, 'Cteams' => $Cteams, 'tournament' => $tournament]);
    }
            
    public function ban()
    {
        return view('matches.ban');
    }
    
    public function entry()
    {
        return view('matches.entry');
    }
    
    public function home()
    {
        return view('matches.home');
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
