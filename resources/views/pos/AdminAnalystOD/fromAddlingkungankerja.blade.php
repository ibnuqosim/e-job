@extends('layouts.adminLTE')

@section('style')
@endsection

@section('script')
@endsection

@section('content')
<section class="content-header">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">from Lingkungan Kerja</h3>
      </div>
      <form class="form-horizontal" action="{{ url('AdminAnalystOD/storelingkungankerja') }}" method="post">
        <input name="_token" value="{{ csrf_token() }}" type="hidden">
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="deskripsi" deskripsi="Isi Data" name="deskripsi" required>
            </div>
          </div>
        </div>
        <div class="box-footer">
            <a href="{{ url('AdminAnalystOD/list_lingkungankerja') }}" class="btn btn-warning">Cancel</a>
          <button type="submit" class="btn btn-info pull-right">Save</button>
        </div>
      </form>

</section>   
@endsection