@extends('template.main')
@section('container')
    <h1>Tambah Soal</h1>
    <h6><span class="text-danger">*</span> wajib diisi</h6>
    <form class="row g-3 needs-validation" enctype="multipart/form-data" action="/soal/save" method="POST" novalidate>
        @csrf
        <div class="col-md-12">
            <label for="soal" class="form-label">Isi Soal<span class="text-danger">*</span></label>
            <textarea type="text" class="form-control" id="soal" name="soal" required></textarea>
            <div class="invalid-feedback">
                Masukan soal!!!
            </div>
        </div>

        <div class="col-md-6">
            <label for="ops_a" class="form-label">Pilihan A<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="ops_a" name="ops_a" required>
            <div class="invalid-feedback">
                Masukan Pilihan A!!!
            </div>
        </div>
        <div class="col-md-6">
            <label for="ops_b" class="form-label">Pilihan B<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="ops_b" name="ops_b" required>
            <div class="invalid-feedback">
                Masukan Pilihan B!!!
            </div>
        </div>
        <div class="col-md-6">
            <label for="ops_c" class="form-label">Pilihan C<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="ops_c" name="ops_c" required>
            <div class="invalid-feedback">
                Masukan Pilihan C!!!
            </div>
        </div>
        <div class="col-md-6">
            <label for="ops_d" class="form-label">Pilihan D<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="ops_d" name="ops_d" required>
            <div class="invalid-feedback">
                Masukan Pilihan D!!!
            </div>
        </div>

        <div class="col-md-12">
            <label for="answer" class="form-label">Pilihan Benar<span class="text-danger">*</span></label>
            <select type="text" class="form-select" id="answer" name="answer" required>
                <option value="" disabled selected>---> pilih <---< /option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
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
            <img class="rounded form-control" alt="preview" src="#" id="imagePrev" width="150" height="150"
                aria-describedby="imgprevhelp">
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
            imagePrev.onclick = evt => {
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

        <textarea name="penjelasan" id="penjelasan" cols="30" rows="10"></textarea>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </form>
    {{-- <script>
        tinymce.init({
            selector: "penjelasan",
            plugins: [
                "insertdatetime"
            ],
            width: 700,
            height: 400,
        })
    </script> --}}
@endsection
