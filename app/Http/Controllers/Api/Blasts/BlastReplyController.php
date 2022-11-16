<?php

namespace App\Http\Controllers\Api\Blasts;

use App\Blasts\BlastType;
use App\Http\Controllers\Controller;
use App\Models\Blast;
use App\Models\BlastMedia;
use Illuminate\Http\Request;

class BlastReplyController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:sanctum']);
    }

    public function store(Blast $blast,Request $request){
        $reply = $request->user()->blasts()->create(array_merge($request->only('body'),[
            'type' => BlastType::BLAST,
            'parent_id' => $blast->id
        ]));

        foreach($request->media as $id){
            $reply->media()->save(BlastMedia::find($id));
        }
    }
}
