<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">

            @guest
            @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif


            @else
            <li class="dropdown header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">

                    <div class="header-info ms-3">

                        @if (Auth::user()->is_admin == 1)
                        <span class="font-w600 ">Hi , {{ Auth::user()->name }}<b>

                                @elseif(Auth::user()->is_admin == 2)
                                {{-- nhaf tuyeern dung --}}
                                <span class="font-w600 ">Hi , {{ Auth::user()->name }}<b>
                                        @endif



                                    </b></span>
                                <small class="text-end font-w400"> F4 Academy</small>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="app-profile.html" class="dropdown-item ai-icon">
                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span class="ms-2">Profile </span>
                    </a>
                    <a href="email-inbox.html" class="dropdown-item ai-icon">
                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <span class="ms-2">Inbox </span>
                    </a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        <span>
                            {{ __('Logout') }}
                        </span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </div>
            </li>
            @endguest






            @if (Auth::user()->is_admin == 1)

            <li><a class="has-arrow ai-icon" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Trang Chủ</span>
                </a>


            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-050-info"></i>
                    <span class="nav-text"> Quản Lý user</span>
                </a>
                <ul aria-expanded="false">

                    <li><a href="{{route('User1.create')}}">Thêm User</a></li>
                    <li><a href="{{route('User1.index')}}">Danh Sách User</a></li>
                </ul>









                @elseif(Auth::user()->is_admin == 2)
                {{-- nhaf tuyeern dung --}}
            <li><a class="has-arrow ai-icon" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Trang Chủ</span>
                </a>


            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-050-info"></i>
                    <span class="nav-text"> Môn Học</span>
                </a>
                <ul aria-expanded="false">

                    <li><a href="{{route('Category.create')}}">Thêm Môn Học</a></li>
                    <li><a href="{{route('Category.index')}}">Danh Sách Môn Học</a></li>
                </ul>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-050-info"></i>
                    <span class="nav-text">Câu Hỏi Trắc Nghiệm </span>
                </a>
                <ul aria-expanded="false">

                    <li><a href="{{route('Quiz.create')}}">Thêm Câu Hỏi Trắc Nghiệm</a></li>
                    <li><a href="{{route('Quiz.index')}}">Danh Sách Câu Hỏi Trắc Nghiệm</a></li>




                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-050-info"></i>
                    <span class="nav-text">Môn Thi Trắc Nghiệm </span>
                </a>
                <ul aria-expanded="false">

                    <li><a href="{{route('Quiz.create')}}">Thêm Đề Trắc Nghiệm</a></li>
                    <li><a href="{{route('Quiz.index')}}">Danh Sách Đề Thi Trắc Nghiệm</a></li>




                </ul>
            </li>
            @endif

        </ul>
        <div class="copyright">
            <p><strong> F4 Academy</strong> © 2022 </p>
            <p class="fs-12"> Phan Văn Hải<span class="heart"></span> Phan Văn Hải </p>
        </div>
    </div>
</div>