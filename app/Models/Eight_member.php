<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eight_member extends Model
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
    
    public function entry5()
    {
        return $this->belongsTo(Entry::class, 'entry5_id');
    }
    
    public function entry6()
    {
        return $this->belongsTo(Entry::class, 'entry6_id');
    }
    
    public function entry7()
    {
        return $this->belongsTo(Entry::class, 'entry7_id');
    }
    
    public function entry8()
    {
        return $this->belongsTo(Entry::class, 'entry8_id');
    }
}
