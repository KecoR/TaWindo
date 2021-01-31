@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Data Pemesanan</h3>
        </div>
        <div class="section-body">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a href="{{ route('newOrderIndex') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-user"></i> Tambah Pemesanan Baru</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>Nama Pemesan</th>
                                            <th>Umur</th>
                                            <th>Jenis Frame</th>
                                            <th>Jenis Lensa</th>
                                            <th width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderData as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->age }}</td>
                                                <td>{{ $data->frame->name }}</td>
                                                <td>{{ $data->lensa->name }}</td>
                                                <td>
                                                    <a href="{{ route('detailOrderIndex', $data->id) }}" class="btn btn-primary"><i class="far fa-folder-open text-white"></i> Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
        $(document).ready(function() {
            $("#table").DataTable({
                responsive: true,
                "autoWidth": false,
            })
        });
    </script>
@endsection