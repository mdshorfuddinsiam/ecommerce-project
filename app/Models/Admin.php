<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Auth;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
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
    protected $guarded = [];

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
            self::$imageName = 'admin_profile-'.time().'.'.self::$imageFile->getClientOriginalExtension();
            self::$directory = 'upload/admin_images/';
            self::$imageFile->move(self::$directory, self::$imageName);
            return self::$directory.self::$imageName;
            // dd(self::$directory.self::$imageName);
        }
        else{
            return '';
        }
    }

    public static function adminProfileUpdate($request, $updateData){
        // dd($request->all());
        // dd($updateData);

        if($request->hasfile('profile_photo_path')){
            if(file_exists($updateData->profile_photo_path)){
                unlink($updateData->profile_photo_path);
            }
            self::$imageUrl['profile_photo_path'] = self::updateImage($request);
        }
        else{
            self::$imageUrl['profile_photo_path'] = $updateData->profile_photo_path;
            // dd($updateData->profile_photo_path);
        }

        // dd($request);
        // dd($request->hasfile('profile_photo_path'));
        // dd(self::updateImage($request));
        $updateData->update(array_merge($request->all(), self::$imageUrl));
    }


    public static function updateChangePassword($request){
        // dd($request->all());

        // $hashedPassword = auth()->guard('admin')->user();
        // dd($hashedPassword->password);
        $admin = auth()->guard('admin')->user();
        $hashedPassword = $admin->password;
        // dd($hashedPassword);
        if(Hash::check($request->oldpassword, $hashedPassword)){
            $admin->password = Hash::make($request->password);
            $admin->save();
            // return $admin->save();
            // Auth::logout();
            return redirect()->route('admin.logout');
            // dd(4);
        }  
        else{
            // dd(8);
            return redirect()->back();
        }

    }

}
