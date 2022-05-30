<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Madin</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $ss)
            <tr>
                <td>{{ $ss->nama }}</td>
                <td>{{ $ss->madin->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
