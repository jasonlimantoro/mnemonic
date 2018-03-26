<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Album;

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
			],
			'album' => new AlbumResource($this->whenLoaded('imageable')) 
		];
	}
	
	public function with($request){
		return [
			'links' => [
				'self' => route('api.images.show', ['image' => $this->id ])
			]
		];
	}
}
