@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Informasi Kontak Ahli Kacamata</h3>
        </div>
        <div class="section-body">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('aboutSave') }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Nama Kontak</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nama Kontak..." name="name" value="{{ $aboutData ? $aboutData->name : '' }}" {{ $disabled }} required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Whatsapp</label>
                                        <input type="text" class="form-control" id="whatsapp" placeholder="Whatsapp..." name="whatsapp" value="{{ $aboutData ? $aboutData->whatsapp : '' }}" {{ $disabled }} required>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="name">Instagram</label>
                                        <input type="text" class="form-control" id="name" placeholder="Instagram..." name="instagram" value="{{ $aboutData ? $aboutData->instagram : '' }}" {{ $disabled }} required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Facebook</label>
                                        <input type="text" class="form-control" id="facebook" placeholder="Facebook..." name="facebook" value="{{ $aboutData ? $aboutData->facebook : '' }}" {{ $disabled }} required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Alamat</label>
                                        <textarea style="height: 150px;" id="address" class="form-control" name="address" {{ $disabled }}>{{ $aboutData ?$aboutData->address : '' }}</textarea>
                                    </div>

                                    @if (\Auth::user())
                                        <div class="form-group col-md-6">
                                            <label for="name">Nama Bank</label>
                                            <input type="text" class="form-control" id="bank" placeholder="Nama Bank..." name="bank" value="{{ $aboutData ? $aboutData->bank : '' }}" {{ $disabled }} required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="name">Nomor Rekening</label>
                                            <input type="text" class="form-control" id="no_rek" placeholder="Nomor Rekening..." name="no_rek" value="{{ $aboutData ? $aboutData->no_rek : '' }}" {{ $disabled }} required>
                                        </div>
                                    @endif
                                </div>
                                @if (\Auth::user())
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection