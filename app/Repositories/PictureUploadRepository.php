<?php

namespace App\Repositories;

use Image;

use File;

class PictureUploadRepository
{

    public function base64toImageUploadWithResize($file,$folderPath,$mainHeight = false, $mainWidth = false, $imageName)
    {

        if(!File::exists(public_path($folderPath))) {
            File::makeDirectory(public_path().'/'.$folderPath , 0777 , true, true);
        }

        $data = $file;
        //get the base-64 from data
        $data = str_replace('data:image/png;base64,', '', $data);
        $data = str_replace('data:image/jpeg;base64,', '', $data);
        $data = str_replace('data:image/jpg;base64,', '', $data);
        $data = str_replace('data:image/gif;base64,', '', $data);

        $imgData = explode(',',$data);
        $img = $imgData[0];
        $base64_str = str_replace(' ', '+', $img);

        //decode base64 string
        $image = base64_decode($base64_str);

        //   main file saving
        if ($mainHeight && $mainWidth) {
            Image::make($image)->resize($mainHeight, $mainWidth)->save(public_path($folderPath .'/'. $imageName . '.png'));
        } else {
            Image::make($image)->save(public_path($folderPath.'/'. $imageName.'.png'));
        }

        return [
            'full_name' => $imageName.'.png',
        ];
    }


}