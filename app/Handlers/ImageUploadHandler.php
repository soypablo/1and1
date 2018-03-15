<?php
namespace App\Handlers;

use function date;
use function in_array;
use function public_path;
use function strtolower;
use function time;

class ImageUploadHandler
{
    //只允许以下后缀名的文件上传
    protected $allowed_ext=['png','jpg','gif','jpeg'];

    public function save($file, $folder, $prefix)
    {
        $upload_path=public_path().'/uploads/images/'.$folder.date('Ym',time()).'/'.date('d',time());
        $extension=strtolower($file->getClientOriginalExtension()) ?? 'png';
        $filename=$prefix.'_'.time().'.'.$extension;

        if(!in_array($extension, $this->allowed_ext)){
            return false;
        }

        $file->move($upload_path,$filename);
        return ['path'=>'/uploads/images/'.$folder.date('Ym',time()).'/'.date('d',time()).'/'.$filename];
    }

}