<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AlbumResource extends Resource
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
				'description' => $this->description
			],
			'images' => ImageResource::collection($this->whenLoaded('images')),
			'links' => route('albums.show', ['album' => $this->id])
		]; 
    }
}
