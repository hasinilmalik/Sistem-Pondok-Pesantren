<div>
    <table class="table table-striped|sm|bordered|hover|inverse table-inverse table-responsive">
        <thead class="thead-inverse|thead-default">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Kota</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $std)
                <tr>
                    <td scope="row">{{ $std->iteration }}</td>
                    <td>{{ $std->nama }}</td>
                    <td>{{ $std->kota }}</td>
                    <td>
                        {{-- <button class="btn btn-sm btn-warning"
                            wire:click='editStudent({{ $std->id }})'>Edit</button> --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No data</td>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>
