<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $offices = Office::get();
        $roles = Role::get();
        return view('user.edit', compact('user', 'offices', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($user->hasRole('Super-Admin')) {
            $validatedData = $request->validate([
                'email' => ['required', 'email', 'unique:users,email,' . $user->id],
                'name' => ['required', 'string', 'max:255'],
                'office_id' => ['required', 'string', 'max:255'],
                'role' => ['required'],
            ]);
            $user->syncRoles($validatedData['role']);
        } else {
            $validatedData = $request->validate([
                'email' => ['required', 'email', 'unique:users,email,' . $user->id],
                'name' => ['required', 'string', 'max:255'],
            ]);
            $user = User::findOrFail(Auth::user()->id);
        }
        $user = $user->update($validatedData);
        return redirect()
            ->back()
            ->with('success', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()
            ->back()
            ->with('success', 'User Deleted');
    }

    public function changePassword(Request $request, User $user)
    {
        if ($user->hasRole('Super-Admin')) {
            $validatedData = $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            return redirect()
                ->back()
                ->with('success', 'Password Changed');
        } else {
            $validatedData = $request->validate([
                'oldPassword' => ['required','string', 'min:8',],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $user = User::findOrFail(Auth::user()->id);
            if (Hash::check($validatedData['oldPassword'], $user->password)) {
                $user->update([
                    'password' => Hash::make($validatedData['password']),
                ]);
                return redirect()
                    ->back()
                    ->with('success', 'Password Changed');
            } else {
                return redirect()
                    ->back()
                    ->with('error', 'Old Pasword Not matched');
            }
        }
    }
    public function profile()
    {
        $user = Auth::user();
        $offices = Office::get();
        $roles = Role::get();
        return view('user.edit', compact('user', 'offices', 'roles'));
    }
}
