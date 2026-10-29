<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
{
    $pengeluarans = Pengeluaran::orderBy('tanggal', 'desc')->get();
    return view('pengeluaran.pengeluaran', compact('pengeluarans'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengeluaran.Tpengeluaran');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
            'kategori' => 'required|string',
            'jumlah' => 'required|numeric',
            'penerima' => 'required|string',
            'total' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
            // 'bukti' => 'nullable|string',
            'bukti_pembayaran' => 'nullable|image|max:2048',
        ]);

        $filename = null;
        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('photos'), $filename);
        }


        Pengeluaran::create([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'penerima' => $request->penerima,
            'total' => $request->total,
            'metode_pembayaran' => $request->metode_pembayaran,
            'bukti_pembayaran' => $filename,
        ]);

        return redirect()->route('pengeluaran.index')->with('success', 'Motif berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        return view('pengeluaran.Epengeluaran', compact('pengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'tanggal' => 'required|date',
        'keterangan' => 'nullable|string',
        'kategori' => 'required|string',
        'jumlah' => 'required|numeric',
        'penerima' => 'required|string',
        'total' => 'required|numeric',
        'metode_pembayaran' => 'required|string',
        'bukti_pembayaran' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
    ]);

    $pengeluaran = Pengeluaran::findOrFail($id);

    // Handle file upload
    
    if ($request->hasFile('bukti_pembayaran')) {
        // Delete old file if exists
        if ($pengeluaran->bukti_pembayaran && file_exists(public_path($pengeluaran->bukti_pembayaran))) {
            unlink(public_path($pengeluaran->bukti_pembayaran));
        }
                
        $file = $request->file('bukti_pembayaran');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('photos'), $filename);
    }


    $pengeluaran->update([
        'tanggal' => $request->tanggal,
        'keterangan' => $request->keterangan,
        'kategori' => $request->kategori,
        'jumlah' => $request->jumlah,
        'penerima' => $request->penerima,
        'total' => $request->total,
        'metode_pembayaran' => $request->metode_pembayaran,
        'bukti_pembayaran' => $filename,
    ]);

    return redirect()->route('pengeluaran.index')->with('success', 'Data pengeluaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        
        // Delete the associated file if exists
        if ($pengeluaran->bukti_pembayaran && file_exists(public_path('photos/' . $pengeluaran->bukti_pembayaran))) {
            unlink(public_path('photos/' . $pengeluaran->bukti_pembayaran));
        }
        
        $pengeluaran->delete();
        
        return redirect()->route('pengeluaran.index')
                         ->with('success', 'Data pengeluaran berhasil dihapus.');
    }
}
