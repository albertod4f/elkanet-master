@extends('layouts.app')

@section('content')

  <div class="row">
<div class="col-md-6 col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title ">Menambah Client</h3>
</div>
<div class="panel-body padding10">

	@if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        @if (\Session::get('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif      
 <form action="{{ route('client.store') }}" method="post">
 	{{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="nama_client">Nama Client</label>
                   <input type="text" class="form-control" id="nama_client" name="nama_client" placeholder=" Enter Nama Pelanggan" >
                <div class="form-group">
                  <label for="alamat">Alamat Client</label>
                  <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Enter Alamat Pelanggan" >
                </div>
                <div class="form-group">
                  <label for="paket">Paket Client</label>
                  <input type="text" class="form-control" id="paket" name="paket" placeholder="Enter Paket Kecepatan" >
                </div>
                

                <div class="form-group">
                            <label for="ip_address" >{{ __('IP Client') }}</label>

                        
                                <input id="ip_address" type="ip_address" placeholder="Enter Ip Address" class="form-control{{ $errors->has('ip_address') ? ' is-invalid' : '' }}" name="ip_address" value="{{ old('ip_address') }}" required>

                                @if ($errors->has('ip_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ip_address') }}</strong>
                                    </span>
                                @endif
                           
                        </div>




                <div class="form-group">
                  <label for="no_hp">Nominal Pembayaran</label>
                 <input type="text" class="form-control" id="bayar" name="bayar" placeholder="Enter Nominal Pembayaran" >
                </div>
                <div class="form-group">
                  <label for="no_hp">No Hp Client</label>
                 <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Enter No Hp" >
                </div>
                
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
        </div>

</div>
     
@endsection
