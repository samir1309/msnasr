{{csrf_field()}}
<div class="col-md-10 mx-auto">
<div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">افزودن دسته بندی</h3>
      </div>
      <form class="form-horizontal">
	   <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="card-body">
          <div class="row col-md-12">
            <div class="form-group col-md-6">
              <label>نام دسته بندی</label>
              <input type="text" name="title" class="form-control"  placeholder="نام دسته را وارد کنید..."
              value = "@if(isset($data->title)){{$data->title}}@endif">
            </div>
            <div class="form-group col-md-6">
              <label>موقعیت عکس دسته</label>
              <input type="text" name="position" class="form-control"  placeholder="موقعیت قرارگیری را مشخص کنید..."
              value = "@if(isset($data->position)){{$data->position}}@endif">
            </div>
            <div class="form-group col-md-6">
            <select name="parent_id" id="parent_id" class="form-control">
					@foreach($categories as $key=>$item)
						<option value="{{$key}}"  @if(isset($data->parent_id) and $data->parent_id==$key) selected @endif>

      {{$item}}
            </option>
					@endforeach
				</select>
        <label>موقعیت</label>
      
          
            </div>
            <div class="form-group col-md-6">
              <label> انتخاب عکس هدر</label>
              <input type="file" class="form-control" name="header" id="exampleInputPassword1" placeholder="انتخاب فایل">
              @if(isset($data->header))
              <img src="{{asset('assets/uploads/category/'.$data->header)}}" alt="" style = "width: 150px">
              @endif
            </div>
            <div class="form-group col-md-6">
              <label>انتخاب عکس</label>
              <input type="file" class="form-control" name="cover" id="exampleInputPassword1" placeholder="انتخاب فایل">
              @if(isset($data->cover))
              <img src="{{asset('assets/uploads/category/'.$data->cover)}}" alt="" style = "width: 150px">
              @endif
            </div>
          </div>


          <div class="form-group">
          <label>متن:</label>
          <textarea name="description" type="text" rows="4" cols="5" class="form-control ckeditor" placeholder="تایپ کنید...">@if(isset($data->description)){!!$data->description!!}@endif</textarea>
          </div>
            <div class="row col-md-12">
              <div class="form-group col-md-6">
                <label>URL</label>
                <input type="tetx" name="url" class="form-control"  placeholder="وارد کردن url..."
                value = "@if(isset($data->url)){{$data->url}}@endif">
              </div>
              <div class="form-group col-md-6">
                <label>نام سئو :</label>
                <input name="title_seo" type="text" class="form-control" placeholder="تایپ کنید..."
                value = "@if(isset($data->title_seo)){{$data->title_seo}}@endif">
              </div>
            </div>
            <div class="form-group">
              <label>متن سئو :</label>
              <textarea name="description_seo" rows="5" type="text" class="form-control" placeholder="تایپ کنید...">@if(isset($data->description_seo)){{$data->description_seo}}@endif</textarea>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name='vip' value="1" @if(isset($data->vip) && $data->vip==1)checked="checked"  @endif>

                نمایش ویژه
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name='status' value="1" @if(isset($data->status) && $data->status==1)checked="checked"  @endif>

                نمایش در صفحه اصلی
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-info">ارسال</button>
        </div>
        <!-- /.card-footer -->
      </form>
</div>
</div>
