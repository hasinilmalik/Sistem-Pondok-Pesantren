<table>
    <thead>
        <tr>
            <th>#</th>
            <th>nama</th>
            <td>nik</td>
            <th>nis</th>
            <th>tempat_lahir</th>
            <th>tanggal_lahir</th>
            <th>jenis_kelamin</th>

            <th>kecamatan</th>
            <th>kota</th>
            <th>provinsi</th>
            <th>kode_pos</th>
            <th>madin</th>
            <th>asrama</th>

            <th>kk</th>
            <th>nik_ayah</th>
            <th>nama_ayah</th>
            <th>pekerjaan_ayah</th>
            <th>pendidikan_ayah</th>
            <th>phone_ayah</th>
            <th>penghasilan_ayah</th>
            <th>nik_ibu</th>
            <th>nama_ibu</th>
            <th>pekerjaan_ibu</th>
            <th>pendidikan_ibu</th>
            <th>phone_ibu</th>
            <th>hubungan_wali</th>
            <th>nik_wali</th>
            <th>nama_wali</th>
            <th>pekerjaan_wali</th>
            <th>penghasilan_wali</th>

            <th>nism</th>
            <th>kip</th>
            <th>pkh</th>
            <th>kks</th>

            <th>agama</th>
            <th>hobi</th>
            <th>cita_cita</th>
            <th>kewarganegaraan</th>
            <th>kebutuhan_khusus</th>
            <th>status_rumah</th>
            <th>status_mukim</th>


            <th>lembaga_formal</th>
            <th>madin</th>
            <th>sekolah_asal</th>
            <th>alamat_sekolah_asal</th>
            <th>npsn_sekolah_asal</th>
            <th>nsm_sekolah_asal</th>
            <th>no_ijazah</th>
            <th>no_un</th>
            <th>Tgl Input</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $index => $ss)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ss->nama }}</td>
                <td>{{ '`' . $ss->nik }}</td>
                <td>{{ $ss->nis }}</td>
                <td>{{ $ss->tempat_lahir }}</td>
                <td>{{ $ss->tanggal_lahir }}</td>
                <td>{{ $ss->jenis_kelamin }}</td>

                <td>{{ $ss->kecamatan }}</td>
                <td>{{ $ss->kota }}</td>
                <td>{{ $ss->provinsi }}</td>
                <td>{{ $ss->kode_pos }}</td>
                <td>{{ $ss->madin_institution->name ?? '' }}</td>
                <td>{{ $ss->dormitory->name ?? '' }}{{ $ss->rooms }}</td>

                <td>{{ '`' . $ss->family->a_kk ?? '' }}</td>
                <td>{{ '`' . $ss->family->a_nik ?? '' }}</td>
                <td>{{ $ss->family->a_nama ?? '' }}</td>
                <td>{{ $ss->family->a_pekerjaan ?? '' }}</td>
                <td>{{ $ss->family->a_pendidikan ?? '' }}</td>
                <td>{{ $ss->family->a_phone ?? '' }}</td>
                <td>{{ $ss->family->a_penghasilan ?? '' }}</td>
                <td>{{ '`' . $ss->family->i_nik ?? '' }}</td>
                <td>{{ $ss->family->i_nama ?? '' }}</td>
                <td>{{ $ss->family->i_pekerjaan ?? '' }}</td>
                <td>{{ $ss->family->i_pendidikan ?? '' }}</td>
                <td>{{ $ss->family->i_phone ?? '' }}</td>
                <td>{{ $ss->family->w_hubungan_wali ?? '' }}</td>
                <td>{{ '`' . $ss->family->w_nik ?? '' }}</td>
                <td>{{ $ss->family->w_nama ?? '' }}</td>
                <td>{{ $ss->family->w_pekerjaan ?? '' }}</td>
                <td>{{ $ss->family->w_penghasilan ?? '' }}</td>

                <td>{{ $ss->addition->nism ?? '' }}</td>
                <td>{{ $ss->addition->kip ?? '' }}</td>
                <td>{{ $ss->addition->pkh ?? '' }}</td>
                <td>{{ $ss->addition->kks ?? '' }}</td>

                <td>{{ $ss->addition->agama ?? '' }}</td>
                <td>{{ $ss->addition->hobi ?? '' }}</td>
                <td>{{ $ss->addition->cita_cita ?? '' }}</td>
                <td>{{ $ss->addition->kewarganegaraan ?? '' }}</td>
                <td>{{ $ss->addition->kebutuhan_khusus ?? '' }}</td>
                <td>{{ $ss->addition->status_rumah ?? '' }}</td>
                <td>{{ $ss->addition->status_mukim ?? '' }}</td>


                <td>{{ $ss->addition->lembaga_formal ?? '' }}</td>
                <td>{{ $ss->addition->madin ?? '' }}</td>
                <td>{{ $ss->addition->sekolah_asal ?? '' }}</td>
                <td>{{ $ss->addition->alamat_sekolah_asal ?? '' }}</td>
                <td>{{ $ss->addition->npsn_sekolah_asal ?? '' }}</td>
                <td>{{ $ss->addition->nsm_sekolah_asal ?? '' }}</td>
                <td>{{ $ss->addition->no_ijazah ?? '' }}</td>
                <td>{{ $ss->addition->no_un ?? '' }}</td>

                <td>{{ \Carbon\Carbon::parse($ss->created_at)->isoFormat('D MMM Y') }}</td>


            </tr>
        @endforeach
    </tbody>
</table>
