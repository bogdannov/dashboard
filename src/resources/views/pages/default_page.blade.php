@extends('dashboard::core.adminlte_base')

@section('title', $title)

@section('body_class', 'hold-transition skin-blue sidebar-mini ')


@section('base_content')
    <!-- Main Header -->
    <header class="main-header">
        @section('header_logo')
            {!! $header_logo !!}
        @show
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle='offcanvas' role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            @section('header_nav')
                {!! $header_nav !!}
            @show
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <section class="sidebar" style="height: auto;">
            @section('main_sidebar')
                {!! $main_sidebar !!}
            @show
        </section>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @section('content_header')
                {!! $content_header !!}
            @show
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            @section('content')
                {!! $content !!}
            @show
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        @section('footer')
            {!! $footer !!}
        @show
    </footer>
@endsection