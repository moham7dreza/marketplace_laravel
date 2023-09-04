<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserService
{
    public function register($request)
    {
        $user = User::query()->where('email', $request->email)->first();
        if (empty($user)) {
            $user = $this->store($request);
        }
        $token = $user->createToken($user->name)->accessToken;
        $user->update(['remember_token' => $token]);
        auth()->login($user);
        return $user;
    }

    private function query(): Builder
    {
        return User::query();
    }

    public function store($request)
    {
        return $this->query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }
}
