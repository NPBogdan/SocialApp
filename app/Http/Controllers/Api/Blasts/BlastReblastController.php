<?php

namespace App\Http\Controllers\Api\Blasts;

use App\Blasts\BlastType;
use App\Events\Blasts\BlastReblastsWereUpdated;
use App\Events\Blasts\BlastWasCreated;
use App\Events\Blasts\BlastWasDeleted;
use App\Models\Blast;
use Illuminate\Http\Request;

class BlastReblastController
{
    public function store(Blast $blast,Request $request){
        $reblast = $request->user()->blasts()->create([
            'type' => BlastType::REBLAST,
            'original_blast_id' => $blast->id
        ]);

        broadcast(new BlastWasCreated($reblast));
        broadcast(new BlastReblastsWereUpdated($request->user(),$blast));
    }

    public function destroy(Blast $blast,Request $request){
        broadcast(new BlastWasDeleted($blast->reblastedBlast));

        $blast->reblastedBlast()->where('user_id',$request->user()->id)->delete();

        broadcast(new BlastReblastsWereUpdated($request->user(),$blast));
    }
}
