<?php

namespace App\Providers;

use App\Models\AuctionProductType;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\WebsiteSetting;
use App\Models\WebsiteSlider;
use App\Models\WholeSaleProductType;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['admin.master'],function ($view){
            $view->with('productTypes',ProductType::where('status',1)->latest()->take(3)->get());
        });

        View::composer(['website.layout.app'],function ($view){
            $view->with([
                'categories' => Category::where('status',1)->latest()->get(),
                'websiteInfos' => WebsiteSetting::where('status',1)->get(),
                'brands' => Brand::where('status',1)->get(),
                'slider1' => WebsiteSlider::where('status',1)->latest()->take(4)->get(),
                'sliders' => WebsiteSlider::where('status',1)->latest()->skip(1)->take(4)->get(),
                'banners' => WebsiteSlider::where('status',1)->latest()->take(3)->get(),
                'products'=> Product::where('status',1)->latest()->get(),
            ]);
        });

        View::composer(['admin.master'],function ($view){
            $view->with('wholesaleProductTypes',WholeSaleProductType::where('status',1)->latest()->take(3)->get());
        });
        View::composer(['admin.master'],function ($view){
            $view->with('auctionProductTypes',AuctionProductType::where('status',1)->latest()->take(3)->get());
        });

        Paginator::useBootstrap();
    }
}
