<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


include('panel.php');



    //First Pages
Route::get('/', 'App\Http\Controllers\Site\HomeController@getIndex');

Route::get('/crowl', 'App\Http\Controllers\Site\CrawlerController@crawl');

Route::get('/article-list/{id}', 'App\Http\Controllers\Site\HomeController@blogList');
Route::get('/article-category', 'App\Http\Controllers\Site\HomeController@blogCat');
Route::get('/article-details/{id}', 'App\Http\Controllers\Site\HomeController@blogDetail');

//newproduct
Route::get('/latest', 'App\Http\Controllers\Site\HomeController@getNew')->name('site.latest');

//discount 
Route::get('/discount', 'App\Http\Controllers\Site\HomeController@getdiscount')->name('site.discount');

Route::get('/privacy', 'App\Http\Controllers\Site\HomeController@getRules')->name('site.rules');
Route::get('/rules', 'App\Http\Controllers\Site\HomeController@getOrderRules')->name('site.orderrules');


   //Comments
   Route::post('comment', 'App\Http\Controllers\Site\HomeController@postComment');
   Route::post('reply', 'App\Http\Controllers\Site\HomeController@postReply');
   Route::post('faq', 'App\Http\Controllers\Site\HomeController@postFaq');

   Route::get('/about-us', 'App\Http\Controllers\Site\HomeController@getAbout');
   Route::get('/contact-us', 'App\Http\Controllers\Site\HomeController@getContact')->name('site.contact');
   Route::post('/post-contact', 'App\Http\Controllers\Site\HomeController@postContact')->name('site.contact-post');
   Route::get('/brand', 'App\Http\Controllers\Site\HomeController@brandList')->name('site.brand.list');
   Route::get('/search', 'App\Http\Controllers\Site\HomeController@getSearch');

    //Shop Cart & Bank

    Route::post('/post-checkout', 'App\Http\Controllers\Site\ShopController@postCheckout')->name('site.cart.post-checkout');
    Route::get('/checkout', 'App\Http\Controllers\Site\ShopController@checkout')->name('site.cart.checkout');
    Route::post('/cart/content', 'App\Http\Controllers\Site\ShopController@cartContent')->name('site.cart.content');
    Route::post('/post-address', 'App\Http\Controllers\Site\ShopController@postAddAddress')->name('site.cart.address');
    Route::get('/default-address/{id?}', 'App\Http\Controllers\Site\ShopController@defaultAddress')->name('site.cart.default');
    Route::post('/cart/add', 'App\Http\Controllers\Site\ShopController@addToCart')->name('site.cart.add');
    Route::post('/discount/add', 'App\Http\Controllers\Site\ShopController@addDiscount')->name('site.discount.add');
    Route::post('/cart/remove', 'App\Http\Controllers\Site\ShopController@removeFromCart')->name('site.cart.remove');
   
    Route::get('/finish', 'App\Http\Controllers\Site\ShopController@finish')->name('site.cart.finish3');

  //Product List
  Route::post('/vue/product-list', 'App\Http\Controllers\Site\VueController@productList')->name('vue.product-list');
  Route::post('/vue/filter-product', 'App\Http\Controllers\Site\VueController@filterProduct')->name('vue.filter-product');
  Route::post('/vue/setbrands', 'App\Http\Controllers\Site\VueController@Brands')->name('site.getbrands');
  Route::get('/cat/{id}', 'App\Http\Controllers\Site\HomeController@list')->name('site.product.list');
  Route::get('/pro/{id}', 'App\Http\Controllers\Site\HomeController@detail')->name('site.product.detail');
  Route::get('/all-products/', 'App\Http\Controllers\Site\HomeController@all')->name('site.product.all');

  Route::get('/banner/{id?}', 'HomeController@banner')->name('site.banner.detail');
  Route::get('/tag/{tag}', 'HomeController@contentListByTag');

  //Brand
  Route::post('/vue/brand-list', 'App\Http\Controllers\Site\VueController@brandList')->name('vue.brand-list');
  Route::post('/vue/filter-brand', 'App\Http\Controllers\Site\VueController@filterBrand')->name('vue.filter-brand');
  Route::post('/vue/setcats', 'App\Http\Controllers\Site\VueController@Cats')->name('site.getcats');
  Route::get('/brand', 'App\Http\Controllers\Site\HomeController@brandList')->name('site.brand.list');
  Route::get('/brand/{id?}', 'App\Http\Controllers\Site\HomeController@brandDetail')->name('site.brand.detail');


Route::get('/login', 'App\Http\Controllers\Admin\LoginController@getLogin');
Route::post('/login', 'App\Http\Controllers\Admin\LoginController@postLogin');
Route::get('/repeat', 'Admin\ProductController@getRepeat');
Route::get('/repeat2', 'Admin\BrandController@getRepeat');
Route::get('/stockedin', 'Admin\ProductController@getCheck');
Route::get('/fix', 'Admin\OrderController@address');
Route::get('/fixingprice2', 'Admin\SettingController@fixingPrice');
Route::get('/fixingstock', 'Admin\ProductController@fixStock');


Route::prefix('admin')->group(function () {

    //Auth
    Route::get('/login', 'App\Http\Controllers\Admin\LoginController@getLogin');
    Route::post('/login', 'App\Http\Controllers\Admin\LoginController@postLogin');

    Route::get('/logout',  function (){
        \Illuminate\Support\Facades\Auth::logout();
        return redirect()->to('/login');
    });

    Route::middleware('AdminPermission')->group(function (){
        
        Route::get('/', 'App\Http\Controllers\Admin\HomeController@getIndex');

 
Route::get('category', 'App\Http\Controllers\Admin\CategoryController@getcategory');

     //Articles
     Route::get('articles', 'App\Http\Controllers\Admin\ArticleController@getArticle');
     Route::get('articles/add', 'App\Http\Controllers\Admin\ArticleController@getAddArticle');
     Route::post('articles/add', 'App\Http\Controllers\Admin\ArticleController@postAddArticle');

     Route::get('articles/delete/{id}', 'App\Http\Controllers\Admin\ArticleController@getDeleteArticle');
     Route::post('articles/delete', 'App\Http\Controllers\Admin\ArticleController@postDeleteArticle');
     Route::get('articles/edit/{id}', 'App\Http\Controllers\Admin\ArticleController@getEditArticle');
     Route::post('articles/edit/{id}', 'App\Http\Controllers\Admin\ArticleController@postEditArticle');
     Route::post('articles/sort', 'App\Http\Controllers\Admin\ArticleController@postSort');

      //ArticleCategories
      Route::get('article-cat', 'App\Http\Controllers\Admin\ArticleController@getArticleCat');
      Route::get('article-cat/add', 'App\Http\Controllers\Admin\ArticleController@getAddArticleCat');
      Route::post('article-cat/add', 'App\Http\Controllers\Admin\ArticleController@postAddArticleCat');
      Route::get('article-cat/delete/{id}', 'App\Http\Controllers\Admin\ArticleController@getDeleteArticleCat');
      Route::post('article-cat/delete', 'App\Http\Controllers\Admin\ArticleController@postDeleteArticleCat');
      Route::get('article-cat/edit/{id}', 'App\Http\Controllers\Admin\ArticleController@getEditArticleCat');
      Route::post('article-cat/edit/{id}', 'App\Http\Controllers\Admin\ArticleController@postEditArticleCat');


       //Users
       Route::get('user', 'App\Http\Controllers\Admin\UserController@getIndex');
       Route::get('users', 'App\Http\Controllers\Admin\UserController@getIndex2');
       Route::get('user/add', 'App\Http\Controllers\Admin\UserController@getAdd');
       Route::post('user/add', 'App\Http\Controllers\Admin\UserController@postAdd');
       Route::get('user/edit/{id}', 'App\Http\Controllers\Admin\UserController@getEdit');
       Route::post('user/edit/{id}', 'App\Http\Controllers\Admin\UserController@postEdit');
       Route::get('users/edit/{id}', 'App\Http\Controllers\Admin\UserController@getEdit2');
       Route::post('users/edit/{id}', 'App\Http\Controllers\Admin\UserController@postEdit2');
       Route::post('user/delete', 'App\Http\Controllers\Admin\UserController@postDelete');
       Route::get('/users/export', 'App\Http\Controllers\Admin\UserController@export');
       Route::get('user/status/{id?}', 'App\Http\Controllers\Admin\UserController@Status')->name('admin.user.status');
  

      //UserGroups
      Route::get('user/group', 'App\Http\Controllers\Admin\UserController@getGroup');
      Route::get('user/group-add', 'App\Http\Controllers\Admin\UserController@getGroupAdd');
      Route::post('user/group-add', 'App\Http\Controllers\Admin\UserController@postGroupAdd');
      Route::get('user/group-edit/{id}', 'App\Http\Controllers\Admin\UserController@getGroupEdit');
      Route::post('user/group-edit/{id}', 'App\Http\Controllers\Admin\UserController@postGroupEdit');
      Route::post('user/group-delete', 'App\Http\Controllers\Admin\UserController@postGroupDelete');
      Route::get('user/delete/{id}', 'App\Http\Controllers\Admin\UserController@getGroupDelete');
      //UserAddress
            Route::get('user/address/{id}', 'App\Http\Controllers\Admin\UserController@getAddress');
      Route::get('user/address-edit/{id}', 'App\Http\Controllers\Admin\UserController@getEditAddress');
      Route::post('user/address-edit/{id}', 'App\Http\Controllers\Admin\UserController@postEditAddress');
      Route::post('user/address-delete', 'App\Http\Controllers\Admin\UserController@postDeleteAddress');

       //Departments
       Route::get('departments', 'App\Http\Controllers\Admin\DepartmentController@get');
       Route::get('departments/add', 'App\Http\Controllers\Admin\DepartmentController@getAdd');
       Route::post('departments/add', 'App\Http\Controllers\Admin\DepartmentController@postAdd');
       Route::get('departments/delete/{id}', 'App\Http\Controllers\Admin\DepartmentController@getDelete');
       Route::post('departments/delete', 'App\Http\Controllers\Admin\DepartmentController@postDelete');
       Route::get('departments/edit/{id}', 'App\Http\Controllers\Admin\DepartmentController@getEdit');
       Route::post('departments/edit/{id}', 'App\Http\Controllers\Admin\DepartmentController@postEdit');

      //Sliders
      Route::get('slider', 'App\Http\Controllers\Admin\SliderController@getSlider');
      Route::get('slider/add', 'App\Http\Controllers\Admin\SliderController@getAddSlider');
      Route::post('slider/add', 'App\Http\Controllers\Admin\SliderController@postAddSlider');
      Route::get('slider/delete/{id}', 'App\Http\Controllers\Admin\SliderController@getDeleteSlider');
      Route::post('slider/delete', 'App\Http\Controllers\Admin\SliderController@postDeleteSlider');
      Route::get('slider/edit/{id}', 'App\Http\Controllers\Admin\SliderController@getEditSlider');
      Route::post('slider/edit/{id}', 'App\Http\Controllers\Admin\SliderController@postEditSlider');
      Route::post('slider/sort', 'App\Http\Controllers\Admin\SliderController@postSort');

      
      //Tags
      Route::get('tags', 'App\Http\Controllers\Admin\TagController@get');
      Route::get('tags/edit/{id}', 'App\Http\Controllers\Admin\TagController@getEdit');
      Route::post('tags/edit/{id}', 'App\Http\Controllers\Admin\TagController@postEdit');
      Route::post('tags/delete/', 'App\Http\Controllers\Admin\TagController@postDelete');

          //Questions
    Route::get('/products/question/{id?}', 'App\Http\Controllers\Admin\QuestionController@get');
    Route::get('/products/questions', 'App\Http\Controllers\Admin\QuestionController@getFaq');
    Route::get('/products/questions/add/', 'App\Http\Controllers\Admin\QuestionController@getAddFaq');
    Route::get('/products/question/add/{id?}', 'App\Http\Controllers\Admin\QuestionController@getAdd');
    Route::post('/products/question/add', 'App\Http\Controllers\Admin\QuestionController@postAdd');
    Route::get('/products/question/delete/{id}', 'App\Http\Controllers\Admin\QuestionController@getDelete');
    Route::post('/products/question/delete', 'App\Http\Controllers\Admin\QuestionController@postDelete');
    Route::get('/products/question/edit/{id}', 'App\Http\Controllers\Admin\QuestionController@getEdit');
    Route::post('/products/question/edit/{id}', 'App\Http\Controllers\Admin\QuestionController@postEdit');
    Route::get('faq', 'App\Http\Controllers\Admin\QuestionController@getQa');
    Route::get('faq/edit/{id}', 'App\Http\Controllers\Admin\QuestionController@getEditQa');
    Route::post('faq/edit/{id}', 'App\Http\Controllers\Admin\QuestionController@postEditQa');

    
          //socials
          Route::get('social', 'App\Http\Controllers\Admin\SocialController@get');
          Route::get('social/add', 'App\Http\Controllers\Admin\SocialController@getAdd');
          Route::post('social/add', 'App\Http\Controllers\Admin\SocialController@postAdd');
          Route::get('social/delete/{id}', 'App\Http\Controllers\Admin\SocialController@getDelete');
          Route::get('social/edit/{id}', 'App\Http\Controllers\Admin\SocialController@getEdit');
          Route::post('social/edit/{id}', 'App\Http\Controllers\Admin\SocialController@postEdit');

              //Redirects
        Route::get('redirect' , 'App\Http\Controllers\Admin\RedirectController@getRedirect');
        Route::get('redirect/add' , 'App\Http\Controllers\Admin\RedirectController@getRedirectAdd');
        Route::post('redirect/add' , 'App\Http\Controllers\Admin\RedirectController@postRedirectAdd');
        Route::get('redirect/delete/{id}' , 'App\Http\Controllers\Admin\RedirectController@getRedirectDelete');

           //Uploaders
           Route::get('uploader', 'App\Http\Controllers\Admin\ContentController@getUploader');
           Route::get('uploader/add', 'App\Http\Controllers\Admin\ContentController@getAddUploader');
           Route::post('uploader/add', 'App\Http\Controllers\Admin\ContentController@postAddUploader');
           Route::get('uploader/delete/{id}', 'App\Http\Controllers\Admin\ContentController@getDeleteUploader');
           Route::get('uploader/edit/{id}', 'App\Http\Controllers\Admin\ContentController@getEditUploader');
           Route::post('uploader/edit/{id}', 'App\Http\Controllers\Admin\ContentController@postEditUploader');


            //Categories
            Route::get('category', 'App\Http\Controllers\Admin\CategoryController@getCategory');
            Route::get('category/add', 'App\Http\Controllers\Admin\CategoryController@getAddCategory');
            Route::post('category/add', 'App\Http\Controllers\Admin\CategoryController@postAddCategory');
            Route::get('category/delete/{id}', 'App\Http\Controllers\Admin\CategoryController@getDeleteCategory');
            Route::post('category/delete', 'App\Http\Controllers\Admin\CategoryController@postDeleteCategory');
            Route::get('category/edit/{id}', 'App\Http\Controllers\Admin\CategoryController@getEditCategory');
            Route::post('category/edit/{id}', 'App\Http\Controllers\Admin\CategoryController@postEditCategory');
            Route::post('category/sort', 'App\Http\Controllers\Admin\CategoryController@postSort');
            Route::get('category/search', 'App\Http\Controllers\Admin\CategoryController@getSearch');

                //Brands
            Route::get('brands', 'App\Http\Controllers\Admin\BrandController@getBrand');
            Route::get('brands/add', 'App\Http\Controllers\Admin\BrandController@getAddBrand');
            Route::post('brands/add', 'App\Http\Controllers\Admin\BrandController@postAddBrand');
            Route::get('brands/delete/{id}', 'App\Http\Controllers\Admin\BrandController@getDeleteBrand');
            Route::get('brands/delete-image/{id}', 'App\Http\Controllers\Admin\BrandController@getDeleteImage');
            Route::post('brands/delete', 'App\Http\Controllers\Admin\BrandController@postDeleteBrand');
            Route::get('brands/edit/{id}', 'App\Http\Controllers\Admin\BrandController@getEditBrand');
            Route::post('brands/edit/{id}', 'App\Http\Controllers\Admin\BrandController@postEditBrand');

                //ProductSpecificationTypes
            Route::get('product-specification-type/list/{id?}', 'App\Http\Controllers\Admin\ProductSpecificationTypeController@getList');
            Route::get('product-specification-type/add/{id?}', 'App\Http\Controllers\Admin\ProductSpecificationTypeController@getAdd');
            Route::post('product-specification-type/add/{id?}', 'App\Http\Controllers\Admin\ProductSpecificationTypeController@postAdd');
            Route::post('product-specification-type/add-main/{id?}', 'App\Http\Controllers\Admin\ProductSpecificationTypeController@postAddMain');
            Route::get('product-specification-type/edit/{id}', 'App\Http\Controllers\Admin\ProductSpecificationTypeController@getEdit');
            Route::post('product-specification-type/edit/{id}', 'App\Http\Controllers\Admin\ProductSpecificationTypeController@postEdit');
            Route::post('product-specification-type/delete', 'App\Http\Controllers\Admin\ProductSpecificationTypeController@postDelete');
            Route::post('product-specification-type/cat-add', 'App\Http\Controllers\Admin\ProductSpecificationTypeController@postCatAdd');
            Route::get('product-specification-type/cat-delete/{id}/{c_id}', 'App\Http\Controllers\Admin\ProductSpecificationTypeController@getCatDelete');
            Route::get('product-specification-type/delete/{id}/', 'App\Http\Controllers\Admin\ProductSpecificationTypeController@getDelete');

                //Products
            Route::get('products', 'App\Http\Controllers\Admin\ProductController@getProduct');
            Route::get('products/add', 'App\Http\Controllers\Admin\ProductController@getAddProduct');
            Route::post('products/add', 'App\Http\Controllers\Admin\ProductController@postAddProduct');
            Route::get('products/delete/{id}', 'App\Http\Controllers\Admin\ProductController@getDeleteProduct');
            Route::post('products/delete', 'App\Http\Controllers\Admin\ProductController@postDeleteProduct');
            Route::get('products/edit/{id}', 'App\Http\Controllers\Admin\ProductController@getEditProduct');
            Route::post('products/edit/{id}', 'App\Http\Controllers\Admin\ProductController@postEditProduct');
            Route::post('products/sort', 'App\Http\Controllers\Admin\ProductController@postSort');
            Route::get('/products/export', 'App\Http\Controllers\Admin\ProductController@export');

            //Inventories
        Route::get('inventory', 'App\Http\Controllers\Admin\InventoryController@get');
        Route::get('inventory/add', 'App\Http\Controllers\Admin\InventoryController@getAdd');
        Route::post('inventory/add', 'App\Http\Controllers\Admin\InventoryController@postAdd');
        Route::get('inventory/delete/{id}', 'App\Http\Controllers\Admin\InventoryController@getDelete');
        Route::post('inventory/delete', 'App\Http\Controllers\Admin\InventoryController@postDelete');
        Route::get('inventory/edit/{id}', 'App\Http\Controllers\Admin\InventoryController@getEdit');
        Route::post('inventory/edit/{id}', 'App\Http\Controllers\Admin\InventoryController@postEdit');

            //InventoryReceipts
            Route::get('inventory-receipt', 'App\Http\Controllers\Admin\InventoryController@getReceipt');
            Route::get('inventory-receipt/add', 'App\Http\Controllers\Admin\InventoryController@getAddReceipt');
            Route::post('inventory-receipt/add', 'App\Http\Controllers\Admin\InventoryController@postAddReceipt');
            Route::get('inventory-receipt/delete/{id}', 'App\Http\Controllers\Admin\InventoryController@getDeleteReceipt');
            Route::post('inventory-receipt/delete', 'App\Http\Controllers\Admin\InventoryController@postDeleteReceipt');
            Route::get('inventory-receipt/edit/{id}', 'App\Http\Controllers\Admin\InventoryController@getEditReceipt');
            Route::post('inventory-receipt/edit/{id}', 'App\Http\Controllers\Admin\InventoryController@postEditReceiptStatus');
            Route::get('/inventory-receipt/export', 'App\Http\Controllers\Admin\InventoryController@export');

           //ProductSpecifications
           Route::get('product-specification-price/list/{product_id}', 'App\Http\Controllers\Admin\ProductSpecificationPriceController@getIndex');
           Route::post('product-specification-price/post-add/{product_id}', 'App\Http\Controllers\Admin\ProductSpecificationPriceController@postAdd');
           Route::post('product-specification-price/post-add-group/{product_id}', 'App\Http\Controllers\Admin\ProductSpecificationPriceController@postAddGroup');
           Route::get('product-specification-price/delete/{spf_id}', 'App\Http\Controllers\Admin\ProductSpecificationPriceController@delete');
           Route::post('product-specification-price/sort', 'App\Http\Controllers\Admin\ProductSpecificationPriceController@postSort');
           Route::get('product-specification-price/delete-image/{image_id}', 'App\Http\Controllers\Admin\ProductSpecificationPriceController@deleteImage');
   
           //ProductSpecifications
           Route::get('product-specification/list/{product_id}', 'App\Http\Controllers\Admin\ProductSpecificationController@getIndex');
           Route::get('product-specification/order/{product_id}', 'App\Http\Controllers\Admin\ProductSpecificationController@getOrder');
           Route::get('product-specification/add/{product_id}', 'App\Http\Controllers\Admin\ProductSpecificationController@getAdd');
           Route::post('product-specification/add/{product_id}', 'App\Http\Controllers\Admin\ProductSpecificationController@postAdd');
           Route::get('product-specification/add-order/{product_id}', 'App\Http\Controllers\Admin\ProductSpecificationController@getAddOrder');
           Route::post('product-specification/add-order/{product_id}', 'App\Http\Controllers\Admin\ProductSpecificationController@postAddOrder');
           Route::post('product-specification/delete', 'App\Http\Controllers\Admin\ProductSpecificationController@postDelete');
           Route::post('product-specification/edit-price/{id}', 'App\Http\Controllers\Admin\ProductSpecificationController@postEditPrice');
   
   
           //ProductSpecificationImages
           Route::get('/sp/image/{id}' , 'App\Http\Controllers\Admin\ProductSpecificationController@getImage');
           Route::get('/sp/image/add/{id}' , 'App\Http\Controllers\Admin\ProductSpecificationController@getAddImage');
           Route::post('/sp/image/add' , 'App\Http\Controllers\Admin\ProductSpecificationController@postAddImage');
           Route::get('/sp/image/edit/{id}' , 'App\Http\Controllers\Admin\ProductSpecificationController@getEditImage');
           Route::post('/sp/image/edit/{id}' , 'App\Http\Controllers\Admin\ProductSpecificationController@postEditImage');
           Route::post('/sp/image/delete' , 'App\Http\Controllers\Admin\ProductSpecificationController@postDeleteImage');

              //ProductImages
        Route::get('/products/image/{id}' , 'App\Http\Controllers\Admin\ProductController@getImage');
        Route::get('/products/image/add/{id}' , 'App\Http\Controllers\Admin\ProductController@getAddImage');
        Route::post('/products/image/add' , 'App\Http\Controllers\Admin\ProductController@postAddImage');
        Route::get('/products/image/edit/{id}' , 'App\Http\Controllers\Admin\ProductController@getEditImage');
        Route::post('/products/image/edit/{id}' , 'App\Http\Controllers\Admin\ProductController@postEditImage');

        Route::post('/products/image/delete' , 'App\Http\Controllers\Admin\ProductController@postDeleteImage');

          //Timers
    Route::get('/products/timer/{id}' , 'App\Http\Controllers\Admin\ProductController@getTimer');
    Route::post('/products/timer' , 'App\Http\Controllers\Admin\ProductController@postTimer');
    Route::post('/products/timer/edit/{id}' , 'App\Http\Controllers\Admin\ProductController@postEditTimer');
    Route::get('/products/thumbnail/edit/{id?}' , 'App\Http\Controllers\Admin\ProductController@editThumbnail');
    Route::get('price-discount/list', 'App\Http\Controllers\Admin\PriceController@get');
    Route::get('price-discount/deactive/{id}', 'App\Http\Controllers\Admin\PriceController@getDeactive');
    Route::post('price-discount/delete', 'App\Http\Controllers\Admin\PriceController@postDeletePrice');
    Route::get('price-discount', 'App\Http\Controllers\Admin\PriceController@getAdd');
    Route::post('/price-discount-post', 'App\Http\Controllers\Admin\PriceController@postAdd');

     //Sloagens
     Route::get('products/sloagen/{id?}', 'App\Http\Controllers\Admin\SloagenController@get');
     Route::get('products/sloagen/add/{id?}', 'App\Http\Controllers\Admin\SloagenController@getAdd');
     Route::post('products/sloagen/add', 'App\Http\Controllers\Admin\SloagenController@postAdd');
     Route::get('products/sloagen/delete/{id}', 'App\Http\Controllers\Admin\SloagenController@getDelete');
     Route::post('products/sloagen/delete', 'App\Http\Controllers\Admin\SloagenController@postDelete');
     Route::get('products/sloagen/edit/{id}', 'App\Http\Controllers\Admin\SloagenController@getEdit');
     Route::post('products/sloagen/edit/{id}', 'App\Http\Controllers\Admin\SloagenController@postEdit');

      //Properties
    Route::get('products/properties/{id?}', 'App\Http\Controllers\Admin\PropertiesController@get');
    Route::get('products/properties/add/{id?}', 'App\Http\Controllers\Admin\PropertiesController@getAdd');
    Route::post('products/properties/add', 'App\Http\Controllers\Admin\PropertiesController@postAdd');
    Route::get('products/properties/delete/{id}', 'App\Http\Controllers\Admin\PropertiesController@getDelete');
    Route::post('products/properties/delete', 'App\Http\Controllers\Admin\PropertiesController@postDelete');
    Route::get('products/properties/edit/{id}', 'App\Http\Controllers\Admin\PropertiesController@getEdit');
    Route::post('products/properties/edit/{id}', 'App\Http\Controllers\Admin\PropertiesController@postEdit');
    Route::post('products/properties/sort', 'App\Http\Controllers\Admin\PropertiesController@postSort');

      //
      Route::get('products/order/{id?}', 'App\Http\Controllers\Admin\ProductController@getOrder');

         //Discounts
         Route::get('/discounts', 'App\Http\Controllers\Admin\DiscountController@getIndex');
         Route::get('/discounts/add', 'App\Http\Controllers\Admin\DiscountController@getAdd');
         Route::post('/discounts/add', 'App\Http\Controllers\Admin\DiscountController@postAdd');
         Route::get('/discounts/edit/{id}', 'App\Http\Controllers\Admin\DiscountController@getEdit');
         Route::post('/discounts/edit/{id}', 'App\Http\Controllers\Admin\DiscountController@postEdit');
         Route::post('/discounts/delete', 'App\Http\Controllers\Admin\DiscountController@postDelete');

          //Comments
        Route::get('comment', 'App\Http\Controllers\Admin\CommentController@getIndex');
        Route::get('comment/edit/{id}', 'App\Http\Controllers\Admin\CommentController@getEdit');
        Route::post('comment/edit/{id}', 'App\Http\Controllers\Admin\CommentController@postEdit');
        Route::post('comment/delete', 'App\Http\Controllers\Admin\CommentController@postDelete');
        Route::get('comment/delete/{id}', 'App\Http\Controllers\Admin\CommentController@getDelete');

           //Orders
           Route::get('/order', 'App\Http\Controllers\Admin\OrderController@getIndex');
           Route::get('/order/det/{id}', 'App\Http\Controllers\Admin\OrderController@getDetail');
           Route::post('/order/delete', 'App\Http\Controllers\Admin\OrderController@postDelete');
           Route::post('/order/status/{id}', 'App\Http\Controllers\Admin\OrderController@orderStatus');
           Route::get('/order/factor/{id}', 'App\Http\Controllers\Admin\OrderController@getfactor');
           Route::get('/order/address/{id}', 'App\Http\Controllers\Admin\OrderController@getAddress');
           Route::get('/order/export', 'App\Http\Controllers\Admin\OrderController@export');

                //OrderStatuses
            Route::get('order-status', 'App\Http\Controllers\Admin\StatusController@get');
            Route::get('order-status/add', 'App\Http\Controllers\Admin\StatusController@getAdd');
            Route::post('order-status/add', 'App\Http\Controllers\Admin\StatusController@postAdd');
            Route::get('order-status/delete/{id}', 'App\Http\Controllers\Admin\StatusController@getDelete');
            Route::post('order-status/delete', 'App\Http\Controllers\Admin\StatusController@postDelete');
            Route::get('order-status/edit/{id}', 'App\Http\Controllers\Admin\StatusController@getEdit');
            Route::post('order-status/edit/{id}', 'App\Http\Controllers\Admin\StatusController@postEdit');
   

        //Setting
        Route::get('setting/', 'App\Http\Controllers\Admin\SettingController@getEditSetting');
        Route::post('setting/edit/{id}', 'App\Http\Controllers\Admin\SettingController@postEditSetting');
      
       
    });

    });