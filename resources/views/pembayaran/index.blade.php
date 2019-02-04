

@extends('layouts.app')
@section('content')
<div class="row">
   <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
         <div class="inner">
          <span><b><center>server elkanet</center></b></span>
           <span style="color: white; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 21px;"'>Total Client ={{DB::table('clients')->count('nama_client')}}<br>
                      
           </span>
           
           <span style="color: white; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 21px;"'>Total Bandwith ={{DB::table('clients')->sum('paket')}}<br>
                      
           </span>
            
         </div>
         <div class="icon">
            <i class="ion ion-bag"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
   </div>
   <!-- ./col -->
   <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
         <div class="inner">
          <span><b><center>Akumulasi Pembayaran Sukses</center></b></span>
           <center>
           <span style="color: white; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 20px;"'>Rp. {{number_format(DB::table('tagihan')->sum('payment'),0)}}
           </span>
            <p>Pembayaran Succes</p>
          </center>
         </div>
         <div class="icon">
            <i class="ion ion-stats-bars"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
   </div>
   <!-- ./col -->
   <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
         <div class="inner">
          <span><b><center>Akumulasi Pembayaran Client</center></b></span>
          <center>
             <span style="color: white; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 20px;"'>Rp. {{number_format(DB::table('clients')->sum('bayar'),0)}}</span>
            <p>ALL Target Pembayaran</p>
          </center>
         </div>
         <div class="icon">
            <i class="ion ion-person-add"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
   </div>
   <!-- ./col -->
   <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
             <span><b><center>Akumulasi Gaji Teknisi</center></b></span>
               <span style="color: white; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 21px;"'> Ucup Rp. {{number_format(DB::table('clients')->where('status_payment',1)->sum('bayar')*0.1,0)}}
               </span><br>
               <span style="color: white; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 21px;"'> koko Rp. {{number_format(DB::table('clients')->where('status_payment',1)->sum('bayar')*0.1,0)}}
               </span><br>
            
         </div>
         <div class="icon">
            <i class="ion ion-pie-graph"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
   </div>

</div>
        <div class="row">
<div class="col-md-12">
   <div class="panel panel-primary">
      
         <div class="box">
            <div class="box-header">
               <h3 class="box-title">Data Client Elkanet</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="clearfix"></div>
               <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
      <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Client</th>
                  <th>Ip Berlangganan</th>
                  <th>Tagihan</th>
                  <th>Status</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                   @php $no = 1; 
                   @endphp
                   @foreach($pembayaran as $key => $data)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->nama_client }}</td>
                  <td>{{ $data->ip_address }}</td>
                  <td>Rp.{{ number_format($data->bayar,0) }}</td>
                  @php
                           $status = [0 => 'Belum bayar', 1 => 'Sudah Bayar', 2 =>'Masih  Bayar!'];
                           $badge = [0 => ' btn-warning', 1 => 'btn-success', 2 =>'btn-info'];
                  @endphp
                  <td><span class="btn btn-sm {{$badge[$data->status_payment]}}">{{ $status[$data->status_payment]  }}</span></td>
                  <td>
                    <form action="{{ route('pembayaran.destroy', $data->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                
                                <button class="btn btn-sm btn-primary" type="submit" onclick="return confirm('Yakin ingin update pembayaran?')">Bayar</button>
                    </form>
                    
                  </td>
                </tr>
                 @endforeach
           </tbody>
           </table>

         </div>
       </div>
     </div>
   </div>
 </div>




</div>
@endsection

