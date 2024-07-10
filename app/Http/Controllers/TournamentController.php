<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class TournamentController extends Controller
{
    public function tournament(){
        
            $team_1 = "チームA";
            $team_2 = "チームB";
            $team_3 = "チームC";
            $team_4 = "チームD";
            $team_5 = "チームE";
            $team_6 = "チームF";
            $team_7 = "チームG";
            $team_8 = "チームH";
            $team_9 = "チームI";
            $team_10 = "チームJ";
            $team_11 = "チームK";
            $team_12 = "チームL";
            $team_13 = "チームM";
            $team_14 = "チームN";
            $team_15 = "チームO";
        
        return view('matches.tournament')->with([
            'team_1' => $team_1,
            'team_2' => $team_2,
            'team_3' => $team_3,
            'team_4' => $team_4,
            'team_5' => $team_5,
            'team_6' => $team_6,
            'team_7' => $team_7,
            'team_8' => $team_8,
            'team_9' => $team_9,
            'team_10' => $team_10,
            'team_11' => $team_11,
            'team_12' => $team_12,
            'team_13' => $team_13,
            'team_14' => $team_14,
            'team_15' => $team_15
            ]);
    }
}
