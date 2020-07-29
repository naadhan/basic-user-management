<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'user']);
    }

    public function index()
    {
        return view('user.index');
    }

    public function edit()
    {
        return view('user.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'password' => ['nullable','min:8', 'confirmed'],
        ]);

        $imageName = '';
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $validated = $request->validate([
                    'name' => 'string|max:40',
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
            }
            if(!$imageName) {
                abort(500, 'Could not upload image');
            }
        }

        $user = User::findOrFail(\Auth::id());
        $userData = [
            'name' => $request->name,
            'address' => $request->address,
            'photo' => $imageName ? $imageName : $user->photo,
        ];
        if(!empty($request->password)) {
            $userData['password'] = Hash::make($request->password);
        }
        $user->fill($userData);

        $user->save();
        return redirect()->route('user');
    }
}
