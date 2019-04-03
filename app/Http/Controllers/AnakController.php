<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anak;
use App\Pegawai;

class AnakController extends Controller
{
    public function index(){
        $anak = Anak::findAll();
        return view('anak.index',compact('anak'));
    }

    public function getAnakByPegawaiId($id){
        $pegawai = Anak::findByPegawaiId($id);
        return view('anak.index',compact('pegawai'));
    }
    
    public function create(){
        $pegawai = Pegawai::findAll();
        return view('anak.create',compact('pegawai'));
    }

    public function edit($id){
        $pegawai = Anak::findById($id);
        return view('anak.edit',compact('pegawai'));
    }

    public function show($id){
        return view('template.detail');
    }
    
    public function store(Request $request){
        \DB::beginTransaction();
        try{
            Anak::storeData1($request);
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
            Anak::updateData($id, $request);
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
            Anak::deleteData($id);
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
