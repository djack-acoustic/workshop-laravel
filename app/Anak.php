<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    protected $table = 'anak';
    protected $fillable = ['pegawai_id','nama','tempat_lahir','tanggal_lahir'];

    public static function findAll(){
        return self::all();
    }

    public static function findById($id){
        // return self::where('nama_field','=',$id)->first(); // KETIKA FIELD BUKAN ID
        return self::find($id);
    }

    public static function findByPegawaiId($id){
        // return self::where('nama_field','=',$id)->first(); // KETIKA FIELD BUKAN ID
        return self::where('pegawai_id','=',$id)->get();
    }

    // SIMPAN DATA CARA PERTAMA
    public static function storeData1($request){
        $data                = new self();
        $data->nama          = $request->nama_pegawai;
        $data->tempat_lahir  = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->save();
    }
    
    // SIMPAN DATA CARA KEDUA
    public static function storeData2($request){
        self::create($request);
    }
    

    // UPDATE DATA
    public static function updateData($id, $request){
        $data               = self::find($id);
        $data->nama          = $request->nama_pegawai;
        $data->tempat_lahir  = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->save();
    }

    public static function updateData2($id, $request){
        $data = self::find($id);
        $data->update($request);
    }

    public static function deleteData($id){
        $delete = self::find($id);
        $delete->delete();
    }

    // RELATION
    public function bapak(){
        return $this->belongsTo('App\Pegawai','pegawai_id','id');
    }
}
