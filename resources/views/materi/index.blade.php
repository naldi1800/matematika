@extends('template.main')
@section('container')
    <h1>Data Materi</h1>

    <div  class="row">
        <div class="col-6">
            <h5>1. Memahami konsep persamaan linear dua variabel</h5>
            <div class="ratio ratio-16x9 ">
                <iframe src="https://www.youtube.com/embed/HyStRid6PQI" title="YouTube video" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-6">
           <h5> 2. Empat metode penyelesaian SPLDV</h5>
            <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/d2xn_OPdQf0" title="YouTube video" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    {{-- <video src="https://mdbcdn.b-cdn.net/img/video/forest.mp4" type="video/mp4" loop class="hover-to-play w-100">
</video>
<script>const clip = document.querySelectorAll(".hover-to-play");
    for (let i = 0; i < clip.length; i++) { clip[i].addEventListener("mouseenter", function (e) { clip[i].play();
      }); clip[i].addEventListener("mouseout", function (e) { clip[i].pause(); }); }</script> --}}
@endsection
