<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::query()
            ->role('Petugas')
            ->orderBy('namaLengkap')
            ->paginate(10);

        return view('dashboard.users.index', compact('petugas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'namaLengkap' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Password::defaults()],
        ]);

        $user = User::create([
            'username' => $request->username,
            'alamat' => $request->alamat,
            'namaLengkap' => $request->namaLengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('Petugas');

        return back()->with('message', 'Data petugas berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'namaLengkap' => ['required', 'string', 'max:255'],
        ]);

        $user->update($data);

        return back()->with('message', 'Data petugas berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('message', 'Data petugas berhasil dihapus!');
    }
}
