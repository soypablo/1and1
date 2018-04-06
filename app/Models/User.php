<?php

namespace App\Models;

use Auth;
use function date;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Image;
use function md5;
use function public_path;
use Spatie\Permission\Traits\HasRoles;
use function starts_with;
use function strlen;
use function strtolower;
use function time;
use function trim;

class User extends Authenticatable
{
    use Notifiable{
        notify as protected laravelNotify;
    }
    use HasRoles;
    public function notify($instance)
    {
        // 如果要通知的人是当前用户，就不必通知了！
        if ($this->id == Auth::id()) {
            return;
        }
        $this->increment('notification_count');
        $this->laravelNotify($instance);
    }

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'introduction',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function gravatar($size = 100)
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }


    public function uploadFile($file, $folder, $prefix, $max_width)
    {
        $path        = 'avatar/'.date('Y', time()).'/'.date('m', time()).'/'.date('d', time());
        $extension   = strtolower($file->getClientOriginalExtension()) ?? 'png';
        $filename    = $prefix.'_'.time().'.'.$extension;
        $upload_path = Storage::disk('public')->putFileAs($path, $file, $filename);
        if($max_width){
            Image::make(public_path().'/storage/'.$path.'/'.$filename)->resize($max_width, null, function($c) {
                $c->aspectRatio();
                $c->upsize();
            })->insert(public_path().'/storage/pig.png')->save();
        }
        return $upload_path;

    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function markAsRead()
    {
        $this->notification_count = 0;
        $this->save();

        $this->unreadNotifications->markAsRead();
    }

    public function setPasswordAttribute($value)
    {
        if(strlen($value) != 60){
            $value= Hash::make($value);
        }
        $this->attributes['password'] = $value;
    }

    public function setAvatarAttribute($value)
    {
        if(! starts_with($value, 'avatar/')){
            $value = 'avatar/'.$value;
        }
        $this->attributes['avatar'] = $value;
    }
}
