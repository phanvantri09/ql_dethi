<?php
use App\Models\Cate;
$cate = Cate::all();
?>
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>VNE</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('home') }}" class="nav-item nav-link active">Trang Chủ</a>
       
           
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Danh Mục</a>
               
            </div>
          
           
        </div>
        @guest
            @if (Route::has('login'))
                <div class="navbar-nav ms-auto p-4 p-lg-0">

                    <a href="{{ route('login') }}" class="nav-item nav-link">Đăng Nhập</a>

                </div>

                <div class="header-btn d-none f-right d-lg-block">

                    <a href="{{ route('register') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Đăng Ký
                        Ngay<i class="fa fa-arrow-right ms-3"></i></a>

                </div>
            @endif
        @else
            <div class="navbar-nav ms-auto p-4 p-lg-0">

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">chào ::
                        {{ Auth::user()->name }}</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a  class="dropdown-item">Thông Tin Của
                            Bạn</a>
                        <a class="dropdown-item">Yêu Thích</a>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                                    height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4">
                                    </path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span>
                                    {{ __('Logout') }}
                                </span>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </li>
                    </div>
                </div>


            </div>

        @endguest
    </div>
</nav>
