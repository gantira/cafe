<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="viewport" content="width=device-width" />

    <!-- Favicon and title -->
    <link rel="icon" href="https://muffinbreak.co.uk/wp-content/uploads/2018/01/mocha-icon.png">
    <title>{{ env('APP_NAME') }}</title>

    <!-- Halfmoon CSS -->
    <link href="https://cdn.jsdelivr.net/npm/halfmoon@1.1.0/css/halfmoon-variables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    @livewireStyles
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .navbar-brand {
            font-family: 'Dancing Script', cursive;
            font-size: 40px;
        }

        .pointer {
            cursor: pointer;
        }

    </style>
    @yield('styles')
</head>

<body class="with-custom-webkit-scrollbars with-custom-css-scrollbars" data-dm-shortcut-enabled="true"
    data-sidebar-shortcut-enabled="true" data-set-preferred-mode-onload="true">
    <!-- Modals go here -->
    <livewire:orders.modal>
    <livewire:orders.modal-bayar>
    <!-- Reference: https://www.gethalfmoon.com/docs/modal -->

    <!-- Page wrapper start -->
    <div class="page-wrapper with-navbar with-sidebar" data-sidebar-type="overlayed-sm-and-down">
        <!-- Sticky alerts (toasts), empty container -->
        <!-- Reference: https://www.gethalfmoon.com/docs/sticky-alerts-toasts -->
        <div class="sticky-alerts">
            <!-- Precompiled alert with a complex design -->
            <div class="alert alert-primary filled" role="alert" id="precompiled-alert-1">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div class="w-50 h-50 d-flex align-items-center  bg-white">
                                    <!-- w-50 = width: 5rem (50px), h-50 = height: 5rem (50px), d-flex = display: flex, align-items-center = align-items: center,  = border-radius: 50%, bg-white = background-color: white -->
                                    <div class="m-auto text-primary">
                                        <!-- m-auto = margin: auto, text-primary = color: primary-color -->
                                        <i class="fa fa-check fa-2x" aria-hidden="true"></i>
                                        <span class="sr-only">Success</span>
                                        <!-- sr-only = only for screen readers -->
                                    </div>
                                </div>
                            </td>
                            <td class="pl-20">
                                <h4 class="alert-heading mb-5">Order Berhasil!</h4>
                                <!-- mb-5 = margin-bottom: 0.5rem (5px) -->
                                <div>
                                    Pesanan segera diproses.
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Navbar with content justified between -->
        <nav class="navbar justify-content-between">
            <div class="navbar-content">
                <button id="toggle-sidebar-btn" class="btn btn-action" type="button" onclick="halfmoon.toggleSidebar()">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <a href="#" class="navbar-brand">
                    <img src="https://www.gethalfmoon.com/static/site/img/fake-logo.svg" alt="fake-logo">
                </a>
            </div>
            <span class="d-none d-sm-flex navbar-brand text-muted">{{ env('APP_NAME') }}</span>
            <div class="navbar-content ">
                <button class="btn btn-action mr-5" type="button" onclick="halfmoon.toggleDarkMode()">
                    <i class="fa fa-moon-o" aria-hidden="true"></i>
                    <span class="sr-only">Toggle dark mode</span>
                </button>
                <a href="#modal-2" class="btn btn-primary w-50" role="button"><i class="fa fa-user"></i></a>
            </div>
        </nav>


        <!-- Sidebar overlay -->
        <div class="sidebar-overlay" onclick="halfmoon.toggleSidebar()"></div>

        <!-- Sidebar start -->
        <div class="sidebar">
            <div class="sidebar-menu">
                <h5 class="sidebar-title">General</h5>
                <div class="sidebar-divider"></div>
                <a href="{{ route('orders') }}" class="sidebar-link sidebar-link-with-icon">
                    <span class="sidebar-icon bg-primary text-white ">
                        <!-- bg-transparent = background-color: transparent, justify-content-start = justify-content: flex-start, mr-0 = margin-right: 0 -->
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </span>
                    Order
                </a>
                <a href="{{ route('transactions') }}" class="sidebar-link sidebar-link-with-icon">
                    <span class="sidebar-icon bg-primary text-white">
                        <!-- bg-transparent = background-color: transparent, justify-content-start = justify-content: flex-start, mr-0 = margin-right: 0 -->
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                    </span>
                    Transaksi
                </a>
                <h5 class="sidebar-title">Master</h5>
                <div class="sidebar-divider"></div>
                <a href="{{ route('products') }}" class="sidebar-link sidebar-link-with-icon">
                    <span class="sidebar-icon bg-primary text-white">
                        <!-- bg-transparent = background-color: transparent, justify-content-start = justify-content: flex-start, mr-0 = margin-right: 0 -->
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    </span>
                    Produk
                </a>
                <a href="{{ route('nomors') }}" class="sidebar-link sidebar-link-with-icon">
                    <span class="sidebar-icon bg-primary text-white">
                        <!-- bg-transparent = background-color: transparent, justify-content-start = justify-content: flex-start, mr-0 = margin-right: 0 -->
                        <i class="fa fa-list-ol" aria-hidden="true"></i>
                    </span>
                    Nomor
                </a>
                
                <a href="{{ route('payments') }}" class="sidebar-link sidebar-link-with-icon">
                    <span class="sidebar-icon bg-primary text-white">
                        <!-- bg-transparent = background-color: transparent, justify-content-start = justify-content: flex-start, mr-0 = margin-right: 0 -->
                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                    </span>
                    Payment
                </a>
            </div>
        </div>
        <!-- Sidebar end -->

        <div class="content-wrapper">
            {{ $slot }}
        </div>
        <!-- Content wrapper end -->

        <!-- Halfmoon JS -->
        <script src="https://cdn.jsdelivr.net/npm/halfmoon@1.1.0/js/halfmoon.min.js"></script>
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
            data-turbolinks-eval="false"></script>
        <script>
            Livewire.on('alert', alert => {
                halfmoon.initStickyAlert({
                    content: alert['message'],
                    title: "Berhasil",
                    alertType: "alert-default",
                    fillType: "filled-lm"
                });
            })

            Livewire.on('order-success', () => {
                halfmoon.toastAlert('precompiled-alert-1');
            })

            Livewire.on('modal-order', () => {
                halfmoon.toggleModal('modal-order');
            })

            Livewire.on('modal-bayar', () => {
                halfmoon.toggleModal('modal-bayar');
            })

        </script>

        @stack('scripts')
</body>

</html>
