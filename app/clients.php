<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    protected $fillable =['nama_client','alamat','paket','ip_address','no_hp','status_client','date','bayar'];
    protected $dates =['created_at','updated_at'];




}
