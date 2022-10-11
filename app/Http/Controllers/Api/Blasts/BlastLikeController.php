<?php

namespace App\Http\Controllers\Api\Blasts;

use App\Events\Blasts\BlastLikesWereUpdate;
use App\Http\Controllers\Controller;
use App\Models\Blast;
use Illuminate\Http\Request;

class BlastLikeController extends Controller
{
    public function store(BLast $blast, Request $request)
    {
        //Trebuie sa putem da like o singura data unei postari
        if($request->user()->hasLiked($blast)){
            return response(null,409);
        }
        $request->user()->likes()->create([
            'blast_id' => $blast->id
        ]);

        broadcast(new BlastLikesWereUpdate($request->user(),$blast));
    }

    public function destroy(BLast $blast, Request $request)
    {
        $request->user()->likes->where('blast_id',$blast->id)->first()->delete();
        broadcast(new BlastLikesWereUpdate($request->user(),$blast));
    }
}