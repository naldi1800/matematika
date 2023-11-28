@extends('template.soal')
@section('container')

    <h1>Soal</h1>


    <form
        action="
    @if ($number == $maxNumber) /user/save/soal
    @else
    /user/soal/{{ $number }}/next @endif
    "
        id="f{{ $soal->id }}" method="POST">
        <div class="row col-12">
            @csrf
            @method('POST')
            <div class="row col-9">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="col-12 my-2">
                                {{ $number }}. {{ $soal->soal }} berapa nilai x dan y ?
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-column" id="ra{{ $soal->id }}">
                                <input type="radio" id="a{{ $soal->id }}" name="pilihan{{ $soal->id }}"
                                    class="btn-check" value="A" @if (session('pilihan' . $soal->id) == 'A') checked @endif>
                                <label for="a{{ $soal->id }}" class="btn btn-outline-success my-1 text-start">
                                    A. {{ $soal->ops_a }}
                                </label>

                                <input type="radio" id="b{{ $soal->id }}" name="pilihan{{ $soal->id }}"
                                    class="btn-check" value="B" @if (session('pilihan' . $soal->id) == 'B') checked @endif>
                                <label for="b{{ $soal->id }}" class="btn btn-outline-success my-1 text-start">
                                    B. {{ $soal->ops_b }}
                                </label>

                                <input type="radio" id="c{{ $soal->id }}" name="pilihan{{ $soal->id }}"
                                    class="btn-check" value="C" @if (session('pilihan' . $soal->id) == 'C') checked @endif>
                                <label for="c{{ $soal->id }}" class="btn btn-outline-success my-1 text-start">
                                    C. {{ $soal->ops_c }}
                                </label>

                                <input type="radio" id="d{{ $soal->id }}" name="pilihan{{ $soal->id }}"
                                    class="btn-check" value="D" @if (session('pilihan' . $soal->id) == 'D') checked @endif>
                                <label for="d{{ $soal->id }}" class="btn btn-outline-success my-1 text-start">
                                    D. {{ $soal->ops_d }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card col-12 mb-2">
                    <div class="card-header text-center bg-info text-white text-uppercase">
                        SISWA
                    </div>
                    <div class="card-body text-center">
                        {{ Auth::user()->name }}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
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
                                    @if (session('pilihan' . $i) != null)
                                        <a href="/user/soal/{{ $i }}" class="btn btn-success col m-1">
                                            {{ $i }}
                                        </a>
                                    @else
                                        <a href="/user/soal/{{ $i }}" class="btn btn-outline-secondary col m-1">
                                            {{ $i }}
                                        </a>
                                    @endif
                                @endif
                            @endfor
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="col">
                            <a href="/user/soal/{{ $number - 1 }}"
                                class="btn btn-outline-success col m-1 @if ($number - 1 == 0) disabled @endif">
                                Pref
                            </a>
                            <button @if ($number == $maxNumber) disabled @endif type="submit"
                                class="btn btn-outline-success col m-1">
                                Next
                            </button>
                            <button type="submit" @if ($number != $maxNumber) disabled @endif
                                class="btn btn-outline-secondary col m-1">
                                Selesai
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>


@endsection
