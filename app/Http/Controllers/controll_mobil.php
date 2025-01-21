<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_tb_mobil;

class controll_mobil extends Controller
{
    //
    public function viewmobile(){

        $datamobil =  model_tb_mobil::all();

        return view('mobil.viewmobile', compact('datamobil'));
    }

    public function addmobile(){
        return view('mobil.addmobile');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'merek' => 'required|string|max:50',
            'kapasitas' => 'required|integer',
            'plat' => 'required|string|max:50',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
            'price_per_day' => 'required|numeric|min:100000',
            'gambar_direc' =>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file
            'model' => 'required|string|max:50',
        ]);
        // dd($request);

        // proses upload file
        $gambarPath = null;
        if ( $request->hasFile('gambar_direc')){
            $gambarPath = $request->file('gambar_direc')->store('uploads/mobil','public'); // akan menyimpan file pada directory public/storage/uploads/mobil
        }

        model_tb_mobil::create([
            'id' => (string) \Illuminate\Support\Str::uuid(),
            'merek' => $request->merek,
            'kapasitas' => $request->kapasitas,
            'plat' => $request->plat,
            'status' => $request->status,
            'price_per_day' => $request->price_per_day,
            'gambar_direc' => $gambarPath,
            'model' => $request->model,

        ]);

        return Redirect()->route('mobil')->with('Succes', 'Data mobil berhasil di tambah');
    }

    // star editmobil function
    public function viewedit($id)
    {
        // Ambil data mobil berdasarkan ID
        $mobil = model_tb_mobil::findOrFail($id);

        // Kirim data ke view
        return view('mobil.vieweditmobile', compact('mobil'));

    }

    public function updatemobil( Request $request,$id)
    {
        $mobil = model_tb_mobil::findOrFail($id);

        // VALIDASI
        $request ->validate ([
            'merek' => 'required|string|max:50',
            'kapasitas' => 'required|integer',
            'plat' => 'required|string|max:50',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
            'price_per_day' => 'required|numeric|min:100000',
            'gambar_direc' =>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file
            'model' => 'required|string|max:50',
        ]);

        // Update data mobil
        $mobil->merek = $request->merek;
        $mobil->model = $request->model;
        $mobil->kapasitas = $request->kapasitas;
        $mobil->plat = $request->plat;
        $mobil->status = $request->status;
        $mobil->price_per_day = $request->price_per_day;

        // Proses upload gambar jika ada file baru
        if($request->hasFile('gambar')){
            // Hapus gambar lama jika ada
            if ($mobil->gambar_direc && file_exists(public_path('storage/'. $mobil->gambar_direc))){
                unlink (public_path('storage/'. $mobil->gambar_direc));
            }
            // simpan gambar baru
            $mobil-> gambar_direc = $request->file('gambar')->store('uploads/mobil','public');
        }

        $mobil->save();

        // REDIRECT DENGAN PESAN SUKSES
        return redirect()->route('mobil')->with('success', 'Data berhasil di Update');
    }
    // END editmobil function

    // DELET MOBIL
    public function deletmobil( Request $reguest,$id){

        $mobil = model_tb_mobil::findOrFail($id);

        // dd($mobil->gambar_direc);
        // $filePath = public_path('storage/' . $mobil->gambar_direc);
        // if (file_exists($filePath)) {
        //     unlink($filePath);
        // } else {
        //     \Log::warning("File tidak ditemukan: $filePath");
        // }
        
        // Hapus Fiel gambar jika ada
        $filePath = public_path('storage/' . $mobil->gambar_direc);
        if ($mobil->gambar_direc && file_exists($filePath)){
            unlink($filePath);
        }else {
            \Log::warning("File tidak ditemukan: $filePath");
         }

        //Hapus data mobil dari database
        $mobil->delete();

        return redirect()->route('mobil')->with('success', 'Data mobil berhasil hapus');
    }
    // DELET MOBIL

}
