<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clients;
class PembayaranController extends Controller
{
  
public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pembayaran= Clients::all();
        return view ('pembayaran.index',compact('pembayaran'));


         }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $share = clients::find($id);
        

        return view('shares.edit', compact('share'));
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
        $data = clients::where('id',$id)->first();
         $data->status_payment = $request->status_payment;
         $data->save();
         return redirect()->route('pembayaran.index')->with('alert-success','Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data = clients::where('id',$id)->first();
         $data -> status_payment =1;
         $data ->save();
return redirect()->route('pembayaran.index')->with('alert-success','Data berhasi di Update!');
    }


    public function patch($id)
    {

        $data = clients::where('id',$id)->first();
       
        $data ->save();
    }
}
