<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blast extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function originalBlast(){
        return $this->hasOne(Blast::class,'id','original_blast_id');
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function reblasts(){
        return $this->hasMany(Blast::class,'original_blast_id');
    }

    //Din blastu-ul parinte trebuie sa accesam blastul distribuit
    public function reblastedBlast(){
        return $this->hasOne(Blast::Class,'original_blast_id','id');
    }

    public function media(){
        return $this->hasMany(BlastMedia::class);
    }
}
