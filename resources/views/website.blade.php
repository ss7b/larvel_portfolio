<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>suhail website</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/website/img/favicon.jpg')}}">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- style switcher -->
    <link rel="stylesheet" href="{{ asset('assets/website/css/skins/color-1.css') }}" class="alternate-style" title="color-1" >
    <link rel="stylesheet" href="{{ asset('assets/website/css/skins/color-2.css') }}" class="alternate-style" title="color-2" disabled>
    <link rel="stylesheet" href="{{ asset('assets/website/css/skins/color-3.css') }}" class="alternate-style" title="color-3" disabled>
    <link rel="stylesheet" href="{{ asset('assets/website/css/skins/color-4.css') }}" class="alternate-style" title="color-4" disabled>
    <link rel="stylesheet" href="{{ asset('assets/website/css/skins/color-5.css') }}" class="alternate-style" title="color-5" disabled>
    <link rel="stylesheet" href="{{ asset('assets/website/css/style-switcher.css') }}">
</head>
<body>
    <div class="main-container">
        <aside class="aside"> 
            <div class="logo">
                <img src="{{asset('assets/website/img/logo.png')}}" alt="logo">
            </div>
            <div class="nav-toggler">
                <span></span>
            </div>
            <nav id="aside-nav">
                <ul>
                    <li><a href="#home" class="active"><i class="fa fa-home"></i>الرئيسية</a></li>
                    <li><a href="#about"><i class="fa fa-user"></i>عني</a></li>
                    <li><a href="#service"><i class="fa fa-list"></i>خدماتي</a></li>
                    <li><a href="#portfolio"><i class="fa fa-briefcase"></i>المعرض</a></li>
                    <li><a href="#contact"><i class="fa fa-comment"></i>تواصل</a></li>
                </ul>
            </nav>
        </aside>
        <div id="overlay"></div>
        <div class="main-content">
            <section class="home section active" id="home">
               <div class="container">
                    <div class="row ">
                        @foreach ($maininfos as $info)
                            
                        
                        <div class="info padd-15">
                            <h3 class="hello">مرحبا, اسمي <span class="name">{{$info->firstName}} {{$info->lastName}} </span></h3>
                            {{-- ToDo add profisson --}}
                            <h3 class="profisson">انا <span class="typing">{{$info->provider}}</span> </h3>
                            <p>{{$info->description}}</p>
                            <a href="{{$info->cv}}" target="_blank" class="btn">وظفني </a>
                        </div>
                        <div class="home-image padding">
                            <img src="{{$info->image}}" alt="">
                        </div>
                        @endforeach
                   </div>
               </div>
               
            </section>
            <section class="section about" id="about">
                <div class="container">
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>عني</h2>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="personal-info">
                            @foreach ($maininfos as $info)
                                <div class="row">
                                    <div class="info-item">
                                        <p>ميلاد: <span id="birthday">{{$info->birthday}}</span></p>
                                    </div>
                                    <div class="info-item">
                                        <p>عمر: <span id="age"></span></p>
                                    </div>
                                    <div class="info-item">
                                        <p>ايميل: <span>{{$info->email}}</span></p>
                                    </div>
                                    <div class="info-item">
                                        <p>الهاتف: <span dir="ltr">+966 {{$info->contact_number}}</span></p>
                                    </div>
                                    <div class="info-item">
                                        <p>مدينه: <span>{{$info->location}}</span></p>
                                    </div>
                                </div>
                                
                            @endforeach
                        </div>
                        <div class="skills">
                            <div class="row">
                                @foreach ($skills as $skill)
                                    <div class="skill-item">
                                        <h5>{{$skill->skill}}</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width:{{$skill->percent}}%;">
                                            </div>
                                            <div class="skill-percent">{{$skill->percent}}%</div>
                                        </div>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="education ">
                            <h3 class="title padd-15">شهادات</h3>
                            <div class="row">
                                <div class="timeline-box">
                                    <div class="timeline shadow-dark">
                                        @foreach ($educations as $education)
                                            <div class="timeline-item">
                                                <div class="circle-dot"></div>
                                                <h3 class="timeline-date">
                                                    <i class="fa fa-calendar"></i> {{$education->from}} - {{$education->to}}
                                                </h3>
                                                <h4 class="timeline-title">{{$education->title}}</h4>
                                                <p class="timeline-text">
                                                    {{$education->provider}}
                                                </p>
                                                <span class="view">عرض الشهادة</span>
                                                <div class="graduation">
                                                        <img src="{{$education->graduation}}" alt="">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="experience padd-15">
                            <h3 class="title">خبرات</h3>
                            <div class="row">
                                <div class="timeline-box">
                                    <div class="timeline shadow-dark">
                                        @foreach ($experiences as $experience)
                                        <div class="timeline-item">
                                            <div class="circle-dot"></div>
                                            <h3 class="timeline-date">
                                                <i class="fa fa-calendar"></i> {{$experience->from}} - {{$experience->to}}
                                            </h3>
                                            <h4 class="timeline-title">{{$experience->title}}</h4>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- -----service  section-->
            <section class="service section " id="service">
                <div class="container">
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>خدماتي</h2>
                        </div>
                    </div>
                    <div class="row ">
                        @foreach ($services as $service)
                        <div class="service-item padd-15">
                            <div class="service-item-inner">
                                <div class="icone">
                                    <i class="{{$service->icon}}"></i>
                                </div>
                                <h4>{{$service->title}}</h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- -----end service  section-->
            <!-- ----- portfolio section -->
            <section class="portfolio section" id="portfolio">
                <div class="container">
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>المعرض</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="portfolio-heading padd-15">
                            <h2>مشاريعي: </h2>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($portfolios as $portfolio)
                            <div class="portfolio-item padd-15">
                                <div class="portfolio-item-inner shadow-dark">
                                    <div class="portfolio-img">
                                        <img src= "{{$portfolio->image}}" alt="">
                                        <a href="{{$portfolio->link}}" target="_blank" class="portfolio-link">عرض المشروع <i class="fa-solid fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- ----- end portfolio section -->
            <section class="contact section" id="contact">
                <div class="container">
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>تواصل</h2>
                        </div>
                    </div>
                    <h3 class="contact-title padd-15">هل لديك اي اسئلة؟</h3>
                    <h4 class="contact-sub-title padd-15"> انا في خدمتك</h4>
                    <div class="row">
                       @foreach ($maininfos as $info)
                         <!-- contact-info-item -->
                         <div class="contact-info-item padd-15">
                            <div class="icon"><i class="fa fa-phone"></i></div>
                            <h4>اتصل بنا</h4>
                            <p dir="ltr">+966 {{$info->contact_number}}</p>
                        </div>
                        <!-- contact-info-item end -->
                         <!-- contact-info-item -->
                         <div class="contact-info-item padd-15">
                            <div class="icon"><i class="fa fa-envelope"></i></div>
                            <h4> email</h4>
                            <p>{{$info->email}}</p>
                        </div>
                        <!-- contact-info-item end -->
                         <!-- contact-info-item -->
                         <div class="contact-info-item padd-15">
                            <div class="icon"><i class="fa fa-globe-americas"></i></div>
                            <h4> موقع الاكتروني</h4>
                            <p>www.suhail.com</p>
                        </div>
                        @endforeach
                        <!-- contact-info-item end -->
                    </div>
                    <h3 class="contact-title padd-15" id="contact">راسلني ع البريد</h3>
                    <h4 class="contact-sub-title padd-15">يسعدني تواصلك</h4>
                    <!-- --------------contact form---------------------- -->
                    <div class="row">
                        <div class="contact-form padd-15">
                            <div class="row">
                                <div class="form-item col-6 padd-15">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="الإسم">
                                    </div>
                                </div>
                                <div class="form-item col-6 padd-15">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="بريد الاكتروني">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="الموضوع">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <div class="form-group">
                                        <textarea  class="form-control" placeholder="رسالة"></textarea>
                                    </div>
                                </div>
                            </div><div class="row">
                                <div class="form-item col-12 padd-15">
                                    <button class="btn" type="submit">ارسل رسالتك</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- =============style-switcher-start -->
    <div class="style-switcher">
        <div class="style-switcher-toggler s-icon">
            <i class="fas fa-cog fa-spin"></i>
        </div>
        <div class="day-night s-icon">
            <i class="fas "></i>
        </div>
        <h4>المظهر</h4>
        <div class="colors">
            <span class="color-1" onclick="setActiveStyle('color-1')"></span>
            <span class="color-2" onclick="setActiveStyle('color-2')"></span>
            <span class="color-3" onclick="setActiveStyle('color-3')"></span>
            <span class="color-4" onclick="setActiveStyle('color-4')"></span>
            <span class="color-5" onclick="setActiveStyle('color-5')"></span>
        </div>
    </div>
    
    <!-- =============style-switcher-end ============-->
    <!-- ==============js ============ -->


    <script src="{{ asset('assets/website/js/script.js') }}"></script>
    <script src="{{ asset('assets/website/js/switcher-style.js') }}"></script>
</body>
</html>