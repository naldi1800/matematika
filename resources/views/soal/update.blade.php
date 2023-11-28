@extends('template.main')
@section('container')
    <h1>Update Soal</h1>
    <a href="/soal" class="btn btn-secondary mb-3">Kembali</a>

    <h6><span class="text-danger">*</span> wajib diisi</h6>
    <form class="row g-3 needs-validation" enctype="multipart/form-data" action="/soal/{{$data->id}}" method="POST" novalidate>
        @method('PUT')
        @csrf
        <div class="col-md-12">
            <label for="soal" class="form-label">Isi Soal<span class="text-danger">*</span></label>
            <textarea type="text" class="form-control" id="soal" name="soal" required>{{ $data->soal }}</textarea>
            <div class="invalid-feedback">
                Masukan soal!!!
            </div>
        </div>

        <div class="col-md-6">
            <label for="ops_a" class="form-label">Pilihan A<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="ops_a" name="ops_a" value="{{ $data->ops_a }}" required>
            <div class="invalid-feedback">
                Masukan Pilihan A!!!
            </div>
        </div>
        <div class="col-md-6">
            <label for="ops_b" class="form-label">Pilihan B<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="ops_b" name="ops_b" value="{{ $data->ops_b }}" required>
            <div class="invalid-feedback">
                Masukan Pilihan B!!!
            </div>
        </div>
        <div class="col-md-6">
            <label for="ops_c" class="form-label">Pilihan C<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="ops_c" name="ops_c" value="{{ $data->ops_c }}" required>
            <div class="invalid-feedback">
                Masukan Pilihan C!!!
            </div>
        </div>
        <div class="col-md-6">
            <label for="ops_d" class="form-label">Pilihan D<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="ops_d" name="ops_d" value="{{ $data->ops_d }}" required>
            <div class="invalid-feedback">
                Masukan Pilihan D!!!
            </div>
        </div>

        <div class="col-md-12">
            <label for="answer" class="form-label">Pilihan Benar<span class="text-danger">*</span></label>
            <select type="text" class="form-select" id="answer" name="answer" required>
                <option value="" disabled>---> pilih <---</option>
                <option value="A" @if ($data->answer == 'A')
                    selected
                @endif>A</option>
                <option value="B" @if ($data->answer == 'B')
                    selected
                @endif>B</option>
                <option value="C" @if ($data->answer == 'C')
                    selected
                @endif>C</option>
                <option value="D" @if ($data->answer == 'D')
                    selected
                @endif>D</option>
            </select>
            <div class="invalid-feedback">
                Pilih Pilihan Benar!!!
            </div>
        </div>

        <div class="col-md-6">
            <label for="image" class="form-label">Image</label>
            <input type="file" accept="image/png, image/jpeg" class="form-control" id="image" name="image">
        </div>
        <div class="col-md-6" id="prev" hidden>
            <label for="imagePrev" class="form-label">Preview</label>
            <img class="rounded form-control" alt="preview" src="#" id="imagePrev" width="150" height="150" aria-describedby="imgprevhelp">
            <div id="imgprevhelp" class="form-text">Klik Image Preview untuk menghapus gambar</div>
        </div>
        <script>
            image.onchange = evt => {
                const [file] = image.files
                if (file) {
                    imagePrev.src = URL.createObjectURL(file)
                    prev.hidden = false
                }
            }
            imagePrev.onclick = evt =>{
                imagePrev.src = ''
                image.value = null
                prev.hidden = true
            }

        </script>
        <script>
            tinymce.init({
              selector: 'textarea#penjelasan',
            });
        </script>

        <textarea name="penjelasan" id="penjelasan" cols="30" rows="10">
            {{ $data->penjelasan }}
        </textarea>


        <div class="col-12">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </form>
@endsection
