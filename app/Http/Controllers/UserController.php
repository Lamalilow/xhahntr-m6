<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegistrationValidation;
use App\Http\Requests\User\EditUserValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mockery\Matcher\HasKey;

class UserController extends Controller
{
    /**
     * Форма авторизации
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function loginView()
    {
        return view('users.login');
    }

    /**
     * Получение данных с формы авторизации через POST
     * @param LoginValidation $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginPost(LoginValidation $request)
    {
        if(Auth::attempt($request->validated())){
            $request->session()->regenerate();
            return back()->with(['success' => 'true']);
        }
        return back()->withErrors(['auth'=>'Логин или пароль неверный']);
    }

    /**
     * Форма регистрации
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function registrationView()
    {
        return view('users.registration');
    }

    /**
     * Получение данных с формы регистрации через POST
     * @param RegistrationValidation $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registrationPost(RegistrationValidation $request)
    {
        $requests = $request->validated();
        $requests['password'] = Hash::make($requests['password']);
        User::create($requests);
        return redirect()->route('login')->with(['register' => true]);
    }


    public function cabinet()
    {
        return view('users.cabinet');
    }
    public function cabinetEdit()
    {
        return view('users.edit');
    }
    public function cabinetEditPost(EditUserValidation $request)
    {
         $arr = $request->validated();
         if(!$arr['password']) unset($arr['password']);
         else $arr['password'] = Hash::make($arr['password']);
         $user = Auth::user();
         $user->update($arr);
         return back()->with(['success' => true]);

    }

    /**
     * Выход из сессии пользователя
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect()-> route('login');
    }
}
