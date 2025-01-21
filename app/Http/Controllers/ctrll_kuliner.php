<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_tb_kuliner;
use Illuminate\Support\Str;

class ctrll_kuliner extends Controller
{
    //
    public function viewkuliner(){
        $datakuliner= model_tb_kuliner::all();

        // foreach ($datakuliner as $data) {
        //     dump($data->id);
        // }

        return view('kuliner.viewkuliner', compact('datakuliner'));
    }


    public function addkulinerview(){
        return view('kuliner.addkuliner');
    }

    public function addkulinerPost(Request $request){

        // VALIDATE
        $request->validate([
            'nama_kuliner' => 'required|string|max:50',
            'reting' => 'required|integer|max:10',
            'deskripsi' => 'nullable|string|max:150', // Opsional
            'lokasi' => 'required|string|max:50',
            'harga' => 'required|integer|min:10000',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2040',
        ]);


        // Proses upload file
        $gambarPath = null;
        if($request->hasFile('gambar')){
            $gambarPath = $request->file('gambar')->store('uploads/kuliner','public');
        }

        //masukan ke DB
        model_tb_kuliner::create([
            'id'=>(String)Str::uuid(),
            'nama_kuliner' => $request->nama_kuliner,
            'reting'=>$request->reting,
            'deskripsi'=>$request->deskripsi,
            'lokasi'=>$request->lokasi,
            'harga_rata'=>$request->harga,
            'gambar'=>$gambarPath,

        ]);

        return Redirect()->route('viewkuliner')->with('success', 'data berhasil di ditambah');

    }

    //KULINER EDITH
    public Function vieweditkuliner( $id ){

        //ambil data kuliner berdasrak id
        $data = model_tb_kuliner::findOrFail($id);
        // KIRIM DATA INI KE ROUTING UNTUK DI SHOW DI VIEW
        return view('kuliner.editkuliner', compact('data'));
    }

    public function editkulinerstore(Request $request,$id){
        // dd($request);
        //temukan data di model dB
        $datakuliner = model_tb_kuliner::findOrFail($id);

        //Validation
        $request->validate([
            'nama_kuliner' => 'required|string|max:50',
            'reting' => 'required|integer|max:10',
            'deskripsi' => 'nullable|string|max:150', // Opsional
            'lokasi' => 'required|string|max:50',
            'harga' => 'required|integer|min:10000',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2040',
        ]);

        //proses upload gambar jika ada file baru
        if($request->hasFile('gambar')){
            //hapus gambar lama jika ada
            if ($datakuliner->gambar && file_exists('storage/'. $datakuliner->gambar)){
                unlink (public_path('storage/'. $datakuliner->gambar));
            }
            // simpan gambar baru
            $datakuliner->gambar = $request->file('gambar')->store('uploads/kuliner', 'public');
        }else{

            $gamabarlama= $datakuliner->gambar;
            $datakuliner->gambarlama;
        }

        //update data
        $datakuliner->update([
            'nama_kuliner'=> $request->nama_kuliner,
            'reting'=>$request->reting,
            'deskripsi'=>$request->deskripsi,
            'lokasi'=>$request->lokasi,
            'harga'=>$request->harga,
        ]);

        //REDIRECT DENGAN PESAN SUKSES
        return redirect()->route('viewkuliner')->with('success'. "data berhasil disimapan!");

    }

    // DELET kuliner
    public function deletkuliner( Request $reguest,$id){

        $datakuliner = model_tb_kuliner::findOrFail($id);

        // Hapus Fiel gambar jika ada
        $filePath = public_path('storage/' . $datakuliner->gambar);
        if ($datakuliner->gambar && file_exists($filePath)){
            unlink($filePath);
        }

        //Hapus data mobil dari database
        $datakuliner->delete();

        return redirect()->route('viewkuliner')->with('success', 'Data mobil berhasil hapus');
    }
    // DELET kuliner


}
