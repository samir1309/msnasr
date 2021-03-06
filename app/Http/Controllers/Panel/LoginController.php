<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Library\Help;
use App\Library\Helper;
use App\Models\Bell;
use App\Models\Order;
use App\User;
use SweetAlert;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Kavenegar\KavenegarApi;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use SoapClient;
class LoginController extends Controller
{

//    public function getLogin()
//    {
//        $check=Auth::check();
//
//        if ($check)
//        {
//            return redirect('/panel/dashboard')->with('success', 'خوش آمدید');
//        } else {
//            return view('site.auth.login');
//        }
//
//    }
    /////==============Pass===========================================
    public function getPassword(Request $request)
    {
       
		
		     $product_id = @$request->product_id;
        $user = \App\User::where('mobile',$request['mobile'])->first();
	
		
        if($request->has('order')){
            return view('site.auth.pass')
                ->with('user',$user)
                ->with('order',1)
                ->with('product_id', $product_id);
        }else{

            return view('site.auth.pass')
                ->with('user',$user)
                ->with('product_id', $product_id);
        }


    }
    public function postPassword(Request $request)
    {
        set_time_limit(30000000000);

        if ($request['mobile'] != null){
            $users = \App\User::where('mobile',Helper::persian2LatinDigit($request->get('mobile')))->first();
		
            if($users != null) {

                if ($users->mobile_confirm == 1) {
                    $new = random_int(100000, 999999);
                    $users['temp_password'] = $new;

                    $users->save();

                    try {
                        $api = new KavenegarApi("6D5A4158486B656A69733065616C366343656C32614243386F614E6F665244566C474F4442766F57756A553D");
                        $receptor = $users->mobile;
                        $token = $new;
                        $token2 = "";
                        $token3 = "";
                        $template = "password";
                        $type = "sms";//sms | call
                        $result = $api->VerifyLookup($receptor, $token, $token2, $token3, $template, $type);
                    } catch (ApiException $e) {
                        \Log::info($e->errorMessage());
                    } catch (HttpException $e) {
                        \Log::info($e->errorMessage());
                    }

                    if(@$request->has('order')) {
                        return redirect('/panel/login-pass/' . $users->mobile . '?order=1')
                            ->with('user', $users);
					alert()->success('با رمز عبور ارسال شده به شماره همراهتان وارد پنل کاربری شوید.', 'کاربر عزیز')->persistent('اکی');

                    }
                    elseif(@$request->has('reminder_id')){
                        return redirect('/panel/login-pass/' . $users->mobile.'?reminder_id='.@$request->reminder_id)
                            ->with('user',$users);
								alert()->success('با رمز عبور ارسال شده به شماره همراهتان وارد پنل کاربری شوید.', 'کاربر عزیز')->persistent('اکی');
                    }
                    else{
                        return redirect('/panel/login-pass/' . $users->mobile)
                            ->with('user',$users);
							alert()->success('با رمز عبور ارسال شده به شماره همراهتان وارد پنل کاربری شوید.', 'کاربر عزیز')->persistent('اکی');
                    }

                }
                else {


                    $code= random_int(100000, 999999);
                    $users['confirm_code'] = $code;
                    $users->save();
                    try{
                        $api = new KavenegarApi("6D5A4158486B656A69733065616C366343656C32614243386F614E6F665244566C474F4442766F57756A553D");
                        $receptor = $users->mobile;
                        $token = $code;
                        $token2 = "";
                        $token3 = "";
                        $template = "verify";
                        $type = "sms";//sms | call
                        $result = $api->VerifyLookup($receptor,$token,$token2,$token3,$template,$type);
                    }
                    catch(ApiException $e){
                        \Log::info($e->errorMessage());
                    }
                    catch(HttpException $e){
                        \Log::info($e->errorMessage());
                    }
                }
				alert()->success('کد تایید ارسال شده به شماره موبایلتان را ارسال کنید.', 'کاربر عزیز')->persistent('اکی');
                return redirect('panel/confirm/'.$users->mobile);
            }
            else
            {	alert()->error('شما در سایت عضو نیستید لطفا ثبت نام کنید.', 'کاربر عزیز')->persistent('اکی');
                return redirect()->back();
            }
        }
        else{
			alert()->error('لطفا شماره خود را وارد کنید.', 'کاربر عزیز')->persistent('اکی');
            return redirect()->back();
        }
    }

    public function postRePassword($mobile)
    {
        set_time_limit(30000000000);

        $users = \App\User::where('mobile',$mobile)->first();

        if($users)
        {
            $new = random_int(100000, 999999);
            $users['temp_password'] = $new ;

            $users->save();
            try{
                $api = new KavenegarApi("6D5A4158486B656A69733065616C366343656C32614243386F614E6F665244566C474F4442766F57756A553D");
                $receptor = $users->mobile;
                $token = $new;
                $token2 = "";
                $token3 = "";
                $template = "password";
                $type = "sms";//sms | call
                $result = $api->VerifyLookup($receptor,$token,$token2,$token3,$template,$type);
            }
            catch(ApiException $e){
                \Log::info($e->errorMessage());
            }
            catch(HttpException $e){
                \Log::info($e->errorMessage());
            }
        }
        else
        {
            return redirect()->back()->with('error',' شما در سایت عضو نیستید لطفا ثبت نام کنید');
        }
        return redirect()->back()->with('success','با رمز عبور ارسال شده به شماره همراهتان وارد پنل کاربری شوید.');
    }
    /////==============Login With Pass===========================================
    public function getLoginWpass()
    {
        return view('site.auth.loginwithpass');
    }
    public function getPanelLogin(Request $request)
    {

        $product_id = @$request->product_id;
        $reminder_id = @$request->reminder_id;
        if($request->has('order')){
            return view('site.auth.login')
                ->with('product_id', $product_id)
                ->with('reminder_id', $reminder_id)
                ->with('order', 1);
				alert()->info('برای ادامه فرآیند خرید وارد پنل کاربری شوید.', 'کاربر عزیز')->persistent('اکی');
             
        }elseif($request->has('address')){
            return view('site.auth.login')
                ->with('product_id', $product_id)
                ->with('reminder_id', $reminder_id)
                ->with('order', 1);
				 alert()->info('برای انتخاب آدرس ابتدا وارد پنل کاربری خود شوید.', 'کاربر عزیز')->persistent('اکی');
               
        }else{
            return view('site.auth.login')
                ->with('product_id', $product_id)
                ->with('reminder_id', $reminder_id);
        }
    }

    /////==============Login Panel===========================================
    public function postPanelLogin(Request $request)
    {
        set_time_limit(30000000000);

        $input = $request->all();
        $user = User::where('mobile',Helper::persian2LatinDigit($request->get('mobile')))->first();

        if ($user->mobile_confirm == 0){

            return redirect('panel/confirm/'.$user->mobile.'?reminder_id='.@$request->reminder_id)->with('success', 'لطفا شماره خود را تایید کنید');
        }

        if ($user->temp_password == $request->get('temp_password')){
            Auth::loginUsingId($user->id);
            setcookie('mobileLoginCookie',$request->get('mobile') , time()+(60*60*24*180));
            $user->update([
                'last_login'=> Carbon::Now(),
            ]);
            $currentOrder = Order::cookieUser()->currentOrder()->first();
            $currentOrders = Order::where('user_id',Auth::id())->currentOrder()->get();
            if($currentOrder){
                foreach($currentOrders as $row){
                    $x = Order::find($row->id);
                    $x->update(['order_status_id'=>10]);
                }
                $currentOrder->update([
                    'user_id'=>Auth::id()
                ]);
            }

            if(@$request->has('order')) {
                return redirect('checkout/')->with('success', ' ورود شما با موفقیت انجام شد, به خرید خود ادامه بدهید.');
            }
            elseif(@$request->get('reminder_id')){

                $check = Bell::where('user_id',auth()->user()->id)->where('product_id',$input['reminder_id'])->whereStatus('0')->first();
                if (!$check){
                    $bell = Bell::create([
                        'user_id' => auth()->user()->id,
                        'product_id' => $input['reminder_id']
                    ]);
                }
                else{
                    return redirect('pro/'.$input['reminder_id'])->with('error', 'شما قبلا برای این محصول درخواست ثبت کرده اید');
                }



                return redirect('pro/'.$request->reminder_id)->with('success', 'در صورت موجود شدن محصول به شما اطلاع داده خواهد شد');
            }else{
                return redirect('panel/dashboard');
            }
        }
        else {
            return redirect('/panel/login')->with('error', 'رمز عبور اشتباه است');
        }



    }
    /////==============Login===========================================
    public function postLogin(Request $request)
    {
        set_time_limit(30000000000);

        $input = $request->all();
        $login = request()->input('username');

        if(is_numeric(Helper::persian2LatinDigit($login))){
            $login = Auth::attempt([
                'mobile' => Helper::persian2LatinDigit($login),
                'password' =>Helper::persian2LatinDigit($request->get('password')),
                'mobile_confirm' => true,
                'status' => true,
            ]);
            $user = User::whereMobile($request->get('username'))->first();
        }

        elseif (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $login = Auth::attempt([
                'email' => $login,
                'password' =>Helper::persian2LatinDigit($request->get('password')),
                'mobile_confirm' => true,
                'status' => true,
            ]);
            $user = User::where('email',$request->get('username'))->first();
        }


        if ($login) {
            setcookie('mobileLoginCookie',$request->get('mobile') , time()+(60*60*24*180));
            $user->update([
                'last_login'=> Carbon::Now(),
            ]);
            if($request->get('reminder_id')){
                \Log::info('heyyyyy');
                \Log::info($request->get('reminder_id'));

                $check = Bell::where('user_id',auth()->user()->id)->where('product_id',$input['reminder_id'])->whereStatus('0')->first();
                if (!$check){
                    $bell = Bell::create([
                        'user_id' => auth()->user()->id,
                        'product_id' => $input['reminder_id']
                    ]);
                }
                else{
					 alert()->error('شما قبلا برای این محصول درخواست ثبت کرده اید', 'کاربر عزیز')->persistent('اکی');
                    return redirect('pro/'.$input['reminder_id']);
                }
				 alert()->error('در صورت موجود شدن محصول به شما اطلاع داده خواهد شد', 'کاربر عزیز')->persistent('اکی');
                return redirect('pro/'.$input['reminder_id']);
            }

            return redirect('/panel/dashboard');
			alert()->success('خوش آمدید', 'کاربر عزیز')->persistent('اکی');
        } else {
            return redirect('/panel/register');
			 alert()->error('شما ثبت نام نکرده اید', 'کاربر عزیز')->persistent('اکی');
        }
    }
    /////==============Register===========================================
    public function getRegister(Request $request)
    {
        $gender = [

            '0' => 'خانم',
            '1' => 'آقا',
        ];

        $reminder_id = @$request->reminder_id;
        $product_id = @$request->product_id;
        if($request->has('order')){
            return view('site.auth.register')
                ->with('order', 1)
                ->with('product_id', $product_id)
                ->with('gender', $gender);
        }else{
            return view('site.auth.register')
                ->with('product_id', $product_id)
                ->with('reminder_id', $reminder_id)
                ->with('gender', $gender);
        }

    }

    public static function  is_english($str){
        if (strlen($str) != strlen(utf8_decode($str))) {
            return false;
        } else {
            return true;
        }
    }

    protected function postRegister(Request $request)
    {

        set_time_limit(30000000000);


        if(self::is_english($request->name)){
            return redirect()->back()->with('error', 'نام خود را به فارسی بنویسید');

        }
      
        $input = $request->all();
        if ($request->mobile == null && $request->email == null) {
            return redirect()->back()->with('error', 'یا شماره موبایل یا ایمیل را وارد کنید');
        }
      
   $code = random_int(10000, 99999);
        $password = bcrypt($request['password']);

        $users = User::create([
            'name' => $input['name'],
            'gender' => $input['gender'],
            'email' => @$input['email'],
            'mobile' => Helper::persian2LatinDigit(@$input['mobile']),
            'confirm_code' => $code,
            'password' => $password,
        ]);
        if ($request->mobile != null){

            $code= random_int(100000, 999999);
            $users['confirm_code'] = $code;
            $users->save();
            try {
                $api = new KavenegarApi("6D5A4158486B656A69733065616C366343656C32614243386F614E6F665244566C474F4442766F57756A553D");
                $receptor = $users->mobile;
                $token = $code;
                $token2 = "";
                $token3 = "";
                $template = "verify";
                $type = "sms";//sms | call
                $result = $api->VerifyLookup($receptor, $token, $token2, $token3, $template, $type);
            } catch (ApiException $e) {
                \Log::info($e->errorMessage());
            } catch (HttpException $e) {
                \Log::info($e->errorMessage());
            }

            if($request->has('order')){
				
                return redirect('panel/confirm/'.$users->mobile.'?product_id='.@$request->product_id.'&order=1')->with('success', 'کد تایید ارسال شده به شماره موبایلتان را ارسال کنید');
            }else{
                return redirect('panel/confirm/'.$users->mobile.'?product_id='.@$request->product_id)->with('success', 'کد تایید ارسال شده به شماره موبایلتان را ارسال کنید');
            }
        }
        elseif($request->email != null){
            Mail::raw('کد تایید:'.$code , function ($message) use ($input)  {
                $message->from("samiraazemati@gmail.com"  , 'From:admin');
                $message->to($input['email'])->subject('کد تایید'.'  To:'.$input['email']);
            });

            if($request->has('order')) {
                return redirect('panel/confirm/'.$users->email.'&order=1')->with('success', 'کد تایید ارسال شده به شماره ایمیلتان را ارسال کنید');
            }
            elseif(@$request->get('reminder_id')){
				 alert()->success('در صورت موجود شدن محصول به شما اطلاع داده خواهد شد', 'کاربر عزیز')->persistent('اکی');
                return redirect('pro/'.$request->reminder_id);
            }else{
				 alert()->success('کد تایید ارسال شده به شماره ایمیلتان را ارسال کنید', 'کاربر عزیز')->persistent('اکی');
                return redirect('panel/confirm/'.$users->email);
            }
        }
    }
    /////==============Confirm===========================================
    public function getConfirm($mobile,Request $request)
    {
        $product_id = @$request->product_id;
        $reminder_id = @$request->reminder_id;
        if($request->has('order')) {
            return view('site.auth.confirm')->with('product_id', $product_id)->with('mobile', $mobile)
                ->with('order', 1);
        }
        elseif($request->has('reminder_id')){
            return view('site.auth.confirm')->with('reminder_id', $reminder_id)->with('mobile',$mobile)
                ;
        }else{
            return view('site.auth.confirm')->with('product_id', $product_id)->with('mobile',$mobile);
        }
    }
    public function postConfirm(Request $request)
    {
        set_time_limit(30000000000);

        $input = $request->all();

        $user = User::where('confirm_code', Helper::persian2LatinDigit($request->get('confirm_code')))->first();

        if ($user) {
            $user->mobile_confirm = true;
            $user->status = true;
            $user->save();
            $user->assignRole([4]);
            Auth::loginUsingId($user->id);

            $currentOrder = Order::cookieUser()->currentOrder()->first();
            $currentOrders = Order::where('user_id',Auth::id())->currentOrder()->get();
            if($currentOrder){
                foreach($currentOrders as $row){
                    $x = Order::find($row->id);
                    $x->update(['order_status_id'=>10]);
                }
                $currentOrder->update([
                    'user_id'=>Auth::id()
                ]);
            }

            if(@$request->has('order')) {
				alert()->success('ثبت نام شما با موفقیت انجام شد, به خرید خود ادامه بدهید.', 'کاربر عزیز')->persistent('اکی');
                return redirect('checkout/');
            }
            elseif($request->get('reminder_id')){
				alert()->success('در صورت موجود شدن محصول به شما اطلاع داده خواهد شد', 'کاربر عزیز')->persistent('اکی');
                return redirect('pro/'.$request->reminder_id);

            }else{
                return redirect('panel/dashboard');
            }

        } else {
			alert()->error('کد وارد شده صحیح نمی باشد', 'کاربر عزیز');
            return redirect()->back();
        }
    }
    public function postReCon(Request $request)
    {
        set_time_limit(30000000000);

        $product_id = @$request->product_id;
        $input = $request->all();
        $users = User::where('mobile',$input['field'])->orWhere('email',$input['field'])->first();
        if($users)
        {
            $code = random_int(100000, 999999);
            $users['confirm_code'] = $code ;
            $users->save();
            if(is_numeric(Helper::persian2LatinDigit($input['field']))){

                $code= random_int(100000, 999999);
                $users['confirm_code'] = $code;
                $users->save();
                try{
                    $api = new KavenegarApi("6D5A4158486B656A69733065616C366343656C32614243386F614E6F665244566C474F4442766F57756A553D");
                    $receptor = $users->mobile;
                    $token = $code;
                    $token2 = "";
                    $token3 = "";
                    $template = "verify";
                    $type = "sms";//sms | call
                    $result = $api->VerifyLookup($receptor,$token,$token2,$token3,$template,$type);
                }
                catch(ApiException $e){
                    \Log::info($e->errorMessage());
                }
                catch(HttpException $e){
                    \Log::info($e->errorMessage());
                }
            }

            elseif (filter_var($input['field'], FILTER_VALIDATE_EMAIL)) {
                Mail::raw('کد تایید:'.$code , function ($message) use ($input)  {
                    $message->from("admin@kaajshop.com"  , 'From:admin');
                    $message->to($input['field'])->subject('کد تایید'.'  To:'.$input['field']);
                });
            }


        }
        else
        {
            return redirect()->back()->with('error',' شما در سایت عضو نیستید لطفا ثبت نام کنید');
        }
        return redirect()->back()->with('success', 'لطفا شماره خود را تایید کنید');

    }
    /////==============Logout===========================================
    public function getlogout()
    {

        Auth::logout();
				 alert()->success('به امید دیدار مجدد شما در فروشگاه عینک پارسیــا', 'کاربر عزیز')->persistent('اکی');

        return redirect('/');
    }



}
