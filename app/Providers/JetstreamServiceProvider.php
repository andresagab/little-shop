<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        # custom authentication guard
        Fortify::authenticateUsing(function (Request $request) {

            $user = User::query()->where('email', $request->email)->first();

            if ($user)
            {
                if ($user->is_active)
                {
                    if (Hash::check($request->password, $user->password))
                        return $user;
                    # throw error if password is incorrect
                    throw ValidationException::withMessages([Fortify::username() => ['The provided credentials are incorrect.']]);
                }
                # throw error if user isn't active
                else
                    throw ValidationException::withMessages([Fortify::username() => ['The User is not active.']]);
            }
            # throw error if user not found
            else
                throw ValidationException::withMessages([Fortify::username() => ['Invalid user.']]);

        });

    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
