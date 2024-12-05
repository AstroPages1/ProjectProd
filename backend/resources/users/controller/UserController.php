<?php
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;


function index()
{
    $users = User::all();
    return response()->json($users);
}

function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    $user->assignRole('user'); // Atribuir role ao novo usuário
    return response()->json($user, 201);
}

function show(User $user)
{
    return response()->json($user);
}

function update(Request $request, User $user)
{
    $user->update($request->all());
    return response()->json($user);
}

function destroy(User $user)
{
    $user->delete();
    return response()->json(null, 204);
}
