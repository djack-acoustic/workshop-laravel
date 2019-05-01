<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Datatables;

class Pegawai extends Model
{
    protected $table = 'mst_pegawai';
    protected $fillable = ['nama_pegawai','alamat','no_hp'];

    public static function findAll(){
        return Pegawai::with(['anak'])->get();
    }

    public static function datatable($request){
        $datas  = Pegawai::with(['anak']);
        $search = $request->search;
        if (!empty($search['value'])) {
            $keyword = $search['value'];
            $datas   = $datas->where(function($query) use ($keyword)
            {
                $query->orwhere('nama_pegawai', 'like', '%'.$keyword.'%')
                ->orwhere('alamat', 'like', '%'.$keyword.'%')
                ->orwhere('no_hp', 'like', '%'.$keyword.'%');
            });
        }
        return Datatables::of($datas)
        ->addColumn('anak', function ($data) {
            $html = "";
            foreach($data->anak as $row){
                $html .= $row->nama."<br>";
            }
            return $html;
        })
        ->addColumn('action', function ($data) {
            $html = "<a href='".url('pegawai/'.$data->id.'/edit')."'>Edit</a>
            <a href='".url('pegawai-delete/'.$data->id)."'>Delete</a>
            <a href='".url('anak-pagawai/'.$data->id)."'>Lihat Anak</a>";
            return $html;
        })
        ->rawColumns(['anak','action'])
        ->make();
    }

    public static function findById($id){
        // return self::where('nama_field','=',$id)->first(); // KETIKA FIELD BUKAN ID
        return Pegawai::find($id);
    }

    // SIMPAN DATA CARA PERTAMA
    public static function storeData1($request){
        $data               = new self();
        $data->nama_pegawai = $request->nama_pegawai;
        $data->alamat       = $request->alamat;
        $data->no_hp        = $request->no_hp;
        $data->save();
    }
    
    // SIMPAN DATA CARA KEDUA
    public static function storeData2($request){
        self::create($request);
    }
    

    // UPDATE DATA
    public static function updateData($id, $request){
        $data               = self::find($id);
        $data->nama_pegawai = $request->nama_pegawai;
        $data->alamat       = $request->alamat;
        $data->no_hp        = $request->no_hp;
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

    public static function jumlahPegawai(){
        return self::count();
    }

    // RELATION
    public function anak()
    {
        return $this->hasMany('App\Anak','pegawai_id','id');
    }
}
