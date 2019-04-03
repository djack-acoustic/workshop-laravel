@extends('template.index')
@section('title', 'Create Pagawai')
@section('content')
    @if(session()->has('success'))
        {{session('success')}}
    @else
        {{session('error')}}
    @endif
    <form action="{{url('pegawai')}}" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <td>Pegawai</td>
            </tr>
            <tr>
                <td>
                    <select name="pegawai_id" id="pegawai_id">
                        @foreach($pegawai as $row)
                            <option value="{{$row->id}}">{{$row->nama_pegawai}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
            </tr>
            <tr>
                <td><input type="text" name="nama_pegawai" id="nama_pegawai"></td>
            </tr>
            <tr>
                <td>Alamat</td>
            </tr>
            <tr>
                <td><textarea name="alamat" id="alamat" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>No Hp</td>
            </tr>
            <tr>
                <td><input type="text" name="no_hp" id="no_hp"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" id="submit" value="submit"></td>
            </tr>
        </table>
    </form>
@endsection