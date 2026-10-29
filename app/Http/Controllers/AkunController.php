<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun = \App\Models\Akun::All(); 
        return view( 'akun.akun' , ['akun' => $akun]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('akun.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan data kedalam tabel 
        $save_akun = new \App\Models\Akun; 
        $save_akun->kdps=$request->get('kode'); 
        $save_akun->js=$request->get('js');
        $save_akun->nmps=$request->get('nmps');  
        $save_akun->hj=$request->get('hj'); 
        $save_akun->save();
        
        return redirect()->route( 'akun.index' );
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
        $akun_edit = \App\Models\Akun::findOrFail($id); 
        return view( 'akun.edit' , ['akun' => $akun_edit]);
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
        $akun = \App\Models\Akun::findOrFail($id); 
        $akun->kdps=$request->get('kode'); 
        $akun->js=$request->get('js'); 
        $akun->nmps=$request->get('nmps'); 
        $akun->hj=$request->get('hj');
        $akun->save();
        
        return redirect()->route( 'akun.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $akun = \App\Models\Akun::findOrFail($id);
        $akun->delete();
        
        return redirect()->route( 'akun.index');
    }
}