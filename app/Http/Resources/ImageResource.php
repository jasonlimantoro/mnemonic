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
                'file_name' => $this->file_name,
                'url_asset' => $this->url_asset,
                'url_cache' => $this->url_cache,
                'featured' => $this->featured,
            ],
            'album' => new AlbumResource($this->whenLoaded('imageable')),
            'links' => [
                'self' => route('api.images.show', ['image' => $this->id])
            ]
        ];
    }
}
