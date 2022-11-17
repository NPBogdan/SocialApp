<?php

namespace App\Http\Controllers\Api\Blasts;

use Illuminate\Http\Request;
use App\Events\Blasts\BlastWasCreated;
use App\Blasts\BlastType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blasts\BlastStoreRequest;
use App\Http\Resources\BlastCollection;
use App\Models\BlastMedia;
use App\Models\Blast;


class BlastController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:sanctum'])->only(['store']);
    }

    public function index(Request $request){
        return new BlastCollection(Blast::find(explode(",",$request->ids)));
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
