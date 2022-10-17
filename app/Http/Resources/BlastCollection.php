<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BlastCollection extends ResourceCollection
{
    public $collects = BlastResource::class;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }

    public function with($request)
    {
        return [
            'meta' => [
                'likes' => $this->likes($request),
                'reblasts' => $this->reblasts($request),
            ]
        ];
    }

    protected function likes($request){
        if(!$user = $request->user()){
            return [];
        }
        return $user
            ->likes()
            ->whereIn('blast_id',
                $this->collection->pluck('id')->merge($this->collection->pluck('original_blast_id'))
            )
            ->pluck('blast_id')
            ->toArray();
    }

    protected function reblasts($request){
        if(!$user = $request->user()){
            return [];
        }
        return $user
            ->reblasts()
            ->whereIn('original_blast_id',
                $this->collection->pluck('id')->merge($this->collection->pluck('original_blast_id'))
            )
            ->pluck('original_blast_id')
            ->toArray();
    }
}
