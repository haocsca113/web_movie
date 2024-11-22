<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use App\Models\Detect_Attack;
use Illuminate\Support\Facades\Auth;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });

        RateLimiter::for('login', function (Request $request) {
            $ip = $request->ip();
            $email = $request->input('email', 'unknown');
    
            return Limit::perMinute(5)->by($ip)->response(function () use ($ip, $email) {
                Detect_Attack::create([
                    'attack_type' => 'Brute Force',
                    'details' => 'Brute Force Attack By ip: ' . $ip . '& email: ' .$email,
                    'detected_at' => now(),
                ]);

                // Ghi log brute force
                \Log::warning('Brute force detected', [
                    'ip' => $ip,
                    'email' => $email,
                    'time' => now(),
                ]);
    
                return response()->json([
                    'message' => 'Too many login attempts. Please try again later.',
                ], 429);
            });
        });
    }
}
