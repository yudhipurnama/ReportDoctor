@extends('frontend.master')
@section('title')
    Morning Report
@stop
@section('content')
<section class="content">
<div class="row">
    <div class="col-sm-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>

            <form action="{{ route('simpan_morningReport') }}" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    @csrf
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Nama :</label>
                            <input type="text" name="nama_dokter" id="nama_dokter" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="moderator_mr">Moderator MR :</label>
                            <select class="form-control" name="moderator_mr" id="moderator_mr">
                                <option disabled selected>Pilih</option>
                                <option>MR Resident</option>
                                <option>MR Dokter Muda</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="tgl">Tanggal :</label>
                            <input type="date" name="tgl" id="tgl" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="waktu">Waktu :</label>
                            <input type="time" name="waktu" id="waktu" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="keterangan">Keterangan :</label>
                            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                        </div>
                    </div>                                
                        
                </div>
                <div class="box-footer">
                    <div class="col-sm-12">
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- List data --}}
<div class="row">
    <div class="col-sm-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $subtitle }}</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="table-resposive">
                    <table class="table table-bordered table-striped table-condensed data-table">
                        <thead class="bg-info">
                            <tr>
                                {{-- <th>No</th> --}}
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Moderator MR</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@push('scripts')
<script type="text/javascript">
    $(function () {
        table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true,
            ajax:{
                url: "{{ route('morningReport') }}",
                method: "GET",
                xhrFields: {
                        withCredentials: true
                }
            },
            columns: [
                {data: 'nama_dokter'},
                {data: 'tgl'},
                {data: 'waktu'},
                {data: 'moderator_mr'},
                {data: 'keterangan'},
                {data: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>    
@endpush
@endsection