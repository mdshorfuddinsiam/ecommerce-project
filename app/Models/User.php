<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'profile_photo_path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];



    protected static $imageFile;
    protected static $imageName;
    protected static $directory;
    protected static $imageUrl = [];

    protected static function updateImage($request){
        // dd($request->all());

        self::$imageFile = $request->file('profile_photo_path');
        // dd(self::$imageFile);
        if(self::$imageFile){
            self::$imageName = 'user_profile-'.time().'.'.self::$imageFile->getClientOriginalExtension();
            self::$directory = 'upload/user_images/';
            self::$imageFile->move(self::$directory, self::$imageName);
            return self::$directory.self::$imageName;
            // dd(self::$directory.self::$imageName);
        }
        else{
            return '';
        }
    }

    public static function userProfileUpdate($request, $updateData){
        // dd($request->all());
        // dd($updateData);

        if($request->hasfile('profile_photo_path')){
            if(file_exists($updateData->profile_photo_path)){
                unlink($updateData->profile_photo_path);
            }
            self::$imageUrl['profile_photo_path'] = self::updateImage($request);
            // dd(self::$imageUrl);
        }
        else{
            self::$imageUrl['profile_photo_path'] = $updateData->profile_photo_path;
            // dd(self::$imageUrl);
        }

        // dd($request);
        // dd($request->hasfile('profile_photo_path'));
        // dd(self::updateImage($request));
        $updateData->update(array_merge($request->all(), self::$imageUrl));
    }


    public static function userPasswordUpdate($request){
        // dd($request->all());

        $hashedPassword = Auth::user()->password;
        // dd($hashedPassword);
        if(Hash::check($request->oldpassword, $hashedPassword)){
            $user = Auth::user();
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('user.logout');
            // dd(4);
        }
        else{
            $notification = [
                'message'    => 'Current Password not matched!!',
                'alert-type' => 'error',
            ];
            return back()->with($notification);
        }
    }

}
