@extends('template.index')
@section('title', 'Pagawai')
@section('content')
    @if(session()->has('success'))
        {{session('success')}}
    @endif
    <br>
    <a href="{{url('pegawai/create')}}">Tambah</a>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Hp</th>
            <th>Anak</th>
            <th>Action</th>
        </tr>
        @php
            $no=1;
        @endphp
        @foreach ($pegawai as $row)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$row->nama_pegawai}}</td>
                <td>{{$row->alamat}}</td>
                <td>{{$row->no_hp}}</td>
                <td>
                    @foreach($row->anak as $ank)
                        {{$ank->nama}}<br>
                    @endforeach
                </td>
                <td>
                    <a href="{{url('pegawai/'.$row->id.'/edit')}}">Edit</a>
                    <a href="{{url('pegawai-delete/'.$row->id)}}">Delete</a>
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
