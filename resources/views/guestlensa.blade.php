@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Pemeriksaan Mata Minus</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    @foreach ($lensas as $lensa)
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('image/' . $lensa->image) }}" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">{{ $lensa->name }}</h5>
                            <p>Harga lensa :  Rp. {{ $lensa->price }}</p>
                            <p class="card-text">{{ $lensa->description }}.</p>
                            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection