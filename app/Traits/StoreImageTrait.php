<?php

namespace App\Traits;

use Image;

trait StoreImageTrait
{
    public function uploadImage($image,$imagePath)
    {
        $name = time() . '.' . $image->getClientOriginalName();
        Image::make($image)->resize(320, 240)->save(public_path($imagePath) . $name);
        return $name;
    }

    public function deleteImage($name,$imagePath)
    {
        if (file_exists($imagePath . $name) && $name != 'default.jpg') {
            unlink($imagePath . $name);
        }
    }

    public function updateImage($image, $currentName, $imagePath)
    {
        if ($image->hasFile('image')) {
            $images = $image->file('image');
            $this->deleteImage($currentName,$imagePath);
            $name = $this->uploadImage($images,$imagePath);
            return $name;
        } else {
            return $currentName;
        }
    }
}


