@extends('template.main')
@section('container')
    <h1>Data Soal</h1>
    <a class="btn btn-success" href="/soal/create">Tambah Soal</a>

    <table class="table table-bordered text-center mt-3">
        <thead>
            <tr>
                <th scope="col" rowspan="2">#</th>
                <th scope="col" rowspan="2">Soal</th>
                <th scope="col" colspan="4">Opsi</th>
                <th scope="col" rowspan="2">Answer</th>
                <th scope="col" rowspan="2">Penjelasan</th>
                <th scope="col" rowspan="2">Aksi</th>
            </tr>
            <tr>
                <th scope="col">A</th>
                <th scope="col">B</th>
                <th scope="col">C</th>
                <th scope="col">D</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($soal as $s)
                <tr>
                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td>{{ $s->soal }}</td>
                    <td>{{ $s->ops_a }}</td>
                    <td>{{ $s->ops_b }}</td>
                    <td>{{ $s->ops_c }}</td>
                    <td>{{ $s->ops_d }}</td>
                    <td>{{ $s->answer }}</td>
                    <td>
                        <button class="btn btn-info" type="button" data-bs-toggle="collapse"
                            data-bs-target="#penjelasan{{ $s->id }}" aria-expanded="false"
                            aria-controls="penjelasan{{ $s->id }}" onclick="this.innerText = (this.innerText == 'Show')? 'Hide' :'Show'">
                            Show
                        </button>
                        <div class="collapse" id="penjelasan{{ $s->id }}">
                            <?php echo $s->penjelasan; ?>
                        </div>
                    </td>
                    {{-- <td>{{strip_tags($s->penjelasan)}}</td> --}}
                    <td class="d-flex justify-content-center">
                        <a href="/soal/{{ $s->id }}/update" class="btn btn-primary me-2"><i class="bi-pencil"></i>
                            Update</a>
                        <form action="/soal/{{ $s->id }}" method="POST" class="">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-danger"><i class="bi-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                <script>
                    console.log(penj{{ $loop->index + 1 }}.innerTEXT);
                </script>
            @endforeach
        </tbody>
    </table>
@endsection
