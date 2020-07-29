<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $users = User::query()
            ->orderBy('id', 'desc')
            ->paginate(User::RECORDS_PER_PAGE);

        return view('admin.index', compact('users'));
    }

    public function statusUpdate(Request $request)
    {
        $user = User::find($request->id);
        $user->active = $user->active == 0 ? 1 : 0;
        $user->save();

        return redirect()->back();
    }
}
