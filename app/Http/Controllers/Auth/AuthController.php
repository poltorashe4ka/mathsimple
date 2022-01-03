<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/home';

    public function username()
    {
        return 'name';
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' =>'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    public function postRegister(Request $request)
    {
        $validator =$this->validate(request(), [
            'name' =>'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        if (!$validator){
            return redirect()->back()->withErrors(['msg', 'The Message']);
        }
        $request['role'] = 1;
        $request['password'] = bcrypt($request['password']);
        $user = new User();
        $user->fill($request->only($user->getFillable()));
        $user->save();
        auth()->login($user);

        return redirect('/home');
   }

   public function getLogout(){
       auth()->logout();
       return redirect('/');
   }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/home');
        }

        return back()->withErrors([
            'email' => 'Неверные данные',
        ]);
    }
    public function update(Request $request)
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        return back()->with('Данные сохранены');
    }

}
