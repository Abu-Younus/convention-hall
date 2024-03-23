@extends('admin.master')

@section('title')
    Dashboard

@endsection

@section('body')

@include('admin.navber')
<div id="layoutSidenav">
    @include('admin.sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 text-center">
                <h2 class="text-secondary">Find Convention Hall | Admin Dashboard</h2>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Find Convention Hall Website 2022</div>
                    <div>
                        <a href="">Privacy Policy</a>
                        &middot;
                        <a href="">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

@endsection
