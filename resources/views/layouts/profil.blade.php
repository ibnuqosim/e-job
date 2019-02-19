@extends('layouts.adminLTE')

@section('style')
@endsection

@section('script')
@endsection

@section('content')
<section class="content">
  <!--section class="content-header">
    <h1>
      User Profile
    </h1>
    <ol class="breadcrumb">
      <li><a href="http://e-job.site/home"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">User profile</li>
    </ol>
  </section-->
  <section class="content">
    <div class="row">
      
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab">Jobdesc</a></li>
          </ul>
          <section class="content">
            <div class="row">
              <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                  <div class="inner">
                  <h3>{{$menungguuser}}</h3>
                    <p>Menunggu validasi user/atasan</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-list-alt"></i>
                  </div>
                  @role('AdminAnalystOD')
                  <a href="{{ url('AdminAnalystOD/listjobdescreate') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                  @endrole
                  @role('UserSuptMgrGM')
                  <a href="{{ url('UserSuptMgrGM/listjobdescreate') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                  @endrole
                  @role('ManagerOD')
                  <a href="{{ url('ManagerOD/Listmanagerod') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                  @endrole
                </div>
              </div>
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3>{{$menungodhcp}}</h3>
                    <p>Menunggu validasi ODHCP</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-file-text"></i>
                  </div>
                  @role('AdminAnalystOD')
                  <a href="{{ url('AdminAnalystOD/listjobdescreate') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                  @endrole
                  @role('UserSuptMgrGM')
                  <a href="{{ url('UserSuptMgrGM/listjobdescreate') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                  @endrole
                  @role('ManagerOD')
                  <a href="{{ url('ManagerOD/Listmanagerod') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                  @endrole
                </div>
              </div>
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>{{$finish}}</h3>
                    
                    <p>Selesai</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-check-square"></i>
                  </div>
                  @role('AdminAnalystOD')
                  <a href="{{ url('AdminAnalystOD/listjobdescreate') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                  @endrole
                  @role('UserSuptMgrGM')
                  <a href="{{ url('UserSuptMgrGM/listjobdescreate') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                  @endrole
                  @role('ManagerOD')
                  <a href="{{ url('ManagerOD/Listmanagerod') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                  @endrole
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>{{$kadalu}}</h3>
                    <p>Kadaluwarsa</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-briefcase"></i>
                  </div>
                  @role('AdminAnalystOD')
                  <a href="{{ url('AdminAnalystOD/listjobdescreate') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                  @endrole
                  @role('UserSuptMgrGM')
                  <a href="{{ url('UserSuptMgrGM/listjobdescreate') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                  @endrole
                  @role('ManagerOD')
                  <a href="{{ url('ManagerOD/Listmanagerod') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                  @endrole
                </div>
              </div>
              <div class="box-body">
              <p>Welcome di Aplikasi JOBLIST KRAKATAUSTEEL.COM</p>
              </div>
            </div>
            <div class="tab-content">   
            </div>
          </div>
        </section>
      </section>
      @endsection