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
        <h3 class="box-title">From Tujuan Jabatan</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" action="{{ url('AdminAnalystOD/storetujuan') }}" method="post">
        <input name="_token" value="{{ csrf_token() }}" type="hidden">
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Kata Kerja</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" placeholder="Email" name="kata_kerja">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Otomatis Pilih Objecy by Sistem</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" placeholder="pilih_object" name="pilih_object">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Otomatis Pilih Objective jabatan</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" placeholder="pilih_jabatan" name="pilih_jabatan">
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