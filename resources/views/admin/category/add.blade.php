@extends("layouts.admin.master")
@section('title','اضافه کردن محصول جدید')
@section('content')
<form method="post"  action="{{URL::action('App\Http\Controllers\Admin\CategoryController@postAddCategory')}}" enctype="multipart/form-data"  >
@include('admin.category.form')
</form>
@endsection