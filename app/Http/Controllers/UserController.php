<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user');
    }

    public function changeName(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255'
        ]);
        if($validator->fails()){
            return redirect(route('user'))
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::where('id', Auth::id())->first();
        $user->name = $request->input('name');
        $user->save();
        $request->session()->flash('success', 'Nom modifié avec succès!');
        return redirect(route('user'));
    }
    
    public function changeEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255'
        ]);
        if($validator->fails()){
            return redirect(route('user'))
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::where('id', Auth::id())->first();
        $user->email = $request->input('email');
        $user->save();
        $request->session()->flash('success', 'Adresse mail modifié avec succès!');
        return redirect(route('user'));
    }
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|max:255'
        ]);
        if($validator->fails()){
            return redirect(route('user'))
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::where('id', Auth::id())->first();
        $user->password = Hash::make($request->input('password'));
        $user->save();
        $request->session()->flash('success', 'Mot de passe modifié avec succès!');
        return redirect(route('user'));
    }
    public function changeAvatar(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('img'), $imageName);
        $user = User::where('id', Auth::id())->first();
        $user->image = $imageName;
        $user->save();
        $request->session()->flash('success', 'Avatar modifié avec succès!');
        return redirect(route('user'));
    }

}
