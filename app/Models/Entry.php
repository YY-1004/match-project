<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;
    
    public function user()   
    {
        return $this->belongsTo(User::class);  
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function scores()   
    {
        return $this->hasMany(Score::class);  
    }
    
    public function eight_member1()
    {
        return $this->belongsTo(Eight_member::class, 'entry1_id');
    }
    
    public function eight_member2()
    {
        return $this->belongsTo(Eight_member::class, 'entry2_id');
    }
    
    public function eight_member3()
    {
        return $this->belongsTo(Eight_member::class, 'entry3_id');
    }
    
    public function eight_member4()
    {
        return $this->belongsTo(Eight_member::class, 'entry4_id');
    }
    
    public function eight_member5()
    {
        return $this->belongsTo(Eight_member::class, 'entry5_id');
    }
    
    public function eight_member6()
    {
        return $this->belongsTo(Eight_member::class, 'entry6_id');
    }
    
    public function eight_member7()
    {
        return $this->belongsTo(Eight_member::class, 'entry7_id');
    }
    
    public function eight_member8()
    {
        return $this->belongsTo(Eight_member::class, 'entry8_id');
    }
    
    public function getEightMember(int $limit_count = 8)
    {
        return $this->orderBy('updated_at', 'ASC')->$limit_count->get();
    }
    
}

