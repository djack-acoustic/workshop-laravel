@extends('template.index')
@section('title', 'Pagawai')
@section('content')
    @if(session()->has('success'))
        {{session('success')}}
    @endif
    <br>
    <a href="{{url('pegawai/create')}}">Tambah</a>
    <table id="datatable">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Hp</th>
            <th>Anak</th>
            <th>Action</th>
        </tr>
    </table>
@endsection
@push('style')
    <style>
        .red{
            color:red;
        }
        table{
            width:100%;
        }
        table, tr, td,th{
            border: 1px solid #000;
            border-collapse: collapse;
        }
    </style>
@endpush
@push('script')
    <script>
        $(function() {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('pegawai.data') !!}',
                columns: [
                    { data: 'nama_pegawai', name: 'nama_pegawai' },
                    { data: 'alamat', name: 'alamat' },
                    { data: 'no_hp', name: 'no_hp' },
                    { data: 'anak', name: 'anak' },
                    { data: 'action', name: 'action' },
                ]
            });
        });
    </script>
@endpush
