<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clients;
use App\tagihan;
use App\balance;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tagihan= tagihan::all();
        return view ('tagihan.index',compact('tagihan'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                   
                   $clients = clients::where('status_client', 1)->get();
                  
                   
                   foreach ($clients as $key => $client) {
                   $tagihan = new tagihan();
                   $tagihan->client_id=$client->id;
                   $tagihan->periode= date('y-m-d');
                   $tagihan->balance=$client->bayar;
                   $tagihan->amount=$client->bayar;
                   $tagihan->payment=0;
                   $tagihan->save();
                   }
                   

                  
                   
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
    public function update($id)
    {
        $tagihan=tagihan::find($id);
        $tagihan->payment = $tagihan ->balance;
        $tagihan->balance=0;
        $tagihan ->save();
        return redirect()->route('client.index')->with('alert-success','Data berhasi di Update!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	 $tagihan=tagihan::find($id);
    	$tagihan->payment = $tagihan ->balance;
        $tagihan->balance=0;
        $tagihan ->save();
return redirect()->route('tagihan.index')->with('alert-success','Data berhasi di Update!');
    }
}
