<?php

namespace App\Http\Controllers;

use App\Models\PosUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\PngEncoder;
use Intervention\Image\ImageManager;

class UserController extends Controller
{
    /**
     * Display all user accounts.
     */
    public function index()
    {
        $users = PosUser::orderBy('id')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Display the create user form.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:pos_users,username',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:pos_users,email',
            'role' => 'nullable|string|max:100',
        ]);

        PosUser::create([
            'user_code' => 'U-' . strtoupper(Str::uuid()),
            'username' => $validated['username'],
            'name' => $validated['full_name'],
            'email' => $validated['email'],
            'role' => $validated['role'] ?? 'Cashier',
            'status' => 'Active',
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User account created successfully!');
    }

    /**
     * Display the edit user form.
     */
    public function edit(PosUser $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update an existing user and optionally replace their avatar.
     */
    public function update(Request $request, PosUser $user)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:pos_users,username,' . $user->id,
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:pos_users,email,' . $user->id,
            'role' => 'nullable|string|max:100',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $data = [
            'username' => $validated['username'],
            'name' => $validated['full_name'],
            'email' => $validated['email'],
            'role' => $validated['role'] ?? $user->role,
        ];

        if ($request->hasFile('avatar')) {
            $manager = new ImageManager(new Driver());

            $image = $manager->decode($request->file('avatar'));

            $image->cover(300, 300);

            $filename = 'avatars/' . Str::uuid() . '.png';

            $encodedImage = $image->encode(new PngEncoder());

            Storage::disk('public')->put($filename, (string) $encodedImage);

            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $data['avatar'] = $filename;
        }

        $user->update($data);

        return redirect()
            ->route('users.index')
            ->with('success', 'User account updated successfully!');
    }
}
