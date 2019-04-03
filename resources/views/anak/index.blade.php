@extends('template.index')
@section('title', 'Pagawai')
@section('content')
    @if(session()->has('success'))
        {{session('success')}}
    @endif
    <br>
    <a href="{{url('anak/create')}}">Tambah</a>
    <table>
        <tr>
            <th>No</th>
            <th>Bapak</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Action</th>
        </tr>
        @php
            $no=1;
        @endphp
        @foreach ($anak as $row)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$row->bapak->nama_pegawai}}</td>
                <td>{{$row->nama}}</td>
                <td>{{$row->tempat_lahir}}</td>
                <td>{{$row->tanggal_lahir}}</td>
                <td>
                    <a href="{{url('anak/'.$row->id.'/edit')}}">Edit</a>
                    <a href="{{url('anak-delete/'.$row->id)}}">Delete</a>
                    <a href="{{url('anak-pagawai/'.$row->id)}}">Lihat Anak</a>
                </td>
            </tr>
        @endforeach
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
