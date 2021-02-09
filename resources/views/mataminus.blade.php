@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Pemeriksaan Mata Minus</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-no-minus d-none">
                        <div class="card-body">
                            Mata anda tidak terindikasi memiliki minus.
                        </div>
                    </div>
                    <div class="card card-minus d-none">
                        <div class="card-body">

                        </div>
                    </div>
                    <div class="card card-test text-center">
                        <div class="card-body">
                            <div class="step step-1" data-id="2,00">
                                <div class="display-2">
                                    T Z O
                                </div>
                            </div>
                            <div class="step step-2 d-none" data-id="1,75">
                                <div class="display-3">
                                    P T O C
                                </div>
                            </div>
                            <div class="step step-3 d-none" data-id="1,50">
                                <div class="display-4">
                                    Z L P E D
                                </div>
                            </div>
                            <div class="step step-4 d-none" data-id="1,25">
                                <div style="font-size: 40px">
                                    E T O D C F
                                </div>
                            </div>
                            <div class="step step-5 d-none" data-id="1,00">
                                <div style="font-size: 32px">
                                    D P C Z L F T
                                </div>
                            </div>
                            <div class="step step-6 d-none" data-id="0,75">
                                <div style="font-size: 25px">
                                    C F D T E O P L
                                </div>
                            </div>
                            <div class="step step-7 d-none" data-id="0,50">
                                <div style="font-size: 20px">
                                    L D C Z O T E P
                                </div>
                            </div>
                            <div class="step step-8 d-none" data-id="0,25">
                                <div style="font-size: 16px">
                                    F P C D T Z L E
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            Apakah huruf diatas kelihatan dengan jelas ?
                            <br>
                            <button class="m-2 btn btn-primary" data-step="1" type="button">Ya</button>
                            <button class="m-2 btn btn-danger" data-step="1" type="button">Tidak</button>
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
            alert("Mohon beri jarak dengan layar sebesar 50cm");
        }

        $(".btn-danger").on("click", function() {
            var step = $(this).data('step');
            var minus = $(".step-" + step).data("id");

            var text = `Mata anda terindikasi -${minus}, untuk hasil yang lebih maksimal harap segera lakukan pemeriksaan lebih lanjut.`;

            $(".card-test").addClass("d-none");
            $(".card-minus").removeClass("d-none");
            
            $(".card-minus > .card-body").html(text);
        });

        $(".btn-primary").on("click", function() {
            var step = $(this).data('step');

            step += 1;

            if (step > 8) {
                $(".card-test").addClass('d-none');
                $(".card-no-minus").removeClass('d-none');
            } else {
                $(".btn").data('step', step);
                $(".step").addClass('d-none');
                $(".step-" + step).removeClass('d-none');
            }
        });
    </script>
@endsection