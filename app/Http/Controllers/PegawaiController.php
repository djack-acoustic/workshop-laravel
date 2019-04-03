<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;

class PegawaiController extends Controller
{
    public function index(){
        $pegawai = Pegawai::findAll();
        return view('pegawai.index',compact('pegawai'));
    }
    
    public function create(){
        return view('pegawai.create');
    }

    public function edit($id){
        $pegawai = Pegawai::findById($id);
        return view('pegawai.edit',compact('pegawai'));
    }

    public function show($id){
        return view('template.detail');
    }
    
    public function store(Request $request){
        \DB::beginTransaction();
        try{
            Pegawai::storeData1($request);
            // Pegawai::storeData2($request->all());
        }catch(\Exception $e){
            \DB::rollback();
            if(env('APP_ENV')=='local'){
                dd($e);
            }
            return redirect()->back()->with('error','Data gagal disimpan');
        }
        \DB::commit();
        return redirect('pegawai')->with('success','Data berhasil disimpan');
    }

    public function update($id, Request $request){
        \DB::beginTransaction();
        try{
            Pegawai::updateData($id, $request);
        }catch(\Exception $e){
            if(env('APP_ENV')=='local'){
                dd($e);
            }
            \DB::rollback();
            return redirect()->back()->with('error','Data gagal disimpan');
        }
        \DB::commit();
        return redirect()->back()->with('success','Data berhasil disimpan');
    }

    public function destroy($id){
        \DB::beginTransaction();
        try{
            Pegawai::deleteData($id);
        }catch(\Exception $e){
            if(env('APP_ENV')=='local'){
                dd($e);
            }
            \DB::rollback();
            return redirect()->back()->with('error','Data gagal disimpan');
        }
        \DB::commit();
        return redirect()->back()->with('success','Data berhasil disimpan');
    }

}
