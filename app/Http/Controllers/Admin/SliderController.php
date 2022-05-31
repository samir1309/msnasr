<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Logs;
use App\Models\Content;
use Classes\UploadImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getSlider(Request $request)
    {
        $query = Content::query();
        $query->wherein('content_type',[2,3,6,7]);

        if ($request->get('content_type')) {
            $query->where('content_type','LIKE','%'.$request->get('content_type').'%');

        }
        $slider = $query->orderBy('id','DESC')->paginate(100);
        $categorySort = Content::orderby('sort', 'ASC')->where('content_type',2)->get();

        $categorySort2 = Content::orderby('sort', 'ASC')->where('content_type',6)->get();
        $categorySort3 = Content::orderby('sort', 'ASC')->where('content_type',7)->get();
        $categorySort4 = Content::orderby('sort', 'ASC')->where('content_type',3)->get();
        return View('admin.slider.index')
            ->with('categorySort', $categorySort)
            ->with('categorySort2', $categorySort2)
            ->with('categorySort3', $categorySort3)
            ->with('categorySort4', $categorySort4)
            ->with('slider', $slider);
    }
    public function getAddSlider()
    {
        return View('admin.slider.add');

    }

    public function postAddSlider(Request $request)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            $pathMain = "assets/uploads/content/sli";
            $extensionf = $request->file('image')->getClientOriginalName();
            $fileName =mt_rand(100, 999)."$extensionf";
            $request->file('image')->move($pathMain, $fileName);
            $input['image'] = $fileName;
        }

        $slider = Content::create($input);
        if ($slider->url == null){
            $slider->update([
                'url' => 'banner/'.$slider->id,
            ]);
        }
        return Redirect::action('App\Http\Controllers\Admin\SliderController@getSlider');
    }

    public function getEditSlider($id)
    {
        $data = Content::orderBy('id','DESC')->find($id);
        return View('admin.slider.edit')
            ->with('data', $data);
    }

    public function postEditSlider($id, Request $request)
    {
        $input = $request->all();

        $content = Content::find($id);
        if ($request->hasFile('image')) {
            File::delete('assets/uploads/content/sli/' . $content->image);
            $pathMain = "assets/uploads/content/sli";
            $extension = $request->file('image')->getClientOriginalName();
            if (true) {
                $fileName =mt_rand(100, 999)."$extension";
                $request->file('image')->move($pathMain, $fileName);
                $input['image'] = $fileName;
            } else {
                return Redirect::back()->with('error', 'فایل ارسالی صحیح نیست.');
            }
        } else {
            $input['image'] = $content->image;
        }
        $content->update($input);
       
        return Redirect::action('App\Http\Controllers\Admin\SliderController@getSlider');
    }
    public function getDeleteSlider($id)
    {

        $content = Content::find($id);
        File::delete('assets/uploads/content/sli/' . $content->image);
        $array = array($content);
        $serialized_array = serialize($array);

        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$content->id);
        Content::destroy($id);

        return Redirect::action('App\Http\Controllers\Admin\SliderController@getSlider');

    }

    public function postDeleteSlider(Request $request)
    {
        if (Content::destroy($request->get('deleteId'))) {
            return Redirect::back()
                ->with('success', 'کدهای مورد نظر با موفقیت حذف شدند.');
        }

    }
    public function postSort(Request $request)
    {

        if ($request->get('update') == "update") {
            $count = 1;
            if ($request->get('update') == 'update') {
                foreach ($request->get('arrayorder') as $idval) {

                    $category = Content::find($idval);
                    $category->sort = $count;
                    $category->save();
                    $count++;
                }
                echo 'با موفقیت ذخیره شد.';
            }
        }
    }
  
}
