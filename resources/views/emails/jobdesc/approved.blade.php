<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ url('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url('adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('adminlte/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ url('adminlte/dist/css/skins/_all-skins.min.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ url('adminlte/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ url('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}"> @yield('style')
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/iCheck/all.css') }}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ url('adminlte/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/timepicker/bootstrap-timepicker.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ url('adminlte/bower_components/select2/dist/css/select2.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('adminlte/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ url('adminlte/dist/css/skins/_all-skins.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
</head>

<body >
  <div class="wrapper">
    <div>
            
            <p>Telah dibuat jobdesc baru dengan rincian di bawah ini :</p>
            <table class="table table-hover">
            <tr>
            <td>Nomor Jabatan</td><td>:</td><td>{{$jobdesc->no_jabatan}}</td>
            </tr>
            <tr>
            <td>Nama Jabatan</td><td>:</td><td>{{$jobdesc->name_jabatan}}</td>
            </tr>
            <tr>
            <td>Divisi</td><td>:</td><td>{{$jobdesc->divisi}}</td>
            </tr>
            <tr>
            <td>Analis</td><td>:</td><td>{{$jobdesc->analis}}({{$jobdesc->nikanalis}})</td>
            </tr>
            <tr>
            <td>User/atasan</td><td>:</td><td>{{$jobdesc->namauser}}({{$jobdesc->nikuser}})</td>
            </tr>
            
            </table><br>
            <a href="http://localhost:212" class="btn btn-primary margin-bottom"> Lihat detail !</a>
    </div>
    
  </div>
  <!-- jQuery 3 -->
  <script src="{{ url('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ url('adminlte/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{ url('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ url('adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
  <!-- jvectormap -->
  <script src="{{ url('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
  <script src="{{ url('adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ url('adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ url('adminlte/bower_components/moment/min/moment.min.js') }}"></script>
  <script src="{{ url('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
  <!-- datepicker -->
  <script src="{{ url('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{{ url('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
  <!-- Slimscroll -->
  <script src="{{ url('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ url('adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ url('adminlte/dist/js/adminlte.min.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ url('adminlte/dist/js/demo.js') }}"></script>


  {{-- =======================================Batasan================================= --}}
  <script src="{{ url('adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
  <script src="{{ url('adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
  <script src="{{ url('adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
  <!-- bootstrap color picker -->
  <script src="{{ url('adminlte/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
  <!-- bootstrap time picker -->
  <script src="{{ url('adminlte/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
  <!-- iCheck 1.0.1 -->
  <script src="{{ url('adminlte/plugins/iCheck/icheck.min.js') }}"></script>

  {{-- batasan --}}
  <!-- DataTables -->
  <script src="{{ url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
  <!-- SlimScroll -->
  <!-- AdminLTE for demo purposes -->
  <!-- Page script -->
  {{-- =============================================================================== --}} @yield('script')
  <script>
    $(function () {
      //Initialize Select2 Elements
      
      
      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()
      
      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
      )
      
      //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      })
      
      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
      })
      //Red color scheme for iCheck
      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass   : 'iradio_minimal-red'
      })
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
      })
      
      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()
      
      //Timepicker
      $('.timepicker').timepicker({
        showInputs: false
      })
    })
  </script>
</body>

</html>