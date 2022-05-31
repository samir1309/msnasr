<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\DriveLoginRequest;
use App\Model\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        $password = bcrypt('secret');
        return view('auth.logins');

    }
    public function postLogin(AdminRequest $request)
    {

        $input = $request->all();
        $login = Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'admin' => true,
        ]);

        if ($login) {
            alert()->success('به پنل مدیریت خوش آمدید', 'کاربر عزیز')->persistent('اکی');
            return redirect('/admin')->with('success', 'خوش آمدید');
        } else {
           
            return redirect('admin/login');
             alert()->error('اطلاعات وارد شده اشتباه میباشد', 'کاربر عزیز')->persistent('اکی');
        }
    }
}
