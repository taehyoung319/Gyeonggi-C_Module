<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function mainIndex()
    {
        return view('index');
    }

    public function joinPage()
    {
        if(Auth()->user()) return redirect(route('mainIndex'))->withErrors('로그인한 회원은 접근 불가능 합니다.');

        return view('user.join');
    }

    public function joinAction(Request $request)
    {
        $input = $request->validate([
            'id' => 'required|unique:users',
            'pw' => 'required',
            'name' => 'required|unique:users',
        ],
        [
            'id.required' => '아이디는 필수값입니다.',
            'pw.required' => '비밀번호는 필수값입니다.',
            'name.required' => '이름은 필수값입니다.',
            'id.unique' => '아이디가 중복됩니다.',
            'name.unique' => '이름이 중복됩니다.',
        ]);

        User::create($input);

        return redirect(route('mainIndex'))->withErrors('성공적으로 회원가입하셨습니다.');
    }

    public function loginPage()
    {
        if(Auth()->user()) return redirect(route('mainIndex'))->withErrors('로그인한 회원은 접근 불가능 합니다.');

        return view('user.login');
    }

    public function loginAction(Request $request)
    {
        $user = User::find($request->id);

        if(!$user && $user->pw == $request->pw) return back()->withErrors('아이디 또는 비밀번호를 다시 확인해주세요.');

        Auth::login($user);

        return redirect(route('mainIndex'))->withErrors('성공적으로 로그인하셨습니다.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('mainIndex'))->withErrors('성공적으로 로그아웃하셨습니다.');
    }

}
