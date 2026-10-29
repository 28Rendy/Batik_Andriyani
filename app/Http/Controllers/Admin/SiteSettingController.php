<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->keyBy('key');
        return view('admin.site-settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', 'logo']);

        // Simpan field teks
        foreach ($data as $key => $val) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $val]);
        }

        // Handle upload logo jika ada
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = 'logo_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('photos'), $imageName);
            SiteSetting::updateOrCreate(['key' => 'logo'], [
                'value' => 'photos/' . $imageName,
                'type' => 'image',
                'label' => 'Logo Toko'
            ]);
        }

        return redirect()->back()->with('success', 'Pengaturan website berhasil disimpan!');
    }
}
