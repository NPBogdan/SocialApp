<?php

namespace App\Http\Controllers\Api\Blasts;

use App\Events\Blasts\BlastWasCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blasts\BlastStoreRequest;
use Illuminate\Http\Request;

class BlastController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:sanctum']);
    }

    public function store(BlastStoreRequest $request){
         $blast = $request->user()->blasts()->create($request->only('body'));

         broadcast(new BlastWasCreated($blast));
    }
}
