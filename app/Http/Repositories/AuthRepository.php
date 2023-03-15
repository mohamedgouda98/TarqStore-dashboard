<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\AuthInterface;
use App\Models\Admin;
use App\Models\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AuthRepository implements AuthInterface
{
    public function loginPage()
    {
        return view('Auth.login');
    }

    public function login($request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials))
        {
            return redirect(route('admin.home'));
        }
        Alert::toast('wrong email or password');

        return redirect()->back();
    }

    public function logout()
    {
       Auth::logout();
       Session::flush();

       return redirect(route('login'));
    }

    public function restPasswordPage()
    {
       return view('Auth.reset_password');
    }

    public function restPassword($request)
    {
        $resetPasswordCode = rand(0000,9999);
        $admin = Admin::where('email', $request->email)->with('resetPasswordCode')->first();

        if(!is_null($admin->resetPasswordCode))
        {
           $admin->resetPasswordCode->delete();
        }
        ResetPassword::create([
            'admin_id' => $admin->id,
            'code' => $resetPasswordCode
        ]);

        Mail::to($admin->email)->send(new \App\Mail\ResetPassword($resetPasswordCode));

        Session::put('admin_id', $admin->id);

        return redirect(route('reset_password.confirm'));
    }

    public function restPasswordConfirmPage()
    {
        return view('Auth.confirm_reset_code');
    }

    public function restPasswordConfirmAction($request)
    {
        $checkCode = ResetPassword::where([ ['code', $request->code], ['admin_id', Session::get('admin_id')]])->first();
        if($checkCode)
        {
            $checkCode->delete();
            return redirect(route('new_password.page'));
        }
        return redirect('login');
    }

    public function newPassword()
    {
        return view('Auth.new_password');
    }

    public function newPasswordAction($request)
    {
        $admin = Admin::find(Session::get('admin_id'));
        $admin->update([
            'password' => Hash::make($request->password)
        ]);
        return $this->loginPage();
    }
}
