<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (auth()->check()) {
            return redirect('admin/home');
        }

        if ($request->_token == csrf_token()) {
            $username = $request->username;
            $password = $request->password;

            $credentials = [
                'username' => $username,
                'password' => $password,
            ];

            if (auth()->attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('admin/home');
            }

            return back()->with(['failed' => 'Username dan Password yang anda masukan tidak ditemukan'])->onlyInput('username');
        }

        return view('admin.login');
    }

    public function profile(Request $request)
    {
        $user = auth()->user();
        if ($request->_token == csrf_token()) {
            $validation = Validator::make($request->all(), [
                'name' => 'required',
                'username' => 'required|unique:users,username,' . $user->id
            ], [
                'name.required' => 'nama tidak boleh kosong',
                'username.required' => 'username tidak boleh kosong',
                'username.unique' => 'username telah digunakan'
            ]);

            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->withInput();
            } else {
                try {
                    User::find($user->id)->update([
                        'name' => $request->name,
                        'username' => $request->username
                    ]);

                    return redirect('admin/auth/profile')->with([
                        'success' => 'Profil berhasil diganti'
                    ]);
                } catch (\Exception $e) {
                    return redirect('auth/profile')->with([
                        'error' => $e->getMessage()
                    ]);
                }
            }
        }

        $data = [
            'user' => $user,
            'content' => 'admin.profile'
        ];

        return view('admin.layouts.index', ['data' => $data]);
    }

    public function changePassword(Request $request)
    {
        if ($request->_token == csrf_token()) {
            $validation = Validator::make($request->all(), [
                'current_password' => 'required',
                'new_password' => 'required',
                'confirm_password' => 'required|same:new_password'
            ], [
                'current_password.required' => 'password saat ini tidak boleh kosong',
                'new_password.required' => 'password baru tidak boleh kosong',
                'confirm_password.required' => 'konfirmasi password tidak boleh kosong',
                'confirm_password.same' => 'konfirmasi password harus sama dengan password baru'
            ]);

            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation);
            } else {
                $currentPassword = $request->current_password;
                $newPassword = $request->new_password;
                $user = auth()->user();
                $dbPassword = $user->password;

                if (!Hash::check($currentPassword, $dbPassword)) {
                    return redirect()->back()->with([
                        'error' => 'Password saat ini yang anda masukan tidak sesuai'
                    ]);
                }

                try {
                    $updatePassword = User::find($user->id)->update([
                        'password' => bcrypt($newPassword)
                    ]);

                    return redirect('admin/auth/change-password')->with([
                        'success' => 'Password berhasil diganti'
                    ]);
                } catch (\Exception $e) {
                    return redirect('admin/auth/change-password')->with([
                        'error' => $e->getMessage()
                    ]);
                }
            }
        }

        $data = [
            'content' => 'admin.change-password'
        ];

        return view('admin.layouts.index', ['data' => $data]);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('admin')->with(['success' => 'Anda berhasil keluar']);
    }
}
