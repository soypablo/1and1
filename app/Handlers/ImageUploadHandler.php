<?php

namespace App\Handlers;

use function date;
use Illuminate\Support\Facades\Storage;
use function in_array;
use Intervention\Image\Facades\Image;
use function public_path;
use function strtolower;
use function time;

class ImageUploadHandler
{
    //只允许以下后缀名的文件上传
    protected $allowed_ext = [
        'png',
        'jpg',
        'gif',
        'jpeg',
    ];

    public function save($file, $folder, $prefix, $max_width = false)
    {

        $path = $folder.'/'.date('Ym/d', time());
        $extension = strtolower($file->getClientOriginalExtension()) ?? 'png';
        $filename = $prefix.'_'.time().'.'.$extension;
        if(!in_array($extension, $this->allowed_ext)){
            return false;
        }
        $upload_path = Storage::disk('public')->putFileAs($path, $file, $filename);
        if($max_width){
            $this->reduceSize('storage/'.$upload_path, $max_width);
        }

        return $upload_path;


    }

    public function reduceSize($file_path, $max_width)
    {
        // 先实例化，传参是文件的磁盘物理路径
        $image = Image::make($file_path);
        // 进行大小调整的操作
        $image->resize($max_width, null, function($constraint) {

            // 设定宽度是 $max_width，高度等比例双方缩放
            $constraint->aspectRatio();

            // 防止裁图时图片尺寸变大
            $constraint->upsize();
        });

        // 对图片修改后进行保存
        $image->save();
    }

}