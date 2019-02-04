<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tagihan extends Model
{
   protected $fillable =['client_id','nama_pelanggan','ip_tagihan','periode','amount','payment','balance'];

    public function client()
  {
    return $this->belongsTo('App\clients','client_id');
  }

   public function balance()
  {
    return $this->belongsTo('App\balance','client_id');
  }
}
