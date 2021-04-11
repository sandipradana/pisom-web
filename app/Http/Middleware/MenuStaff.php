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

            $menu->add('Dashboard', ['route'  => 'staff.home.index'])->data('icon', 'home');
            $menu->add('Pasien', ['route'  => 'staff.patient.index'])->data('icon', 'users');
            $menu->add('Test', ['route'  => 'staff.test.index'])->data('icon', 'stethoscope');
            $menu->add('Isolation', ['route'  => 'staff.isolation.index'])->data('icon', 'house-user');

            // $menu->add('Laporan', [])->data('icon', 'file');
            // $menu->laporan->add('Rumah Sakit', ['route'  => 'staff.home.index'])->data('icon', 'file');

        });

        return $next($request);
    }
}
