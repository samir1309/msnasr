@extends("layouts.admin.master")
@section('title','ویرایش محصول جدید')
@section('content')
<form method="post"  action="{{URL::action('App\Http\Controllers\Admin\CategoryController@postEditCategory' , $data->id)}}" enctype="multipart/form-data"  >
@include('admin.category.form')
</form>
@endsection