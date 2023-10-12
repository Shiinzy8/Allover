<?php

namespace App\Repositories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserRepository
{
    public function generateEmailToken(string $email): bool
    {
        $user = User::query()->where(['email' => $email])->first();

        if ($user) {
            $token = Str::random(64);
            $user->update([
                'email_token' => $token,
                'valid_to' => Carbon::now()->addHour(),
            ]);

            return true;
        }

        return false;
    }

    public function updatePassword(string $email, string $emailToken, string $newPassword): bool
    {
        $user = User::query()->where([
            'email' => $email,
            'email_token' => $emailToken,
        ])
            ->where('valid_to', '>', Carbon::now())
            ->first();

        // here should be email sending event

        if ($user) {
            return $user->update([
                'email_token' => null,
                'valid_to' => null,
                'password' => app('hash')->make($newPassword),
            ]);
        }

        return false;
    }
}
