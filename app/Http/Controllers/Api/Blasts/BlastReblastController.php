<?php

namespace App\Http\Controllers\Api\Blasts;

use App\Blasts\BlastType;
use App\Models\Blast;
use Illuminate\Http\Request;

class BlastReblastController
{
    public function store(Blast $blast,Request $request){
        $reblast = $request->user()->blasts()->create([
            'type' => BlastType::REBLAST,
            'original_blast_id' => $blast->id
        ]);
    }

    public function destroy(Blast $blast,Request $request){
        $blast->reblastedBlast()->where('user_id',$request->user()->id)->delete();
    }
}
