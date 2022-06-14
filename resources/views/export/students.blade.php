<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Nik</th>
            <th>Nis</th>
            <th>Tempat_lahir</th>
            <th>Tanggal_lahir</th>
            <th>Jenis_kelamin</th>

            <th>Kecamatan</th>
            <th>Kota</th>
            <th>Provinsi</th>
            <th>Kode_pos</th>
            <th>Madin</th>
            <th>Asrama</th>
            <th>Tg Input</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $index => $ss)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ss->nama }}</td>
                <td>{{ $ss->nik }}</td>
                <td>{{ $ss->nis }}</td>
                <td>{{ $ss->tempat_lahir }}</td>
                <td>{{ $ss->tanggal_lahir }}</td>
                <td>{{ $ss->jenis_kelamin }}</td>

                <td>{{ $ss->kecamatan }}</td>
                <td>{{ $ss->kota }}</td>
                <td>{{ $ss->provinsi }}</td>
                <td>{{ $ss->kode_pos }}</td>
                <td>{{ $ss->madin->name ?? '' }}</td>
                <td>{{ $ss->dormitory->name ?? '' }}{{ $ss->rooms }}</td>
                <td>{{ \Carbon\Carbon::parse($ss->created_at)->isoFormat('D MMM Y') }}</td>


            </tr>
        @endforeach
    </tbody>
</table>
