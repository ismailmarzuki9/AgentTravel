<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_tb_wisata;
use Illuminate\Support\Str;

class ctrl_wisata extends Controller
{
    //

    public function ctrl_viewwisata(){

        $datawisata = model_tb_wisata::all();

        return view('wisata.viewwisata', compact('datawisata'));
    }

    public function ctrl_addwisataview(){
        return view('wisata.addwisata');
    }

    public function ctrl_addwisatastore( Request $request ){

        // dd($request);
        $request->validate([
            'nama_wisata'=> 'required|string|max:60',
            'reting'      => 'required|integer|max:10',
            'deskripsi'   => 'nullable|string|max:150', // Opsional,
            'lokasi'      => 'required|string|max:50',
            'harga_tiket' => 'required|integer|min:10000',
            'gambar'      => 'required|image|mimes:jpeg,png,jpg|max:2040',
        ]);

        // Proses upload file
        $gambarPath = null;
        if($request->hasFile('gambar')){
            // $gambarPath =  $request->nama_wisata . '_'. $request->file('gambar')->store('uploads/wisata','public'); // penggunaan $request->nama_wisata agar nama file di DB memiliki nama di depan yang di sesuaikan dengan nama_wisata
            $namaFile = $request->nama_wisata . '_' . uniqid() . '.' . $request->file('gambar')->getClientOriginalExtension();
            $gambarPath = $request->file('gambar')->storeAs('uploads/wisata', $namaFile, 'public');

        }

        model_tb_wisata::create([
            'id' => (String)Str::uuid(),
            'nama_wisata' => $request->nama_wisata,
            'reting'=>$request->reting,
            'deskripsi'=>$request->deskripsi,
            'lokasi'=>$request->lokasi,
            'harga_tiket'=>$request->harga_tiket,
            'gambar'=>$gambarPath,
        ]);

        return Redirect()->route('wisataview')->with('Success', " Data sulses terupload");

    }

    public function ctrl_editwisata( $id ){
        $datawisata = model_tb_wisata::findOrFail($id);
        return view('wisata.editwisata', compact('datawisata'));
    }

    public function ctrl_editwisatastore(Request $request, $id){
        $datawisata = model_tb_wisata::findOrFail($id);
        // dd($request->harga_tiket);
        //Validation
        $request->validate([
            'nama_wisata'=> 'required|string|max:60',
            'reting'      => 'required|integer|max:10',
            'deskripsi'   => 'nullable|string|max:150', // Opsional,
            'lokasi'      => 'required|string|max:50',
            'harga_tiket' => 'required|integer|min:10000',
            'gambar'      => 'image|mimes:jpeg,png,jpg|max:2040',
        ]);

        //proses upload gambar jika ada file baru
        if($request->hasFile('gambar')){
            //hapus gambar lama jika ada
            if($datawisata->gambar && file_exists('storage/'. $datawisata->gambar)){
                unlink(public_path('storage/'. $datawisata->gambar));
            }
            // simpan gambar baru
            $datawisata->gambar = $request->file('gambar')->store('uploads/wisata', 'public');
        }else{
            $datagambarlama = $datawisata->gambar;
            $datawisata->$datagambarlama;
        }

        $datawisata->update([
            'nama_wisata' => $request->nama_wisata,
            'reting'=>$request->reting,
            'deskripsi'=>$request->deskripsi,
            'lokasi'=>$request->lokasi,
            'harga_tiket'=>$request->harga_tiket,
        ]);

        return Redirect()->route('wisataview')->with('Success', " Data sulses update");

    }

    public function ctrl_wisataDelete(Request $reguest,$id){
        $datawisata = model_tb_wisata::findOrFail($id);

        // Hapus File gambar jika ada
        $filePath = public_path('storage/' . $datawisata->gambar);
        if($datawisata->gambar && file_exists($filePath)){
            unlink($filePath);
        }else {
            \Log::warning("File tidak ditemukan: $filePath");
         }

        // hapus data di DB
        $datawisata->delete();

        return redirect()->route('wisataview')->with('success', 'Databerhasil di hapus');
    }
}
