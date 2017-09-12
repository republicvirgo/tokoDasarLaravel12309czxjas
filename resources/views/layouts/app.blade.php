<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <link rel="shortcut icon" href="{{{ asset('image/favicon.jpg') }}}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/selectize.bootstrap3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">  
    <link href="{{ asset('css/bootstrap-clockpicker.min.css') }}" rel="stylesheet"> 

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'> 

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">

            <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

                Tip 2: you can also add an image using data-image tag
            -->

            <div class="logo">
                <a href="http://andaglos.id" class="simple-text">
                    ANDAGLOS.ID
                </a>
            </div>

            <div class="sidebar-wrapper">

          
                
                   
                <ul class="nav" style="text-align: right;">
              

                     @if (!Auth::guest())
                        <li class="active"><a href="{{ url('home') }}"> <p><i class="material-icons">dashboard</i> Beranda</p></a></li>
                     <div class="clearfix"></div>
                 
                        @if(Laratrust::can('lihat_persediaan'))
                        <li class="">
                            <a href="#collapsePersediaan" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false"><p><i class="material-icons">storage</i> Persediaan <span class="caret"></span> </p>
                            </a>
                        </li>
                        <div class="collapse" id="collapsePersediaan">
                            <ul class="nav ">
                                @if(Laratrust::can('lihat_item_keluar'))
                                <li>
                                    <a href="{{ route('item-keluar.index') }}">
                                        <span class="sidebar-mini">IK</span>
                                        <span class="sidebar-normal">Item Keluar</span>
                                    </a>
                                </li>
                                @endif
                                @if(Laratrust::can('lihat_item_masuk'))
                                <li>
                                    <a href="{{ route('item-masuk.index') }}">
                                        <span class="sidebar-mini">IM</span>
                                        <span class="sidebar-normal">Item Masuk</span>
                                    </a>
                                </li>
                                @endif
                                @if(Laratrust::can('lihat_stok_awal'))
                                <li>
                                    <a href="{{ route('stok-awal.index') }}">
                                        <span class="sidebar-mini">SA</span>
                                        <span class="sidebar-normal">Stok Awal</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                        @endif

                        @if(Laratrust::can('lihat_daftar_akun'))
                        <li class="">
                            <a href="#collapseAkuntasi" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false"><p><i class="material-icons">account_balance_wallet</i> Akuntasi <span class="caret"></span> </p>
                            </a>
                        </li>
                        <div class="collapse" id="collapseAkuntasi">
                            <ul class="nav ">
                                @if(Laratrust::can('lihat_daftar_akun'))
                                <li>
                                    <a href="{{ route('master_daftar_akun.index') }}">
                                        <span class="sidebar-mini">DA</span>
                                        <span class="sidebar-normal">Daftar Akun</span>
                                    </a>
                                </li>
                                @endif
                                @if(Laratrust::can('lihat_group_akun'))
                                <li>
                                    <a href="{{ route('master_group_akun.index') }}">
                                        <span class="sidebar-mini">GA</span>
                                        <span class="sidebar-normal">Group Akun</span>
                                    </a>
                                </li>
                                @endif
                                @if(Laratrust::can('lihat_setting_akun'))
                                <li>
                                    <a href="{{ route('master_setting_akun.index') }}">
                                        <span class="sidebar-mini">SA</span>
                                        <span class="sidebar-normal">Setting Akun</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>

                        @endif
                    @endif
                  
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Toko Dasar</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                      
                           
                        @if (!Auth::guest())
                            <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                       Master Data <span class="caret"></span>
                                    </a>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1"> 
                                @if(Laratrust::can('lihat_user'))
                                 <li><a href="{{ route('master_users.index') }}">User</a></li> 
                                @endif
                                @if(Laratrust::can('lihat_otoritas'))
                                 <li><a href="{{ route('master_otoritas.index') }}">Otoritas</a></li>
                                @endif 
                                @if(Laratrust::can('lihat_suplier'))
                                 <li><a href="{{ route('master_suplier.index') }}">Suplier</a></li> 
                                @endif
                                @if(Laratrust::can('lihat_satuan'))
                                  <li><a href="{{ route('master_satuan.index') }}">Satuan</a></li> 
                                @endif
                                @if(Laratrust::can('lihat_kategori_produk'))
                                 <li><a href="{{ route('master_kategori_barang.index') }}">Kategori Produk</a></li> 
                                @endif
                                @if(Laratrust::can('lihat_pelanggan'))
                                 <li><a href="{{ route('master_pelanggan.index') }}">Pelanggan</a></li> 
                                @endif
                                @if(Laratrust::can('lihat_produk'))
                                 <li><a href="{{ route('master_barang.index') }}">Produk</a></li> 
                                @endif
                               
                              </ul>
                            </li>
                        @endif
                              <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="material-icons">person</i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/ubah-password') }}">Ubah Password</a>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        </ul>

                      
                    </div>
                </div>
            </nav>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                     @include('layouts._flash')
                    @yield('content')
                    </div>
                </div>
            </div>
            <footer class="footer">
          <!--      <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>

                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                    </p>
                </div>
            -->
            </footer>
        </div>
    </div>

    <!-- Scripts -->
     <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('js/tether.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-clockpicker.js') }}"></script>
<script src="{{ asset('js/selectize.min.js') }}"></script> 
<script src="{{ asset('js/custom.js') }}"></script>

<script src="{{ asset('js/material.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/material-dashboard.js') }}" type="text/javascript"></script>

<!-- SHORTCUT JS -->
<script src="{{ asset('js/shortcut.js') }}"></script>

    <!--  Charts Plugin -->
    <script src="{{ asset('js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/bootstrap-notify.js') }}"></script>

@yield('scripts')
</body>
</html>