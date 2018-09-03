<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Models\Album;

class ImageResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'url' => $this->url,
            ],
            'featured' => $this->albums()->first()->pivot->featured,
            'albums' => new AlbumCollection($this->whenLoaded('albums')),
            'links' => [
                'self' => route('api.images.show', ['image' => $this->id])
            ]
        ];
    }
}
