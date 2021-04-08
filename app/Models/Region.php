<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Region extends Model
{
    use HasFactory;

    public function provinces(){
        return DB::table('regions')->select(['code', 'name'])->whereRaw('CHAR_LENGTH(code) = ?', 2)->orderBy('name', 'asc')->get();
    }

    public function cities($province_id){
        return DB::table('regions')->select(['code', 'name'])->whereRaw('LEFT(code, 2) = ?', $province_id)->whereRaw('CHAR_LENGTH(code) = ?', 5)->orderBy('name', 'asc')->get();
    }

    public function districts($city_id){
        return DB::table('regions')->select(['code', 'name'])->whereRaw('LEFT(code, 5) = ?', $city_id)->whereRaw('CHAR_LENGTH(code) = ?', 8)->orderBy('name', 'asc')->get();
    }

    public function villages($district_id){
        return DB::table('regions')->select(['code', 'name'])->whereRaw('LEFT(code, 8) = ?', $district_id)->whereRaw('CHAR_LENGTH(code) = ?', 13)->orderBy('name', 'asc')->get();
    }
}
