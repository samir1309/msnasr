<?php


use App\Library\SliderBanner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Article;
use App\Models\Content;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Social;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

$category_footer=[];
$brands_footer=[];
$setting_header=[];
$social_header=[];

$head_sli=[];
$seg=[];
$seg = \request()->segments();

$setting_header = Setting::first();
$brands_footer = Brand::orderby('id', 'DESC')->whereFooter('1')->take(10)->get();
$head_sli = Content::Slider()->where('status','1')->first();
$category_footer = Category::orderBy('id','ASC')->whereNull('parent_id')->get();

$social_header=Social::get();

View::composer('layouts.site.master', function ($view) {

    $category_footer = Category::orderBy('id','ASC')->whereNull('parent_id')->get();
   $view->with('category_footer',$category_footer);
   
   
});

View::composer('site.panel.master', function ($view) {

    $category_footer = Category::orderBy('id','ASC')->whereNull('parent_id')->get();
   $view->with('category_footer',$category_footer);
   
   
});
View::composer('site.index', function ($view) {

    $sliders = Content::orderby('sort','ASC')->Slider()->get();
    $banner = Content::orderby('sort','ASC')->wherecontent_type('6')->get();
 
   $brands = Brand::orderby('id', 'DESC')->whereStatus('1')->get()->random(9);
   $categories = Category::orderby('id', 'DESC')->whereStatus('1')->take(10)->get();
   $new_products = Product::orderby('id','DESC')->where('newest','1')->where('not_found','0')->active()->take(10)->get();
   $most_products = Product::orderby('stocks','DESC')->whereNotNull('old_price')->whereNotNull('price')->where('not_found','0')->active()->get();
   $popular_products = Product::orderby('sort','ASC')->where('popular','1')->where('not_found','0')->active()->take(10)->get();
   $timer_products = Product::orderby('sort','ASC')->where('timer','1')->where('not_found','0')->active()->where('end_date','>',Carbon::now())->get();
   $blogs = Content::orderby('id', 'DESC')->ArticleCat()->get();
   $articles = Content::orderby('id', 'DESC')->Article()->whereStatus('1')->take(4)->get();
   $pos1 = category::whereposition('1')->first();
   $pos2 = category::whereposition('2')->first();
   $pos3 = category::whereposition('3')->first();
   $pos4 = category::whereposition('4')->first();
   $pos5 = category::whereposition('5')->first();


   $view->with('blogs', $blogs)
   ->with('brands', $brands)
   ->with('banner', $banner)
   ->with('most_products', $most_products)
   ->with('sliders', $sliders)
   ->with('new_products', $new_products)
   ->with('popular_products', $popular_products)
   ->with('timer_products', $timer_products)
   ->with('articles', $articles)
   ->with('categories', $categories)
   ->with('pos1', $pos1)
   ->with('pos2', $pos2)
   ->with('pos3', $pos3)
   ->with('pos4', $pos4)
   ->with('pos5', $pos5);
   
   
});


$category_footer=[];
$brands_footer=[];
$setting_header=[];
$social_header=[];

$head_sli=[];
$seg=[];
$seg = \request()->segments();

$setting_header = Setting::first();
$brands_footer = Brand::orderby('id', 'DESC')->whereFooter('1')->take(10)->get();
$head_sli = Content::Slider()->where('status','1')->first();
$category_footer = Category::orderBy('id','ASC')->whereNull('parent_id')->get();

$social_header=Social::get();




View::share([
    'category_footer' => $category_footer,
    'brands_footer' => $brands_footer,
    'setting_header' => $setting_header,
    'social_header' => $social_header,
    'head_sli' => $head_sli,
    'seg' => $seg,
]);