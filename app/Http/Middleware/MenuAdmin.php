<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Menu;

class MenuAdmin
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
            $menu->add('Dashboard', ['route'  => 'admin.home.index']);

            $menu->add('Pengguna', []);
            $menu->pengguna->add('Admin', ['route'  => 'admin.admin.index']);
            $menu->pengguna->add('Staff', ['route'  => 'admin.staff.index']);
            $menu->pengguna->add('Pasien', ['route'  => 'admin.patient.index']);

            $menu->add('Berita', []);
            $menu->berita->add('Berita', ['route'  => 'admin.news.index']);
            $menu->berita->add('Kategori Berita', ['route'  => 'admin.news.category.index']);
            $menu->berita->add('Komentar', ['route'  => 'admin.news.comment.index']);

            $menu->add('Master', []);
            $menu->master->add('Rumah Sakit', ['route'  => 'admin.hospital.index']);
            $menu->master->add('Gejala', ['route'  => 'admin.symptom.index']);
            $menu->master->add('Obat', ['route'  => 'admin.medicine.index']);
            $menu->master->add('Penyakit Bawaan', ['route'  => 'admin.cormobid.index']);
            $menu->master->add('Test', ['route'  => 'admin.test.index']);
            $menu->master->add('Kegiatan', ['route'  => 'admin.todo.index']);
            $menu->master->add('Jenis Kegiatan', ['route'  => 'admin.todo.category.index']);

            $menu->add('Laporan', [])->data('icon', 'file');

        });

        return $next($request);
    }
}
