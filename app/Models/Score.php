<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    
    public function entry()
    {
        return $this->belongsTo(Entry::class);
    }
    
    protected $fillable = [
        'entry_id',
        'member',
        'number',
        'exscore',
		'score',
		'justice_critical',
		'justice',
		'attack',
		'miss',
	];
}
