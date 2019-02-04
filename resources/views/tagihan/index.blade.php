@extends('layouts.app')
@section('content')
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
                           <th width="17%">Ip Address Pelanggan</th>
                           <th width="17%">Nominal Pembayaran</th>
                           <th width="17%">Tagihan</th>
                           <th width="17%">Saldo Tagihan</th>
                           <th width="17%">Periode</th>
                           <th >Action</th>
                        </tr>
                     </thead>
                     <tbody>
                       @php $no = 1; @endphp
                        
                        @foreach($tagihan as $cek)
                        <tr>
                           <td>{{ $no++ }}</td>
                           <td>{{ $cek->client->nama_client }}</td>
                           <td>{{ $cek->client->ip_address }}</td>
                           <td>Rp.{{number_format($cek->amount,0) }}</td>
                           <td>Rp.{{ number_format($cek->payment,0) }}</td>
                           <td>Rp.{{ number_format($cek->balance,0) }}</td>
                           <td>{{ $cek->periode }}</td>
                          
               <td>
                    
                            <form action="{{ route('tagihan.update', $cek->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                
                                <button class="btn btn-sm btn-primary" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Bayar</button>
                            </form>

                     <td>
                        </tr>

                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   
</div>
@endsection