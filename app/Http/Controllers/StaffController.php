<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class StaffController extends Controller
{
    public function index()
    {
        $staff = User::where('business_id', auth()->user()->business_id)
            ->where('role', 'staff')
            ->latest()
            ->get();
        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['nullable', 'string', 'max:20'],
        ]);

        User::create([
            'business_id' => auth()->user()->business_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 'staff',
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff berhasil ditambahkan');
    }

    public function edit(User $staff)
    {
        if ($staff->business_id !== auth()->user()->business_id || $staff->role !== 'staff') {
            abort(403);
        }
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, User $staff)
    {
        if ($staff->business_id !== auth()->user()->business_id || $staff->role !== 'staff') {
            abort(403);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $staff->id],
            'phone' => ['nullable', 'string', 'max:20'],
        ]);

        $data = $request->only(['name', 'email', 'phone']);

        if ($request->filled('password')) {
            $request->validate(['password' => ['confirmed', Rules\Password::defaults()]]);
            $data['password'] = Hash::make($request->password);
        }

        $staff->update($data);

        return redirect()->route('staff.index')->with('success', 'Staff berhasil diupdate');
    }

    public function destroy(User $staff)
    {
        if ($staff->business_id !== auth()->user()->business_id || $staff->role !== 'staff') {
            abort(403);
        }
        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'Staff berhasil dihapus');
    }
}
