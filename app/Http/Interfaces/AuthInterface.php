<?php

namespace App\Http\Interfaces;

interface AuthInterface
{

    public function loginPage();
    public function login($request);
    public function logout();
    public function restPasswordPage();
    public function restPassword($request);
    public function restPasswordConfirmPage();
    public function restPasswordConfirmAction($request);
    public function newPassword();
    public function newPasswordAction($request);
}
