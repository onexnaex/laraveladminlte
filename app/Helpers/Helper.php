<?php

//app/Helpers
namespace App\Helpers;

 

use Illuminate\Support\Facades\DB;

 

class Helper {


    public static function get_menu($tipe) {

        $menu = DB::table('menu')
                ->where('aktif', 1)
                ->where('tipe',$tipe)
                ->get();

        return  $menu;
    }

    public static function cek_child($id){
        $cekchild = DB::table('menu')->where('aktif',1)->count();

        if($cekchild > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function show_child($id){
        $menu = DB::table('menu')
                    ->where('aktif',1)
                    ->where('parent',$id)->get();
        return $menu;
    }

}
