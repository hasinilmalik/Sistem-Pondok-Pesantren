<?php

namespace App\Imports;

use App\Models\Addition;
use App\Models\Family;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithLimit;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StudentImport implements ToCollection, WithLimit, WithStartRow
{
    public function __construct()
    {
        $this->startRow = 201;
    }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            
            // NOTE:MENGUBAH NIS (MENGHAPUS KODE DAERAH)
            // ==========================================
            $nis = $row[39];
            $tahun = substr($nis, 0, 2);
            //ambil 4 digit no urut
            $urutan = substr($nis, 4);
            // gabungkan tahun dan nomer urut
            $nis_baru = $tahun . $urutan;
            
            // NOTE:MENGUBAH NIK, KK (MENGHAPUS # yang di input di excel )
            // ==========================================
            $nik = $row[2];
            $nik_baru = substr($nik, 1);
            
            $kk = $row[22];
            $kk_baru = substr($kk, 1);
            
            $anik = $row[24];
            $anik_baru = substr($anik, 1);
            
            $bunik = $row[28];
            $bunik_baru = substr($bunik, 1);
            
            // NOTE:MENGUBAH NIS MENJADI EMAIL
            // ==========================================
            $jk = $row[5];
            $nis_to_email = $nis.'@bakid.com';

            User::create([
                'name'=>$row[1],
                'email'=>$nis_to_email,
                'password'=>bcrypt('12345678'),
                'jk'=>$jk,
            ]);
            
            Student::create([
                'user_id' => User::orderby('id','DESC')->first()->id,
                'nama' => $row[1],
                'nis' => $nis,
                
                'nik'=>$nik_baru,
                'tempat_lahir'=>$row[3],
                'tanggal_lahir'=>$row[4],
                'jenis_kelamin'=>$jk,
                
                'alamat'=>$row[9],
                'rtrw'=>'-',
                'desa'=>$row[10],
                'kecamatan'=>$row[11],
                'kota'=>$row[12],
                'provinsi'=>$row[13],
                'kode_pos'=>$row[14],
                'foto'=>$row[36],
                'foto_wali'=>$row[37],
                'daerah'=>$row[38],
            ]);
            
            Addition::create([
                'student_id'=>User::orderby('id','DESC')->first()->id,
                'nism'=>'-',
                'kip'=>'-',
                'pkh'=>'-',
                'kks'=>'-',
                
                'agama'=>'Islam',
                'hobi'=>'-',
                'cita_cita'=>'-',
                'kewarganegaraan'=>'WNI',
                'kebutuhan_khusus'=>'Tidak',
                'status_rumah'=>'Bersama Orang tua',
                'status_mukim'=>'Mukim',
                
                'lembaga_formal'=>$row[0],
                'madin'=>'-',
                'sekolah_asal'=>$row[16],
                'alamat_sekolah_asal'=>$row[19],
                'npsn_sekolah_asal'=>$row[17],
                'nsm_sekolah_asal'=>$row[18],
                'no_ijazah'=>$row[20],
                'no_un'=>$row[21],
            ]);
            
            Family::create([
                'student_id'=>User::orderby('id','DESC')->first()->id,
                'a_kk'=>$kk_baru,
                'a_nik'=>$anik_baru,
                'a_nama'=>$row[23],
                'a_pekerjaan'=>$row[26],
                'a_pendidikan'=>$row[25],
                'a_phone'=>$row[15],
                'a_penghasilan'=>$row[31],
                'i_nik'=>$bunik_baru,
                'i_nama'=>$row[27],
                'i_pekerjaan'=>$row[30],
                'i_pendidikan'=>$row[29],
                'i_phone'=>$row[15],
                'w_hubungan_wali'=>'-',
                'w_nik'=>'-',
                'w_nama'=>'-',
                'w_pekerjaan'=>'-',
                'w_peghasilan'=>'-',
            ]);
            
        }
    }
    public function startRow(): int
    {
        return 201;
    }

    public function limit(): int
    {
        return 450;
    }
}
