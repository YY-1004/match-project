<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;
    
    public function entries()   
    {
        return $this->hasMany(Entry::class);  
    }
    
    public function eight_member()   
    {
        return $this->belongsTo(Eight_member::class);  
    }
    
    public function four_member()   
    {
        return $this->belongsTo(Four_member::class);  
    }
    
    public function two_member()
    {
        return $this->belongsTo(Two_member::class);
    }
}
