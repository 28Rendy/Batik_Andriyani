<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananAdminController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $query = Pesanan::with('user')->latest();

        if ($status && in_array($status, ['pending', 'diproses', 'selesai', 'dibatalkan'])) {
            $query->where('status_pesanan', $status);
        }

        $pesanan = $query->paginate(15);
        return view('admin.pesanan.index', compact('pesanan', 'status'));
    }

    public function show($id)
    {
        $pesanan = Pesanan::with('user')->findOrFail($id);
        return view('admin.pesanan.show', compact('pesanan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $request->validate([
            'status_pesanan' => 'required|in:pending,diproses,selesai,dibatalkan',
            'status_pengiriman' => 'required|in:menunggu,dikirim,diterima',
        ]);

        $pesanan->update([
            'status_pesanan' => $request->status_pesanan,
            'status_pengiriman' => $request->status_pengiriman,
        ]);

        return redirect()->back()->with('success', 'Status pesanan dan pengiriman berhasil diperbarui!');
    }
}

