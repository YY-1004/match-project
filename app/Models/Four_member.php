<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Four_member extends Model
{
    use HasFactory;
    
    public function tournament()
    {
        return $this->belongsTo(Tounament::class);
    }
    
    public function entry1()
    {
        return $this->belongsTo(Entry::class, 'entry1_id');
    }
    
    public function entry2()
    {
        return $this->belongsTo(Entry::class, 'entry2_id');
    }
    
    public function entry3()
    {
        return $this->belongsTo(Entry::class, 'entry3_id');
    }
    
    public function entry4()
    {
        return $this->belongsTo(Entry::class, 'entry4_id');
    }
}
