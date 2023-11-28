@extends('template.main')
@section('container')
    <h1>Data User</h1>
    {{-- <a class="btn btn-success" href="/soal/create">Tambah Soal</a> --}}

    <table class="table table-bordered text-center mt-3 table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Skor</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($user as $u)
                <tr>
                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->skor }}</td>
                    <td class="d-flex justify-content-center">
                        @if ($u->skor != null)
                            <form action="/userdata/{{ $u->id }}/deleteskor" method="POST" class="">
                                @csrf
                                @method('POST')

                                <button type="submit" class="btn btn-danger"><i class="bi-trash"></i> Delete Score</button>
                            </form>
                        @else
                              
                        @endif

                    </td>
                </tr>
                {{-- <script>
                    console.log(penj{{ $loop->index + 1 }}.innerTEXT);
                </script> --}}
            @endforeach
        </tbody>
    </table>
@endsection
