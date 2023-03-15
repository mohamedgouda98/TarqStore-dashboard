<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AuthInterface;
use App\Http\Requests\PasswordConfirm;
use App\Http\Requests\ResetPasswordConfirm;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public $authInterface;
    public function __construct(AuthInterface $authInterface)
    {
        $this->authInterface = $authInterface;
    }

    public function loginPage()
    {
        return $this->authInterface->loginPage();
    }

    public function login(Request $request)
    {
        return $this->authInterface->login($request);
    }

    public function logout()
    {
        return $this->authInterface->logout();
    }

    public function restPasswordPage()
    {
        return $this->authInterface->restPasswordPage();
    }

    public function restPassword(ResetPasswordRequest $request)
    {
        return $this->authInterface->restPassword($request);
    }

    public function restPasswordConfirmPage()
    {
        return $this->authInterface->restPasswordConfirmPage();
    }

    public function restPasswordConfirmAction(ResetPasswordConfirm $request)
    {
        return $this->authInterface->restPasswordConfirmAction($request);
    }

    public function newPassword()
    {
        return $this->authInterface->newPassword();
    }

    public function newPasswordAction(PasswordConfirm $request)
    {
        return $this->authInterface->newPasswordAction($request);
    }
}
