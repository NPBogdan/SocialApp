<?php

namespace App\Http\Controllers\Api\Media;

use App\Http\Controllers\Controller;
use App\Http\Requests\Media\MediaStoreRequest;
use App\Http\Resources\BlastMediaCollection;
use App\Media\MediaType;
use App\Models\BlastMedia;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function __construct()
    {
        //Trebuie sa fii autentificat pentru a putea urca continut media
//        $this->middleware(['auth:sanctum']);
    }

    public function store(MediaStoreRequest $request){
        // $request->media este un array plat si in transformam in colectie pentru a putea folosi functia map()
       $result = collect($request->media)->map(function($media) {
           return $this->addMedia($media);
       });
        return new BlastMediaCollection($result);
    }

    public function addMedia($media){
        $blastMedia = BlastMedia::create([]);

        $blastMedia->baseMedia()
            ->associate($blastMedia->addMedia($media)->toMediaCollection())
            ->save();

        return $blastMedia;
    }

}
