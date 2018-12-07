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
        <h3 class="box-title">Input from Email</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" action="{{ url('AdminAnalystOD/storemasteremail') }}" method="post">
        <input name="_token" value="{{ csrf_token() }}" type="hidden">
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Input Pesan Email</label>
            <div class="col-sm-10">
              <Textarea type="text" class="form-control" id="deskripsiemail" placeholder="Input by Sistem Non Finansial (Non Financial)" name="deskripsiemail"></Textarea>
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