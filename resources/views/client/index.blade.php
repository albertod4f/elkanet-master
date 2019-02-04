

@extends('layouts.app')
@section('content')
<div class="row">
   <div class="col-lg-3 col-xs-6" >
      <!-- small box -->
      <div class="small-box bg-aqua" >
         <div class="inner">
          <span><b><center>server elkanet</center></b></span>
           <span style="color: white; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 19px;"'> Client ={{DB::table('clients')->count('nama_client')}}<br>
                      
           </span>
           
           <span style="color: white; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 19px;"'> Bandwith ={{DB::table('clients')->sum('paket')}}<br>
                      
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
           <span style="color: white; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 18px;"'>Rp. {{number_format(DB::table('tagihans')->sum('payment'),0)}}
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
             <span style="color: white; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 18px;"'>Rp. {{number_format(DB::table('clients')->where('status_client',1)->sum('bayar'),0)}}</span>
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
            
               <span style="color: white; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 17px;"'> Ucup Rp. {{number_format(DB::table('tagihans')->sum('payment')*0.1,0)}}
               </span><br>
               <span style="color: white; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 17px;"'> koko Rp. {{number_format(DB::table('tagihans')->sum('payment')*0.08,0)}}
               </span><br>
            <p>Gaji Teknisi</p>
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
                           <th >No</th>
                           <th width="17%">Nama Pelanggan</th>
                           <th width="17%">Alamat </th>
                           <th width="5%">Paket</th>
                           <th width="5%">Ip Address</th>
                           <th width="5%">No Hp/Wa</th>
                           <th width="17%">Nominal Pembayaran</th>
                           <th width="10%">Status Pelanggan</th>
                            <th width="5%">action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $no = 1; @endphp
                        @foreach($clients as $key => $cek)
                        <tr>
                           <td>{{ $no++ }}</td>
                           <td>{{ $cek->nama_client }}</td>
                           <td>{{ $cek->alamat }}</td>
                           <td>{{ $cek->paket }}.Mbps</td>
                           <td>{{ $cek->ip_address }}</td>
                           <td>Call {{ $cek->no_hp }}</td>
                           <td>Rp.{{ number_format($cek->bayar,0) }}</td>
                           @php
                           $status = [0 => 'suspend', 1 => 'aktiv' ];
                           $badge = [0 => ' btn-danger', 1 => 'btn-success'];
                           @endphp
                           <td>
                           
                             
                            <span class="btn btn-block {{$badge[$cek->status_client]}}" >{{ $status[$cek->status_client]  }}

                           </span>
                         </td>
                         <td>
                         
                  <td>
                    <form action="{{ route('client.destroy', $cek->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                
                                <button class="btn btn-sm btn-primary" type="submit" onclick="return confirm('Yakin ingin update client?')">aktifkan</button>

                    </form>
                    <form action="{{ route('client.update', $cek->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin non aktifkan client?')">disabled</button>
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

