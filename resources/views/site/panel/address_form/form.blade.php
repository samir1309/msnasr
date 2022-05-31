<form  class="m-0" method="post" action="{{URL::action('App\Http\Controllers\Panel\PanelController@postEditAddress',$address->id)}}"
       enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row w-100 m-0">
        <div class="col-lg-4 p-1">
            <div class="form-floating">
                <input type="text" class="form-control" name="transferee_name" value="{{$address->transferee_name}}" placeholder="نام گیرنده"/>
                <label for="floatingSelect">
                    نام گیرنده<span class="text-danger">*</span>
                </label>
            </div>
        </div>
        <div class="col-lg-4 p-1">
            <div class="form-floating">
                <input type="text" class="form-control" name="transferee_mobile" value="{{$address->transferee_mobile}}" placeholder="شماره گیرنده"/>
                <label for="floatingSelect">
                    شماره گیرنده<span class="text-danger">*</span>
                </label>
            </div>
        </div>
        <div class="col-lg-4 p-1">
            <div class="form-floating">
                <input type="text" class="form-control" name="name" value="{{$address->name}}" placeholder="نام آدرس"/>
                <label for="floatingSelect">
                    نام آدرس<span class="text-danger">*</span>
                </label>
            </div>
        </div>
        <div class="col-lg-4 p-1">
            <div class="form-floating">
                <select name="state_id" class="form-select" id="floatingSelect"
                        aria-label="Floating label select example" v-model="selectedState{{$address->id}}" @change="getEditCities(selectedState{{$address->id}})" required>
                    <option value=""> انتخاب استان </option>
                    @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">
                    استان<span class="text-danger">*</span>
                </label>
            </div>
        </div>
        <div class="col-lg-4 p-1">
            <div class="form-floating">
                <select class="form-select" id="floatingSelect"
                        aria-label="Floating label select example" v-model="selectedCity{{$address->id}}"  name="city_id" required>
                    <option value="">انتخاب شهر </option>
                    <option v-for="city in cities" :value="city.id">@{{city.name}}</option>
                </select>
                <label for="floatingSelect">
                    شهر<span class="text-danger">*</span>
                </label>
            </div>
        </div>

        <div class="col-sm-8 p-1">
            <div class="form-floating">
								<textarea class="form-control" placeholder="نشانی پستی" id="floatingTextarea" id="location" name="location" required
                                          style="height:auto !important">{{$address->location}}</textarea>
                <label for="floatingTextarea">
                    نشانی پستی<span class="text-danger">*</span>
                </label>
            </div>
        </div>
        <div class="col-sm-4  p-1">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingPassword" name="postal_code" value="{{$address->postal_code}}"
                       placeholder="کد پستی">
                <label for="floatingPassword">
                    کد پستی<span class="text-danger">*</span>
                </label>
            </div>
            <small>
                کد پستی باید ۱۰ رقم و بدون خط تیره باشد
            </small>
        </div>
        <div class="col-sm-12 text-end p-1">
            <button type="submit" class="btn btn-success">
                تایید و ثبت ارسال
            </button>
        </div>
    </div>
</form>
