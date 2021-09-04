<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getGravatarAttribute() {

        $imgPath = asset('storage/profile/user.png');

        if (auth()->check()) {

            $email = $this->attributes['email'];
            $valid = $this->validate_gravatar($email);

            if ($valid) {
                $hash = md5(strtolower(trim($email)));
                $imgPath = "http://www.gravatar.com/avatar/$hash";
            }
        }

        return $imgPath;
    }

    function validate_gravatar($email) {
        // Craft a potential url and test its headers
        $hash = md5(strtolower(trim($email)));
    
        $uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
        $headers = @get_headers($uri);
    
        if (!preg_match("|200|", $headers[0])) {
            $has_valid_avatar = false;
        } else {
            $has_valid_avatar = true;
        }
    
        return $has_valid_avatar;
    }

    public function posts() {
        return $this->hasMany('App\Models\Post');
    }
}
