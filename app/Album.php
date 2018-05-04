<?php

namespace App;

use App\Repositories\Albums;
use App\Traits\FiltersSearch;

class Album extends Model
{
    use FiltersSearch;
	public $repo;

	public function __construct(array $attributes = [])
	{
		parent::__construct($attributes);
		$this->repo = new Albums;

	}
	
	public function images(){
		return $this->morphMany(Image::class, 'imageable');
	}

    public function featuredImage(){
        return $this->images->where('featured', 1)->first();
    }

    public function scopeFilterId($query, $filters){
        if (!empty($filters) && $id = $filters['album']){
            $query->find($id);
        }
    }

    public function uncategorizeImages(){
		// assign all the images to uncategorized
		$this->repo->uncategorized()
					->images()
                    ->saveMany($this->images);
        return $this;
    }

    public function addImage($image){
        $this->images()->create($image);
    }

    public function addFeaturedImage(Image $image){
		
		$imgAttr = $image->only(['file_name', 'url_asset', 'url_cache']); 
		$assignedAlbum = $image->album();
		// not assigned to the current album
		if(!is_null($assignedAlbum) && $assignedAlbum != $this)
		{
			$this->images()->save($image);
		}
		$this->removeFeaturedImage()
             ->images()
             ->updateorCreate(
                $imgAttr,
                ['featured' => 1]
			);

		return $this;
    }

    public function hasFeaturedImage(){
        return !is_null($this->featuredImage());
    }

    protected function removeFeaturedImage(){
        if($this->hasFeaturedImage()){
            $this->featuredImage()
                 ->update(['featured' => 0]);
		}
		return $this;
	}
}
