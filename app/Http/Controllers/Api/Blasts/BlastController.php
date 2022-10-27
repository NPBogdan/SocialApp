<?php

namespace App\Http\Controllers\Api\Blasts;

use App\Blasts\BlastType;
use App\Events\Blasts\BlastWasCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blasts\BlastStoreRequest;
use App\Models\BlastMedia;

class BlastController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:sanctum']);
    }

    public function store(BlastStoreRequest $request){
         $blast = $request->user()->blasts()->create(array_merge($request->only('body'),[
             'type' => BlastType::BLAST
         ]));

         foreach($request->media as $id){
             $blast->media()->save(BlastMedia::find($id));
         }

         broadcast(new BlastWasCreated($blast));
    }
}
