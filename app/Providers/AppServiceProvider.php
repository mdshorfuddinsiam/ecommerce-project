<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\SiteSetting;
use App\Models\SeoSetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['admin.body.header'], function($view){
            $view->with('activeAdmin', Auth::guard('admin')->user());
        });
        View::composer(['dashboard', 'frontend.profile.user_profile', 'frontend.profile.change_password'], function($view){
            $view->with('user', Auth::user());
        });
        View::composer(['admin.body.sidebar'], function($view){
            $view->with('route', Route::current()->getName());
        });
        View::composer(['admin.body.sidebar'], function($view){
            $view->with('prefix', Request::route()->getPrefix());
        });
        View::composer(['frontend.body.header','frontend.index','frontend.common.vertical_menu','frontend.tag.tags_view','frontend.product.subcategory_view','frontend.product.subsubcategory_view'], function($view){
            $view->with('categories', Category::orderBy('category_name_en', 'ASC')->get());
        });
        View::composer(['frontend.common.hot_deals'], function($view){
            $view->with('hotDeals', Product::where('hot_deals', '1')->where('discount_price', '!=', null)->orderBy('id', 'DESC')->limit(3)->get());
        });
        // View::composer(['frontend.body.header'], function($view){
        //     $view->with('subcategories', SubCategory::orderBy('subcategory_name_en', 'ASC')->get());
        // });
        // View::composer(['frontend.body.header'], function($view){
        //     $view->with('subsubcategories', SubSubCategory::orderBy('subsubcategory_name_en', 'ASC')->get());
        // });
        View::composer(['frontend.body.header', 'frontend.body.footer'], function($view){
            $view->with('siteSetting', SiteSetting::find(1));
        });
        View::composer(['frontend.main_master'], function($view){
            $view->with('seoSetting', SeoSetting::find(1));
        });

        
        

        // (stack overflow)
        // view()->composer('*', function ($view)
        // {
        //     $user = request()->user();

        //     $view->with('user', $user);
        // });

    }
}
