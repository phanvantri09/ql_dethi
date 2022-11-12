 <?php
 
 ?>
 <!-- Carousel Start -->
 @extends('user.master')
 @section('content')
    
 <div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{asset('user/img/carousel-1.jpg')}}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Học Cùng Chuyên Gia </h5>
                            <h1 class="display-3 text-white animated slideInDown">Khóa học có sẵn </h1>
                            <p class="fs-5 text-white mb-4 pb-2">Cùng khám phá và nghiên cứu các chủ đề lập trình bất kỳ lúc nào. tham gia hàng ngàn khóa học lập trình từ cơ bản đến nâng cao.</p>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Học Ngay</a>
                            <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Tham Gia Ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{asset('user/img/carousel-2.jpg')}}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Khóa học chất lượng</h5>
                            <h1 class="display-3 text-white animated slideInDown">Học mọi lúc mọi nơi</h1>
                            <p class="fs-5 text-white mb-4 pb-2">Trang bị các kĩ năng cần có cho công việc tương lai của bạn.</p>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Học Ngay</a>
                            <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Tham Gia Ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                        <h5 class="mb-3">Nâng cao kỹ năng</h5>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                        <h5 class="mb-3">Lộ Trình rõ ràng</h5>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-home text-primary mb-4"></i>
                        <h5 class="mb-3">Học ở Mọi Nơi</h5>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                        <h5 class="mb-3">Tài liệu Phong Phú</h5>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{asset('user/img/about.jpg')}}" alt="" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">Về chúng tôi</h6>
                <h1 class="mb-4">Chào Mừng bạn đến với VNE-Education</h1>
                <p class="mb-4">Cùng khám phá và nghiên cứu các chủ đề lập trình bất kỳ lúc nào. tham gia hàng ngàn khóa học lập trình từ cơ bản đến nâng cao..</p>
                <p class="mb-4">Học cùng chuyên gia </p>
                <div class="row gy-2 gx-4 mb-4">    
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Nâng cao kỹ năng</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Giao diện thân thuộc</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Giáo viên nhiệt tình</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Bài giảng dễ hiểu</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Học Mọi Lúc Mọi Nơi</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Khóa học chất lượng</p>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="">Học Ngay</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Categories Start -->

<!-- Categories Start -->


<!-- Courses Start -->

<!-- Courses End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Giáo viên nổi bật</h6>
            <h1 class="mb-5">Giáo Viên Hướng Dẫn </h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{asset('user/img/team-1.jpg')}}" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Robert</h5>
                        <small></small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{asset('user/img/team-2.jpg')}}" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">LyLy</h5>
                        <small>Designation</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{asset('user/img/team-3.jpg')}}" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Alex</h5>
                        <small>Designation</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{asset('user/img/team-4.jpg')}}" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Mina</h5>
                        <small>Designation</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->


<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
            <h1 class="mb-5">Ý Kiến Của Học Viên</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('user/img/testimonial-1.jpg')}}" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Thế Hiếu</h5>
                <p>Sinh Viên</p>
                <div class="testimonial-text bg-light text-center p-4">
                <p class="mb-0">Lớp học chất lượng, đội ngũ giảng dạy tuyệt vời !</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('user/img/testimonial-2.jpg')}}" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Phan Hải</h5>
                <p>Sinh Viên</p>
                <div class="testimonial-text bg-light text-center p-4">
                <p class="mb-0">bài học dễ hiểu</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('user/img/testimonial-3.jpg')}}" style="width: 80px; height: 80px;">
                <h5 class="mb-0"> Đinh Hùng</h5>
                <p>Sinh Viên</p>
                <div class="testimonial-text bg-light text-center p-4">
                <p class="mb-0">Chất lượng giảng dạy tuyệt vời</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('user/img/testimonial-4.jpg')}}" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Thùy Linh</h5>
                <p>Sinh Viên</p>
                <div class="testimonial-text bg-light text-center p-4">
                <p class="mb-0">Bài học dễ hiểu </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
 @endsection
