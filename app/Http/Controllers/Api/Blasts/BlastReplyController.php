<?php

namespace App\Http\Controllers\Api\Blasts;

use App\Blasts\BlastType;
use App\Events\Blasts\BlastRepliesWereUpdated;
use App\Http\Controllers\Controller;
use App\Models\Blast;
use App\Models\BlastMedia;
use App\Notifications\Blasts\BlastReplied;
use Illuminate\Http\Request;

class BlastReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function store(Blast $blast, Request $request)
    {
        $reply = $request->user()->blasts()->create(array_merge($request->only('body'), [
            'type' => BlastType::BLAST,
            'parent_id' => $blast->id
        ]));

        //Nu trebuie sa primim notificare atunci cand ne comentam propria postare
       // if ($request->user()->id !== $blast->user_id) {
            $blast->user->notify(new BlastReplied($request->user(), $reply));
      //  }

        foreach ($request->media as $id) {
            $reply->media()->save(BlastMedia::find($id));
        }

        broadcast(new BlastRepliesWereUpdated($blast));
    }
}
