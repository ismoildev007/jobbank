<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MAD Parfüm </title>
    <meta property="og:site_name" content="MAD Parfüm – Let&#39;s Get Mad! Kadın Parfüm, Erkek Parfüm"/>
    <meta property="og:description" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:title" content="Niche Parfüm Alana Hediye!"/>
    <meta property="og:type" content="product.group"/>
    <meta property="og:url" content="https://www.madparfum.com/niche-parfum-alana-hediye"/>
    <link rel='preload' href='https://static.ticimax.cloud/51735/CustomCss/ticimax/style.css?v=8.13.252.0.125237'
          as='style'/>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="../../css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css?v=3.2.0">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css?v=3.2.0">
    <!-- summernote -->
    <link rel="stylesheet" href="./admin/plugins/summernote/summernote-bs4.min.css">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="/admin/plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="/admin/plugins/codemirror/theme/monokai.css">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="/admin/plugins/simplemde/simplemde.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Start Content -->
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6 col-lg-offset-3">
                    <div class="login">
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <div class="login-form-container">
                            <div class="login-text">
                                <h3>Register</h3>
                                <p>Please fill in the details below to create an account.</p>
                            </div>
                            <!-- Register Form Start -->
                            <form class="login-form" role="form" action="{{ route('user.register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="controls">
                                        <input type="text" class="form-control" placeholder="Full Name" name="full_name"
                                               value="{{ old('full_name') }}">
                                        @error('full_name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <input type="text" class="form-control" placeholder="Phone Number" name="phone"
                                               value="{{ old('phone') }}">
                                        @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <input type="password" class="form-control" placeholder="Password"
                                               name="password">
                                        @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <input type="password" class="form-control" placeholder="Confirm Password"
                                               name="password_confirmation">
                                    </div>
                                </div>
                                <div class="button-box">
                                    <div class="login-toggle-btn">
                                        <a href="/login">Already have an account? Login</a>
                                    </div>
                                    <button type="submit" class="btn btn-common log-btn">Register</button>
                                </div>
                            </form>
                            <!-- Register Form End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/admin/plugins/moment/moment.min.js"></script>
<script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin/dist/js/adminlte.js?v=3.2.0"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/admin/dist/js/pages/dashboard.js"></script>
<script src="/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin/dist/js/adminlte.min.js?v=3.2.0"></script>
<!-- Summernote -->
<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="/admin/plugins/codemirror/codemirror.js"></script>
<script src="/admin/plugins/codemirror/mode/css/css.js"></script>
<script src="/admin/plugins/codemirror/mode/xml/xml.js"></script>
<script src="/admin/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin/dist/js/demo.js"></script>
</body>
</html>


