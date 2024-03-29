<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlastResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'type' => $this->type,
            'original_blast' => new BlastResource($this->originalBlast),
            'likes_count' => $this->likes->count(),
            'reblasts_count' => $this->reblasts->count(),
            'replies_count' => $this->replies->count(),
            'media' => new MediaCollection($this->media),
            'user' => new UserResource($this->user),
            'created_at' => $this->created_at->timestamp
        ];
    }
}
