<?php

namespace App;

use App\Album;
use App\Carousel;
use App\Filters\GalleryFilter;

class Image extends Model
{
    public function album(){
        return $this->belongsTo(Album::class, 'album_id');
    }

    public function carousel(){
        return $this->belongsTo(Carousel::class, 'carousel_id');
    }

    public function isFeatured(){
        return $this->featured;
    }


    public static function handleUpload($request){
        $newImage = $request->file('image');
        $galleryImageName = $request->gallery_image;
        if($newImage){
            // new image
            $newImageName = $newImage->getClientOriginalName();
            $uploadPath = public_path('uploads/' . $newImageName);
            $imgFiltered = \Image::make($newImage);
            $galleryImageName = $newImageName;
        }

        else if ($galleryImageName) {
            // existing images
            $galleryPath = public_path('uploads/' . $galleryImageName);
            $imgFiltered = \Image::make($galleryPath);
            $uploadPath = $galleryPath;
        }
        else {
            // no new or gallery images in the request
            return null;
        }

        // applyFilter GalleryFilter and save it to file system
        $imgFiltered->filter(new GalleryFilter)->save($uploadPath);

        // array
        $imageAttr = [
            'file_name' => $galleryImageName,
            'url_asset' => secure_asset('uploads/' . $galleryImageName),
            'url_cache' => secure_url('/imagecache/gallery/' . $galleryImageName)
        ];

        return $imageAttr;
        
    }

    public static function withAlbum(){
        return static::where('album_id', '<>', 4)->get();
    }

    public static function withoutAlbum(){
        return static::where('album_id', 4)->get();
    }
}
