@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Pemesanan Kacamata</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" value="{{ $orderData->name }}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="umur">Umur</label>
                                    <input type="text" class="form-control" value="{{ $orderData->age }}" disabled>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="address">Alamat</label>
                                    <textarea style="height: 150px;" id="address" class="form-control" name="address" disabled>{{ $orderData->address }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fram">Jenis Frame</label>
                                    <input type="text" class="form-control" value="{{ $orderData->frame->name }}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lensa">Jenis Lensa</label>
                                    <input type="text" class="form-control" value="{{ $orderData->lensa->name }}" disabled>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Masukan Resep Dokter</label><br>
                                    <img src="{{ asset('image/'.$orderData->img_doc) }}" width="250px" class="image">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lensa">Harga Frame</label>
                                    <input type="text" class="form-control" value="{{ $orderData->frame_price }}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lensa">Harga Lensa</label>
                                    <input type="text" class="form-control" value="{{ $orderData->lensa_price }}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lensa">Total Bayar</label>
                                    <input type="text" class="form-control" value="{{ $orderData->grand_total }}" disabled>
                                </div>
                                <div class="form-group col-md-12">
                                    <h4>Silahkan kirimkan ke rekening : </h4>
                                    <h2>{{ $bank }} - {{ $no_rek }}</h2>
                                    <h4>Setelah di kirimkan, kacamata anda akan sampai dirumah dalam waktu 2 - 3 hari. Terima kasih</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection