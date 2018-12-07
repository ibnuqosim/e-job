@extends('layouts.adminLTE')

@section('style')
@endsection

@section('script')
@endsection

@section('content')
{{-- {{ dd($item) }} --}}
<section class="content-header">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Edit indikator</h3>
      </div>
      @foreach($item as $datas)
        <form class="form-horizontal" action="{{ url('AdminAnalystOD/updatematrikindikator/'.$datas->id) }}" method="post">
          <input name="_token" value="{{ csrf_token() }}" type="hidden">
          <div class="box-body">
            <div class="form-group">
              <label for="unitkerja" class="col-sm-2 control-label">{{__('Unit Kerja')}}</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="unitkerja" name="unitkerja" value="{{ $datas->unitkerja }}"> 
              </div>
            </div>

            <div class="form-group">
              <label for="kodeunit" class="col-sm-2 control-label">kodeunit</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="kodeunit"  name="kodeunit" value="{{ $datas->kodeunit }}">
              </div>
            </div>

            <div class="form-group">
              <label for="object" class="col-sm-2 control-label">object</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="object"  name="object" value="{{ $datas->object }}">
              </div>
            </div>

            <div class="form-group">
              <label for="indikator" class="col-sm-2 control-label">indikator</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="indikator"  name="indikator" value="{{ $datas->indikator }}">
              </div>
            </div>

            <div class="form-group">
              <label for="kewenangan" class="col-sm-2 control-label">kewenangan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="kewenangan"  name="kewenangan" value="{{ $datas->kewenangan }}">
              </div>
            </div>
          </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right">Save</button>
          </div>
        </form>
      @endforeach
   </div>
</section>   
@endsection