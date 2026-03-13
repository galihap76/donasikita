<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index');
    }

    public function accountProcess(Request $request)
    {

        $rules = [
            'name' => 'required|max:50'
        ];

        if ($request->input('password') != null) {
            $rules['password'] = 'min:10|confirmed';
        }

        if ($request->input('password') == null && $request->input('password_confirmation') != null) {
            $rules['password'] = 'required';
        }

        $validator = Validator::make(
            $request->all(),
            $rules,
            [
                'name.required' => 'Nama lengkap tidak boleh kosong.',
                'name.max' => 'Nama lengkap tidak boleh melebii batas :max karakter.',
                'password.required' => 'Password tidak boleh kosong.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
                'password.min' => 'Password harus memiliki setidaknya :min karakter.'
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $user_id = Auth::user()->id;

            $user = User::findOrfail($user_id);
            $user->name = trim($request->input('name'));

            if (!empty($request->input('password')) && !empty($request->input('password_confirmation'))) {

                $user->password = Hash::make($request->input('password'));
            }

            $user->save();

            Session::flash('success', 'Berhasil memperbarui akun profil.');
            return redirect('/account');
        }
    }
}
