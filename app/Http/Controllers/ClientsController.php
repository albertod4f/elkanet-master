<?php

namespace App\Http\Controllers;

use App\clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientsController extends Controller
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
        $clients= Clients::all();
        return view ('client.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response



     */
   
    public function store(Request $request)
    {

             $this->validate($request, [
        'nama_client' => 'required',
        'alamat' => 'required',
         'paket' => 'required|numeric',
          'ip_address' => ['required', 'string','max:255', 'unique:clients'],
          'bayar' => 'required',
           'no_hp' => 'required'
        ]);


       $clients = new clients();
       $clients->nama_client = $request->nama_client;
       $clients->alamat = $request->alamat;
       $clients->paket = $request->paket;
       $clients->ip_address = $request->ip_address;
       $clients->no_hp = $request->no_hp;
       $clients->bayar = $request->bayar;
       $clients->save();
return redirect()->route('client.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(clients $clients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\clients  $clients
     * @return \Illuminate\Http\Response
     */
   public function update($id)
    {
      $data = clients::where('id',$id)->first();
         $data -> status_client =0;
         $data ->save();
return redirect()->route('client.index')->with('alert-success','Data berhasi di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = clients::where('id',$id)->first();
         $data -> status_client =1;
         $data ->save();
return redirect()->route('client.index')->with('alert-success','Data berhasi di Update!');
    }
    


}
