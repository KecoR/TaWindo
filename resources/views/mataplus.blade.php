@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Pemeriksaan Mata Plus</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-no-plus d-none">
                        <div class="card-body">
                            Mata anda tidak terindikasi memiliki plus.
                        </div>
                    </div>
                    <div class="card card-plus d-none">
                        <div class="card-body">

                        </div>
                    </div>
                    <div class="card card-test text-center d-none">
                        <div class="card-body">
                            <div style="color: #000000; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; line-height: 16.25px;">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent volutpat volutpat massa egestas accumsan. Donec varius dui finibus pellentesque scelerisque. In at mollis diam. Phasellus elementum lacus sit amet blandit sagittis. Quisque auctor lobortis ipsum facilisis blandit. Phasellus eget leo a dui fringilla pharetra sed nec nulla. Donec bibendum enim ut dignissim tincidunt. Nullam dapibus et eros non vestibulum. Sed non vulputate sem, at auctor ipsum. Curabitur eleifend imperdiet turpis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin vulputate orci et dui egestas, sed hendrerit lorem lobortis. Fusce dapibus commodo lacinia. Proin congue ac sapien at finibus. Ut id eros posuere ex molestie dignissim.
                            </div>
                        </div>
                        <div class="card-footer">
                            Apakah tulisan diatas terbaca dengan jelas ?
                            <br>
                            <button class="m-2 btn btn-primary" type="button">Ya</button>
                            <button class="m-2 btn btn-danger" type="button">Tidak</button>
                        </div>
                    </div>
                    <div class="card card-form">
                        <div class="card-body text-center">
                            <div class="form-group">
                                <label for="">Pilih umur</label>
                                <select name="umur" id="umur" class="form-control">
                                    @for ($i=40; $i<=60; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="button" class="btn btn-sm btn-success">Selanjutnya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        window.onload = function() {
            alert("Mohon beri jarak dengan layar sebesar 30cm");
        }

        $(".btn-success").on("click", function() {
            $(".card-form").addClass("d-none");
            $(".card-test").removeClass("d-none");
        });

        $(".btn-primary").on("click", function() {
            $(".card-test").addClass("d-none");
            $(".card-no-plus").removeClass("d-none");
        });

        $(".btn-danger").on("click", function() {
            var umur = $("#umur").val();
            var plue = getPlus(umur);

            var text = `Mata anda terindikasi +${plus}, untuk hasil yang lebih maksimal harap segera lakukan pemeriksaan lebih lanjut.`;

            $(".card-test").addClass("d-none");
            $(".card-plus").removeClass("d-none");
            
            $(".card-plus > .card-body").html(text);
        });

        var getPlus = function getPlus(umur) {
            if (umur >= 40 && umur <= 42) {
                plus = "1,00";
            } else if (umur > 42 && umur <= 44) {
                plus = "1,25";
            } else if (umur > 44 && umur <= 47) {
                plus = "1,50";
            } else if (umur > 47 && umur <= 49) {
                plus = "1,75";
            } else if (umur > 49 && umur <= 52) {
                plus = "2,00";
            } else if (umur > 52 && umur <= 54) {
                plus = "2,25";
            } else if (umur > 54 && umur <= 57) {
                plus = "2,50";
            }  else if (umur > 57 && umur <= 59) {
                plus = "2,75";
            } else {
                plus = "3,00";
            }
        }
    </script>    
@endsection