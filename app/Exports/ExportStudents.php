<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportStudents implements FromCollection, WithMapping, WithHeadings
{

    public function collection()
    {
        return Student::with('family','addition')->get();
    }
    public function map($student): array
    {
        return [
            $student->id,
            $student->nama,
            $student->nik,
            $student->nis,
            $student->tempat_lahir,
            $student->tanggal_lahir,
            $student->jenis_kelamin,
            
            $student->alamat,
            $student->rtrw,
            $student->desa,
            $student->kecamatan,
            $student->kota,
            $student->provinsi,
            $student->kode_pos,

            // $student->family->a_kk,
            // $student->family->a_nik,
            // $student->family->a_nama,
            // $student->family->a_pekerjaan,
            // $student->family->a_pendidikan,
            // $student->family->a_phone,
            // $student->family->a_penghasilan,
            // $student->family->i_nik,
            // $student->family->i_nama,
            // $student->family->i_pekerjaan,
            // $student->family->i_pendidikan,
            // $student->family->i_phone,
            
        ];
    }
    public function headings(): array
    {
        return [
            '#',
            'Nama',
            'Nik',
            'Nis',
            'Tempat_lahir',
            'Tanggal_lahir',
            'Jenis_kelamin',
            
            'Alamat',
            'rt/rw',
            'Desa',
            'Kecamatan',
            'Kota',
            'Provinsi',
            'Kode_pos',

            // 'KK ayah',
            // 'NIK ayah',
            // 'Nama ayah',
            // 'Pekerjaan ayah',
            // 'Pendidikan ayah',
            // 'phone ayah',
            // 'penghasilan ayah',
            // 'NIK ibu',
            // 'Nama ibu',
            // 'Pekerjaan ibu',
            // 'Pendidikan ibu',
            // 'phone ibu',
        ];
    }
}
