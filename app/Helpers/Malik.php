<?php
namespace App\Helpers;

use App\Models\Dormitory;

class Malik {
    
    public static function convertHp($nomorhp) {
        //Terlebih dahulu kita trim dl
        $nomorhp = trim($nomorhp);
        //bersihkan dari karakter yang tidak perlu
        $nomorhp = strip_tags($nomorhp);     
        // Berishkan dari spasi
        $nomorhp= str_replace(" ","",$nomorhp);
        // bersihkan dari bentuk seperti  (022) 66677788
        $nomorhp= str_replace("(","",$nomorhp);
        // bersihkan dari format yang ada titik seperti 0811.222.333.4
        $nomorhp= str_replace(".","",$nomorhp); 
        
        //cek apakah mengandung karakter + dan 0-9
        if(!preg_match('/[^+0-9]/',trim($nomorhp))){
            // cek apakah no hp karakter 1-3 adalah +62
            if(substr(trim($nomorhp), 0, 3)=='+62'){
                $nomorhp= trim($nomorhp);
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif(substr($nomorhp, 0, 1)=='0'){
                $nomorhp= '+62'.substr($nomorhp, 1);
            }
        }
        return $nomorhp;
    }
    public function convertDaerah($jk,$ori)
    {
        $rooms = preg_replace('/[^0-9.]+/', '', $ori);
        $huruf = substr($ori,0,1);
        $dormitory_id = Dormitory::where('name',$huruf)
        ->where('gender','LIKE','%'.$jk.'%')
        ->first();
        if(isset($dormitory_id)){
            $data = [
                'dormitory_id'=>$dormitory_id->id,
                'rooms'=>$rooms
            ];
        }
        return $data;
    }
}