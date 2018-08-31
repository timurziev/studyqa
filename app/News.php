<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;
use File;

class News extends Model
{
    protected $fillable = ['title', 'text', 'image'];

    /**
     * @param $file
     * @return string
     */
    public static function storeImage($file)
    {
        $image = Image::make($file);
        $path = 'images/';
        $extension = File::extension($file->getClientOriginalName());
        $uniqid = uniqid();
        $filename = $uniqid .'.'. $extension;

        $image->fit(1000, 630);
        $image->save($path . $uniqid . '.' . $extension);

        return $filename;
    }
}
