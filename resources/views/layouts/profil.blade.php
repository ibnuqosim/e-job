@extends('layouts.adminLTE')

@section('style')
@endsection

@section('script')
@endsection

@section('content')
<section class="content">
  <section class="content-header">
    <h1>
      User Profile
    </h1>
    <ol class="breadcrumb">
      <li><a href="http://e-job.site/home"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">User profile</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{ asset ('/adminlte/dist/img/user4-128x128.jpg') }}" alt="User profile picture">
            <h3 class="profile-username text-center">Nina Mcintire</h3>
            <p class="text-muted text-center">Software Engineer</p>
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Followers</b> <a class="pull-right">1,322</a>
              </li>
              <li class="list-group-item">
                <b>Following</b> <a class="pull-right">543</a>
              </li>
              <li class="list-group-item">
                <b>Friends</b> <a class="pull-right">13,287</a>
              </li>
            </ul>
            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
          </div>
        </div>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">About Me</h3>
          </div>
          <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i> Education</strong>
            
            <p class="text-muted">
              B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>
            <hr>
            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
            <p class="text-muted">Malibu, California</p>
            <hr>
            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
            <p>
              <span class="label label-danger">UI Design</span>
              <span class="label label-success">Coding</span>
              <span class="label label-info">Javascript</span>
              <span class="label label-warning">PHP</span>
              <span class="label label-primary">Node.js</span>
            </p>
            <hr>
            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab">Activity Grafik</a></li>
          </ul>
          <section class="content">
            <div class="row">
              <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3>150</h3>
                    <p>New Orders</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Bounce Rate</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3>44</h3>
                    
                    <p>User Registrations</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>65</h3>
                    <p>Unique Visitors</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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