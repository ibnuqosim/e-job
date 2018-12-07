@extends('layouts.adminLTE')

@section('style')
@endsection

@section('script')
@endsection

@section('content')
<section class="content-header">

    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">from Add workrelationship</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" action="{{ url('AdminAnalystOD/storeworkrelationship') }}" method="post">
        <input name="_token" value="{{ csrf_token() }}" type="hidden">
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Input by Sistem Internal Unit Kerja</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" placeholder="Input by Sistem Internal Unit Kerja" name="internal_unitkerja">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Input by Sistem Eksternal Unit Kerja</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" placeholder="Input by Sistem Eksternal Unit Kerja" name="eksternal_unitkerja">
            </div>
          </div>
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Input by Sistem Internal Dalam Hal (In Terms of):</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Input by Sistem Internal Dalam Hal (In Terms of)" name="internal_terms">
              </div>
          </div>
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Input by Sistem Eksternal Dalam Hal (In Terms of):</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Input by Sistem Eksternal Dalam Hal (In Terms of)" name="eksternal_terms">
              </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-default">Cancel</button>
          <button type="submit" class="btn btn-info pull-right">Save</button>
        </div>
        <!-- /.box-footer -->
      </form>

</section>   
@endsection