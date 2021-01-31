@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Data Lensa</h3>
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
                                <a class="btn btn-icon icon-left btn-primary addbutton"><i class="far fa-user"></i> Tambah Lensa Baru</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>Nama Lensa</th>
                                            <th>Harga Lensa</th>
                                            <th>Gambar Lensa</th>
                                            <th width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lensaData as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->price }}</td>
                                                <td>
                                                    @if ($data->image)
                                                        <img src="{{ asset('image/'.$data->image) }}" width="70px">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-success editbutton" data-id="{{ $data->id }}"><i class="fa fa-sm fa-edit text-white"></i></button>
                                                    <button class="btn btn-sm btn-danger delbutton" data-url="{{ route('lensaDelete', $data->id) }}"><i class="fa fa-sm fa-trash text-white"></i></button>
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

    <div class="modal fade" id="actionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="POST" id="modalForm" action="{{ route('lensaSave') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nama Lensa</label>
                                <input type="text" class="form-control" id="name" placeholder="Nama Lensa..." name="name" required>
                            </div>
    
                            <div class="form-group col-md-6">
                                <label for="price">Harga Lensa</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
    
                            <div class="form-group col-md-6">
                                <label>Gambar Lensa</label>
                                <input type="file" id="image" name="image" class="form-control" required>
                            </div>
    
                            <div class="form-group col-md-6">
                                <label>Deskripsi</label>
                                <textarea style="height: 150px;" id="description" class="form-control" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#table").DataTable({
                responsive: true,
                "autoWidth": false,
            })
        });

        $(document).on("click",".delbutton",function(){
        let url = $(this).attr('data-url');
        let confirmation = confirm("Yakin ingin menghapus data ini ?");
            if(confirmation){
                window.location.href = url;
            }else{
            }
        });

        $(document).on("click",".editbutton",function() {
            $('.modal-title').html('Ubah Data');

            let data_id = $(this).attr('data-id');

            $.get('/lensa/'+data_id, function(data) {
                $("#id").val(data.id);
                $("#name").val(data.name);
                $("#price").val(data.price);
                $("#description").val(data.description);
                $("#image").prop('required', false);
            });
            
            $("#actionModal").modal('show');
        });

        $(document).on("click",".addbutton", function() {
            $('.modal-title').html('Tambah Data');

            $("#id").val('');
            $("#image").prop('required', true);
            $("#actionModal").modal('show');
        });
    </script>
@endsection