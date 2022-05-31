<?php

namespace App\Http\Controllers\Site;
use App\Models\Bell;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Content;
use App\Models\Comment;
use App\Models\Like;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSpecificationType;
use App\Models\ProductSpecificationTypeCategory;
use App\Models\Properties;
use App\Models\Question;
use App\Models\RelateData;
use App\Models\Sloagen;
use App\Models\Tag;
use App\Models\Taggable;
use App\User;
use App\Models\Setting;
use App\Http\Requests\CommentFormRequest;
use App\Http\Requests\ContactRequest;
use SweetAlert;
use SEO;
use App\Library\SliderBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOTools;

class HomeController extends Controller
{

    public function getIndex()
    {
        $data = Setting::first();
        SEO::setTitle($data->title);
        SEO::setDescription($data->description_seo);
        $sliders = Content::orderby('sort','ASC')->Slider()->get();
         $banner = Content::orderby('sort','ASC')->wherecontent_type('6')->get();
         $pos1 = category::whereposition('1')->first();
         $pos2 = category::whereposition('2')->first();
         $pos3 = category::whereposition('3')->first();
         $pos4 = category::whereposition('4')->first();
         $pos5 = category::whereposition('5')->first();

        $brands = Brand::orderby('id', 'DESC')->whereStatus('1')->get()->random(9);
        $categories = Category::orderby('id', 'DESC')->whereStatus('1')->take(10)->get();
        $new_products = Product::orderby('id','DESC')->where('newest','1')->where('not_found','0')->active()->take(10)->get();
        $most_products = Product::orderby('stocks','DESC')->whereNotNull('old_price')->whereNotNull('price')->where('not_found','0')->active()->get();
        $popular_products = Product::orderby('sort','ASC')->where('popular','1')->where('not_found','0')->active()->take(10)->get();
        $timer_products = Product::orderby('sort','ASC')->where('timer','1')->where('not_found','0')->active()->where('end_date','>',Carbon::now())->get();
        $blogs = Content::orderby('id', 'DESC')->ArticleCat()->get();
        $articles = Content::orderby('id', 'DESC')->Article()->whereStatus('1')->take(4)->get();
      
        return view('site.index')
            ->with('blogs', $blogs)
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
    }

    public function blogCat()
    {
        $blogs = Content::orderby('id', 'DESC')->ArticleCat()->get();

        return view('site.article.cat')
            ->with('blogs',$blogs);

    }
    public function blogList(Request $request, $id)
    {

        
        $blog_category = Content::find($id);
     
        $blogs = Content::orderby('id', 'DESC')->where('parent_id',$id)->get();
       
        return view('site.article.list')
            ->with('blog_category',$blog_category)
            ->with('blogs',$blogs);

    }
    public function blogDetail(Request $request, $id)
    {
          $cats = Content::orderBy('id','DESC')->ArticleCat()->take(8)->get();

       


        $seg = $request->segments();

        $blog = Content::find($id);
        SEO::setTitle($blog->title);
        SEO::setDescription($blog->description);
        
        if(!$blog){
            return redirect('/');
        }
        $blog->update([
            'view'=> $blog->view + 1,
        ]);
      
      
        $blogs = Content::orderby('id', 'DESC')->where('parent_id',$blog->parent_id)->where('id','<>',$id)->take(8)->get();
        $comments = Comment::where('commentable_id',$blog->id)->whereNull('parent_id')->whereStatus(1)->where('commentable_type','App\Models\Content')->get();
        $comments_count = Comment::where('commentable_id',$blog->id)->whereStatus(1)->where('commentable_type','App\Models\Content')->count();

        return view('site.article.details')
            ->with('blog',$blog)
            ->with('comments_count',$comments_count)
            ->with('comments',$comments)
            ->with('$cats',$cats)
            ->with('blogs',$blogs);

    }
    public function postComment(CommentFormRequest $request)
    {

     
            Comment::create([
                'content' => @$request->get('content'),
                'title' => @$request->get('title'),
                'commentable_id' => @$request->get('commentable_id'),
                'commentable_type' => @$request->get('commentable_type'),
              
                'star'=> @$request->get('star'),
                'status'=> 0,
                'readat'=> 0,
            ]);
           alert()->success('نظر شما با موفقیت ثبت شد بعد از تایید مدیر در سایت نمایش داده میشود', 'کاربر عزیز')->persistent('اکی');
          
            
            return \redirect()->back();

          
                   
    

    }
    public function postReply(Request $request)
    {


        
            Comment::create([
                'content' => $request->get('content'),
                'title' => $request->get('title'),
                'commentable_id' => $request->get('commentable_id'),
                'commentable_type' => $request->get('commentable_type'),
                'user_id' => Auth::id(),
                'parent_id'=>$request->get('parent_id'),
                'star'=> $request->get('star'),
                'status'=> 0,
                'readat'=> 0,
            ]);

            alert()->success('نظر شما با موفقیت ثبت شد بعد از تایید مدیر در سایت نمایش داده میشود', 'کاربر عزیز')->persistent('اکی');
          
            
            return \redirect()->back();


    }
   
   public function postFaq(Request $request )
    {
        if (Auth::check()) {
            Question::create([
                'question' => $request->get('question'),
                'product_id' => $request->get('product_id'),
            ]);
            return \redirect()->back()->with('success','نظر شما با موفقیت ثبت شد بعد از تایید مدیر در سایت نمایش داده میشود', 'کاربر عزیز');
        }
        else
        {

            return \redirect()->back()->with('error','ابتدا وارد شوید.');
        }

    }
    public function getAbout()
    {

        $data = Setting::first();
        SEO::setTitle($data->title);
        SEO::setDescription($data->description_seo);
        
        return view('site.about');
    }
    
    public function getContact()
    {
        $data = Setting::first();
        SEO::setTitle($data->title);
        SEO::setDescription($data->description_seo);
        return view('site.contact');
    }
    public function postContact(ContactRequest $request)
    {
        $input = $request->all();


        if (preg_match('/[qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM]/', $input['name']))
        {
            return redirect()->back()->with('error','لطفا برای قسمت نام از کلمات فارسی استفاده کنید');
        }
        else{


            $contact = Contact::create($input);

            alert()->success('پیام شما با موفقیت ارسال شد', 'کاربر عزیز')->persistent('اکی');
          
            
            return \redirect()->back();
        }

    }
    public function brandDetail(Request $request, $id)
    {


        $brand = Brand::whereUrl($id)->first();
        $products = Product::orderBy('id','DESC')->whereBrandId($brand->id)->get();
        $proid = $products->pluck('id');
        $cat_pro = ProductCategory::whereIn('product_id',$proid)->pluck('category_id');
        $categories = Category::whereIn('id',$cat_pro)->get();
        return view('site.brand.details', compact('brand','products','categories'));
    }
    public function brandList()
    {
        $brands = Brand::all();

        return view('site.brand.list', compact('brands'));
    }
    
    public function getSearch(Request $request)
    {

        $products = [];
        $products = Product::where('not_found','0')->where(function ($query){
            if (\request()->get('search') )
            {

                $keywordRaw = \request()->get('search');
                $key = explode(' ',$keywordRaw);
             

             
                    $query->where(function ($q) use ($key) {
                        foreach ($key as $value) {
                            $q->where('title', 'like', "%{$value}%");
                        }
                    });


                }
            
        
    })->get()->sortByDesc('stockCount');

        $brands = [];
        $brands = Brand::where(function ($query){
            if (\request()->get('search') )
            {
                $query->where('title', 'LIKE', '%' . \request()->get('search') . '%');
            }
        })->get();

        $a = [];

        $count  = count($brands) + count($products);


        if($brands !== [] and $products !==[]) {
            if ($brands != null || $products != null)
            {
                $a = array_merge($brands->toArray(), $products->toArray());
            }
        }

        $all= $this;
        $search = $request->get('search');
        return view('site.search')
            ->with('all',$all)
            ->with('count',$count)
            ->with('search_products',$products)
            ->with('brands',$brands)
            ->with('search',$search);
    }
    
    public function getNew()
    {
        $most_products = Product::orderby('id','DESC')->where('newest','1')->where('not_found','0')->active()->get();
        return view('site.products.most_pro-list')
            ->with('most_products', $most_products);
    }
    public function getdiscount()
    {
        
            $most_products = Product::orderby('stocks','DESC')->whereNotNull('old_price')->whereNotNull('price')->where('not_found','0')->active()->get();
    
            return view('site.products.dis_pro-list')
    
                ->with('most_products', $most_products);
    
        
    }
    public function getRules()
    {
        return view('site.rules');
    }
    public function getOrderRules()
    {

        return view('site.rules_order');


    }
    public function list(Request $request, $id)
    {
        $seg = $request->segments();
        $category = Category::find($id);
        if ($category->parent_id == null){
            return view('site.products.cat', compact('category'));
        }
        else{
            $query = Product::whereHas('categories',function ($query2) use($id) {
                $query2->where('not_found','0')->where('id', $id);
            })->pluck('brand_id');
            $brands=Brand::whereIn('id',$query)->get();
            $products = $category->products;

            $fieldId = ProductSpecificationTypeCategory::whereCategoryId($category->id)->pluck('pst_id')->all();
            $fields = ProductSpecificationType::whereIn('id',$fieldId)->whereNull('parent_id')->with('children')->get();
          
            return view('site.products.list', compact('category','fields','products','brands'));
        }

    }
    public function detail($id)
    {
        $product = Product::where('not_found','0')->find($id);

        SEO::setTitle($product->title);
        SEO::setDescription($product->description_seo);


        if(!$product){
            return redirect('/');
        }
        $specifications_types = ProductSpecificationType::whereHas('sp',function ($query2) use($id,$product) {
            $query2->where('product_id',$product->id)->whereHas('prices');
        })->get();

        $specifications = $product->specifications->groupBy('pivot.product_specification_type_id');
        $top_properties = Properties::where('product_id',$product->id)->orderby('sort','ASC')->whereStatus('1')->get();
        $bottom_properties = Properties::where('product_id',$product->id)->orderby('sort','ASC')->whereStatus('0')->get();

        $questions = Question::where('product_id',$product->id)->whereNotNull('answer')->get();
        $comments = Comment::where('commentable_id',$product->id)->whereNull('parent_id')->whereStatus(1)->where('commentable_type','App\Models\Product')->get();
        $comments_count = Comment::where('commentable_id',$product->id)->whereStatus(1)->where('commentable_type','App\Models\Product')->count();
        $likes_count = Like::where('likeable_id',$product->id)->where('likeable_type','App\Models\Product')->count();
        $relate_ids  =  RelateData::where('datable_id',$id)->where('datable_type' , 'App\Models\Product')->where('type' , 1)->pluck('relatable_id');
        
        $relate = Product::whereIn('id',$relate_ids)->where('not_found','0')->get();
        $complement_ids  =  RelateData::where('datable_id',$id)->where('datable_type' , 'App\Models\Product')->where('type' , 2)->pluck('relatable_id');
        $complement = Product::whereIn('id',$complement_ids)->where('not_found','0')->get();
        $tag_pro = Taggable::where('taggable_id', $product->id)->where('taggable_type','App\Models\Product')->pluck('tag_id')->toArray();

        $tags = Tag::whereIn('id',$tag_pro)->where('title','<>','')->get();

        $sloagens = Sloagen::where('product_id',$product->id)->get();
        return view('site.products.details', compact('product','specifications','top_properties','bottom_properties',
            'questions','comments','comments_count','specifications_types','relate','complement','tags','tag_pro','sloagens','likes_count'));
    }
 
   
 
}
