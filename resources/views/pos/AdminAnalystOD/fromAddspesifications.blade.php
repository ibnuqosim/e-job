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
        <h3 class="box-title">from Add spesifications</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" action="{{ url('AdminAnalystOD/storespesifications') }}" method="post">
        <input name="_token" value="{{ csrf_token() }}" type="hidden">
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Input Pendidikan dan Pengalaman Kerja</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" placeholder="Input Pendidikan dan Pengalaman Kerja" name="education">
            </div>
          </div>
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Input Persyaratan Fisik</label>
  
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Input Persyaratan Fisik" name="physical_requirements">
              </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Profil Jabatan</label>
    
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" placeholder="Input Profil Jabatan" name="job_profile">
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