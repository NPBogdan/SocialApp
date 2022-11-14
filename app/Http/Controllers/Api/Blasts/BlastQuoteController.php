<?php

namespace App\Http\Controllers\Api\Blasts;

use App\Blasts\BlastType;
use App\Events\Blasts\BlastReblastsWereUpdated;
use App\Events\Blasts\BlastWasCreated;
use App\Http\Controllers\Controller;
use App\Models\Blast;
use Illuminate\Http\Request;

class BlastQuoteController extends Controller
{
    public function store(Blast $blast,Request $request){
        $reblast = $request->user()->blasts()->create([
            'type' => BlastType::CITAT,
            'body' => $request->body,
            'original_blast_id' => $blast->id
        ]);

        broadcast(new BlastWasCreated($reblast));
        broadcast(new BlastReblastsWereUpdated($request->user(),$blast));
    }
}
