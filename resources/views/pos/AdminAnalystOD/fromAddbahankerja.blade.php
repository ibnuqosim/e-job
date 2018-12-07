@extends('layouts.adminLTE')

@section('style')
@endsection

@section('script')
@endsection

@section('content')
<section class="content-header">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">from Add Bahan kerja</h3>
      </div>
      <form class="form-horizontal" action="{{ url('AdminAnalystOD/storebahankerja') }}" method="post">
        <input name="_token" value="{{ csrf_token() }}" type="hidden">
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Bahan Kerja</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" deskripsi="Isi Data" name="deskripsi">
            </div>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-default">Cancel</button>
          <button type="submit" class="btn btn-info pull-right">Save</button>
        </div>
      </form>

</section>   
@endsection