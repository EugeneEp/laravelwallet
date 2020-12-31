<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Sms;

class UserController extends Controller
{
    public function login (UserRequest $req)
    {
        $credentials = $req->only('phone', 'password');
        $credentials['phone'] = preg_replace('/\D/', '', $credentials['phone']);

        if (Auth::attempt($credentials)) {

            $req->session()->regenerate();

            $userId = Auth::id();
            return response()->json(['success' => true], 200);
        }

        return response()->json([
            'errors' => [
                'login' => 'Телефон и пароль не совпадают.'
            ],
        ], 400);
    }

    public function registration (UserRequest $req)
    {
        $phone = preg_replace('/\D/', '', $req->input('phone'));
        $password = $req->input('password');
        $confirm = $req->input('confirm');

        if($password !== $confirm){
            return response()->json(['errors'=>[
                'confirm' => 'Пароли не совпадают',
            ]], 400);
        }

        $exist = User::where('phone', '=', $phone)->first();
        if($exist !== null){
            return response()->json(['errors'=>[
                'exist' => 'Такой пользователь уже зарегистрирован',
            ]], 400);
        }
        $sms = Sms::where([
            ['phone', '=', $phone],
            ['action', '=', 'reg'],
        ])->first();
        if($sms === null || $sms->status !== 1){
            return response()->json(['errors'=>[
                'sms' => 'Вы не подтвердили смс',
            ]], 400);
        }

        $user = new User;
        $user->phone = $phone;
        $user->setPass($password);
        $user->save();
        $this->login($req);

        return response()->json(['success' => true], 200);
    }

    public function logout (Request $req)
    {
    	Auth::logout();

        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect()->route('index');
    }

    public function profile()
    {
        $user = User::find(auth()->user()->id);
        $data = [
            'fullname'=>'',
            'passport'=>'',
            'passportIssuedAt'=>'',
        ];
        $data = json_decode($user->identity) ?? $data;
        return view('wallet.profile', [
            'data'=>$data,
        ]);
    }

    public function identity(UserRequest $req)
    {
        $fullname = $req->input('fullname');
        $passport = $req->input('passport');
        $issuedAt = $req->input('passportIssuedAt');

        $fullname = explode(' ', $fullname);

        if(sizeof($fullname) < 3){
            return response()->json(['errors'=>[
                'sms' => 'Поле ФИО заполнено некорректно',
            ]], 400);
        }

        $user = User::find(auth()->user()->id);

        $identity = [
            'fullname' => implode(' ', $fullname),
            'passport' => str_replace(' ', '', $passport),
            'passportIssuedAt' => $issuedAt,
        ];

        $user->identity = json_encode($identity, true);
        $user->save();

        return response()->json([
            'success'=>'Данные успешно обновлены',
        ], 200);
    }

    public function picture(Request $req)
    {
        $req->img->storeAs('photo', auth()->user()->id.'.png', 'public');
        return response()->json([
            'success'=>'Изображение успешно загружено',
        ], 200);
    }
}
