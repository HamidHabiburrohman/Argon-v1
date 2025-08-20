<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Jenis;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return view('home.barang.index', compact('barang'));
    }

    public function jumlahBarang()
    {
        return view('home.barang.jumlah', compact('jumlah'));
    }



    public function create()
    {
        return view('home.barang.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_barang' => 'required|max:40',
                'harga_beli' => 'required|max:40',
                'harga_jual' => 'required|max:40',
                'stok' => 'required|integer|max:9999',
                'foto_barang' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ],
            [
                'nama_barang.required' => 'nama wajib diisi',
                'nama_barang.max' => 'nama maksimal 40 karakter',
                'foto_barang.max' => 'foto barang maksimal 2 MB',
                'foto_barang.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif,svg',
                'foto_barang.image' => 'File harus berbentuk image'
            ]
        );

        // Bersihin input harga (hapus Rp, koma, titik, dan huruf lain)

        //jika file foto ada yang terupload
        if (!empty($request->foto_barang)) {
            $fileName = uniqid() . '.' . $request->foto_barang->extension();
            $request->foto_barang->move(public_path('image'), $fileName);
        } else {
            $fileName = 'nophoto.jpg';
        }

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'foto_barang' => $fileName,
        ]);

        return redirect()->route('barang.index')->with('tambah', 'Data barang berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::find($id);
        return view('home.barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::findOrFail($id);
        return view('home.barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate(
            [
                'nama_barang' => 'required|max:40',
                'harga_beli' => 'required|max:40',
                'harga_jual' => 'required|max:40',
                'stok' => 'required|integer|max:9999',
                'foto_barang' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ],
            [
                'nama_barang.required' => 'Nama wajib diisi',
                'nama_barang.max' => 'Nama maksimal 40 karakter',
                'foto_barang.max' => 'Foto barang maksimal 2 MB',
                'foto_barang.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif,svg',
                'foto_barang.image' => 'File harus berbentuk image'
            ]
        );

        $fileName = $barang->foto_barang;

        if ($request->hasFile('foto_barang')) {
            // Hapus file lama jika ada dan bukan "nophoto.jpg"
            if ($barang->foto_barang && $barang->foto_barang !== 'nophoto.jpg') {
                $oldImagePath = public_path('image/' . $barang->foto_barang);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Simpan foto baru di direktori public/image
            $file = $request->file('foto_barang');
            $fileName = uniqid() . '.' . $file->extension();
            $file->move(public_path('image'), $fileName);
        }


        $barang->update([
            'nama_barang' => $request->nama_barang,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'foto_barang' => $fileName,
        ]);

        return redirect()->route('barang.index')->with('edit', 'Data barang berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang');
    }
}
