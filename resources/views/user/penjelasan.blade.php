@extends('template.soal')
@section('container')

    <h1>Penjelasan</h1>
    <form method="POST">
        <div class="row col-12">
            @csrf
            <div class="row col-9">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="col-12 my-2">
                                {{ $number }}. {{ $soal->soal }}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-column" id="ra{{ $soal->id }}">
                                <input disabled type="radio" id="a{{ $soal->id }}" name="pilihan{{ $soal->id }}"
                                    class="btn-check" value="A" @if (session('pilihan' . $soal->id) == 'A') checked @endif>
                                <label for="a{{ $soal->id }}" class="btn btn-outline-success my-1 text-start">
                                    A. {{ $soal->ops_a }}
                                </label>

                                <input disabled type="radio" id="b{{ $soal->id }}" name="pilihan{{ $soal->id }}"
                                    class="btn-check" value="B" @if (session('pilihan' . $soal->id) == 'B') checked @endif>
                                <label for="b{{ $soal->id }}" class="btn btn-outline-success my-1 text-start">
                                    B. {{ $soal->ops_b }}
                                </label>

                                <input disabled type="radio" id="c{{ $soal->id }}" name="pilihan{{ $soal->id }}"
                                    class="btn-check" value="C" @if (session('pilihan' . $soal->id) == 'C') checked @endif>
                                <label for="c{{ $soal->id }}" class="btn btn-outline-success my-1 text-start">
                                    C. {{ $soal->ops_c }}
                                </label>

                                <input disabled type="radio" id="d{{ $soal->id }}" name="pilihan{{ $soal->id }}"
                                    class="btn-check" value="D" @if (session('pilihan' . $soal->id) == 'D') checked @endif>
                                <label for="d{{ $soal->id }}" class="btn btn-outline-success my-1 text-start">
                                    D. {{ $soal->ops_d }}
                                </label>
                            </div>
                        </div>
                        <div class="col-12 mt-3 row">
                            <div class="col-12">
                                Jawaban anda
                                @if (session('pilihan' . $number) != null)
                                    @if ($soal->answer == session('pilihan' . $number))
                                        <span class="text-success">BENAR</span>
                                    @else
                                        <span class="text-danger">SALAH</span>, Jawaban benar adalah <span
                                            class="text-success">{{ $soal->answer }}</span>
                                    @endif
                                @else
                                    <span class="text-danger">KOSONG</span>, Jawaban benar adalah <span
                                        class="text-success">{{ $soal->answer }}</span>
                                @endif
                            </div>
                            <div class="col-12 mt-3">
                                Penjelasan: <br>
                                <?php echo $soal->penjelasan; ?>
                                Berikut grafiknya: <br>
                                <canvas id="scene" width="400" height="600">
                                </canvas>
                                <script>
                                    aturCanvas();
                                    var graf = {startX:80, startY:100, dataW: {{5 + $xOp;}}, dataH:{{10 + $yOp;}}, tileW:25, skalaX:1, skalaY:1, desimalX:0, desimalY:0, offsetX:1, offsetY:{{5 + $yOp}}, xLabel:'x', yLabel:'y', fontLabel:'11pt Calibri', warnaBG:'#0000', warnaGaris:'#000', warnaLabel:'#000'}

                                    var P = {x:{{$xp[0]}}, y:{{$yp[0]}}};
                                    var Q = {x:{{$xp[1]}}, y:{{$yp[1]}}};

                                    function setSimulasi(){
                                        //menambahkan background warna
                                        hapusLayar("#fff");
                                        //membuat kordinat kartesius
                                        grafik(graf);
                                        //titik pusat koordinat kartesian
                                        var x0 = graf.startX + graf.offsetX*graf.tileW;
                                        var y0 = graf.startY + graf.offsetY*graf.tileW;
                                        //transformasi titik P dan Q ke koordinat layar
                                        var Px1 = x0 + (P.x*graf.tileW/graf.skalaX);
                                        var Py1 = y0 - (P.y*graf.tileW/graf.skalaY);
                                        var Qx1 = x0 + (Q.x*graf.tileW/graf.skalaX);
                                        var Qy1 = y0 - (Q.y*graf.tileW/graf.skalaY);
                                        //membuat garis
                                        garis (Px1, Py1, Qx1, Qy1, 5, "blue");
                                    }

                                    setSimulasi();
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card col-12 mb-2">
                    <div class="card-header text-center bg-info text-white text-uppercase">
                        Hasil
                    </div>
                    <div class="card-body text-center row">
                        <span class="col-12">Jawaban benar: {{ $answer[0] }}</span>
                        <span class="col-12">Jawaban salah: {{ $answer[1] }}</span>
                        <span class="col-12 mt-3 fs-4">Skor: {{ ($answer[0] / $maxNumber) * 100 }}</span>
                    </div>
                </div>
                <div class="card col-12">
                    <div class="card-header text-center bg-info text-white text-uppercase">
                        Nomor
                    </div>
                    <div class="card-body row">
                        <div class="col-12 row row-cols-5">
                            @for ($i = 1; $i <= $maxNumber; $i++)
                                @if ($number == $i)
                                    <div class="btn btn-secondary col m-1">
                                        {{ $i }}
                                    </div>
                                @else
                                    <a href="/user/penjelasan/{{ $i }}"
                                        class="btn btn-outline-secondary col m-1">
                                        {{ $i }}
                                    </a>
                                @endif
                            @endfor
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="col-12 d-flex justify-content-around">
                            <a href="/user/penjelasan/{{ $number - 1 }}"
                                class="btn btn-outline-success col m-1 @if ($number - 1 == 0) disabled @endif">
                                Pref
                            </a>
                            <a href="/user/penjelasan/{{ $number + 1 }}"
                                class="btn btn-outline-success col m-1 @if ($number + 1 > $maxNumber) disabled @endif">
                                Next
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection
