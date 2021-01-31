@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Pemesanan Kacamata</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('orderSave') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Nama Kontak</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nama Kontak..." name="name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="umur">Umur</label>
                                        <input type="number" class="form-control" id="umur" name="umur" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Alamat</label>
                                        <textarea style="height: 150px;" id="address" class="form-control" name="address" required></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="frame">Jenis Frame</label>
                                        <select name="frame" id="frame" class="form-control" required>
                                            @foreach ($frameData as $frame)
                                                <option value="{{ $frame->id }}">{{ $frame->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lensa">Jenis Lensa</label>
                                        <select name="lensa" id="lensa" class="form-control" required>
                                            @foreach ($lensaData as $lensa)
                                                <option value="{{ $lensa->id }}">{{ $lensa->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Masukan Resep Dokter</label>
                                        <input type="file" id="image" name="image" class="form-control" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Pesan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection