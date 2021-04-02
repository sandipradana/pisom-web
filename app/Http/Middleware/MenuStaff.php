<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Menu;

class MenuStaff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Menu::make('MainMenu', function ($menu) {

            $menu->add('Dashboard', ['route'  => 'staff.home.index']);
            $menu->add('Pasien', ['route'  => 'staff.patient.index']);
            $menu->add('Test', ['route'  => 'staff.test.index']);
            $menu->add('Isolation', ['route'  => 'staff.isolation.index']);

        });

        return $next($request);
    }
}
