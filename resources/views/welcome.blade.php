@extends('website.layouts.master')
@section('content')

    <section class="main-slider-three">
        <div class="banner-carousel">
            <!-- Swiper -->
            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <div class="auto-container">
                        <div class="row clearfix">

                            <!-- Content Column -->
                            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <h2>{{trans('Website/Website.Your_most_trusted_health_partner_for_life')}}</h2>
                                    <div class="text">{{__('Website/Website.We_offer_free_consulting')}}</div>
                                    <div class="btn-box">
                                        <a href="contact.html" class="theme-btn appointment-btn"><span class="txt">{{__('Website/Website.appointment')}}</span></a>
                                        <a href="services.html" class="theme-btn services-btn">{{__('Website/Website.services')}}</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Column -->
                            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="image">
                                        <img src="{{URL::asset('Website/images/main-slider/3.jpg')}}" alt="" />
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


                <div class="swiper-slide slide">
                    <div class="auto-container">
                        <div class="row clearfix">

                            <!-- Content Column -->
                            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <h2>{{trans('Website/Website.Your_most_trusted_health_partner_for_life')}}</h2>
                                    <div class="text">{{__('Website/Website.We_offer_free_consulting')}}</div>
                                    <div class="btn-box">
                                        <a href="contact.html" class="theme-btn appointment-btn"><span class="txt">{{__('Website/Website.appointment')}}</span></a>
                                        <a href="services.html" class="theme-btn services-btn">{{__('Website/Website.services')}}</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Column -->
                            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="image">
                                        <img src="{{URL::asset('Website/images/main-slider/2.jpg')}}" alt="" />
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


                <div class="swiper-slide slide">
                    <div class="auto-container">
                        <div class="row clearfix">

                            <!-- Content Column -->
                            <div class="content-column col-lg-7 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <h2>{{trans('Website/Website.Your_most_trusted_health_partner_for_life')}}</h2>
                                    <div class="text">{{__('Website/Website.We_offer_free_consulting')}}</div>
                                    <div class="btn-box">
                                        <a href="contact.html" class="theme-btn appointment-btn"><span class="txt">{{__('Website/Website.appointment')}}</span></a>
                                        <a href="services.html" class="theme-btn services-btn">{{__('Website/Website.services')}}</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Column -->
                            <div class="image-column col-lg-5 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="image">
                                        <img src="{{URL::asset('Website/images/main-slider/1.jpg')}}" alt="" />
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
    <!-- End Main Slider -->

    <!-- Health Section -->
    <section class="health-section">
        <div class="auto-container">
            <div class="inner-container">

                <div class="row clearfix">

                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="border-line"></div>
                            <!-- Sec Title -->
                            <div class="sec-title">
                                <h2>{{__('Website/Website.how_are_you')}} <br> {{__('Website/Website.pioneering_in_Health')}}</h2>
                                <div class="separator"></div>
                            </div>
                            <div class="text">{{__('Website/Website.Where_you_are_at_the_heart')}}</div>
                            <a href="about.html" class="theme-btn btn-style-one"><span class="txt">{{__('Website/Website.more_about_us')}}</span></a>
                        </div>
                    </div>

                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <img src={{URL::asset('Website/images/main-slider/image-1.png')}} alt="" />
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- End Health Section -->

    <!-- Featured Section -->
    <section class="featured-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Feature Block -->
                <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="upper-box">
                            <div class="icon flaticon-doctor-stethoscope"></div>
                            <h3><a href="#">{{__('Website/Website.medical_treatment')}}</a></h3>
                        </div>
                        <div class="text">{{__('Website/Website.whether_youre_taking')}}</div>
                    </div>
                </div>

                <!-- Feature Block -->
                <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">
                        <div class="upper-box">
                            <div class="icon flaticon-ambulance-side-view"></div>
                            <h3><a href="#">{{__('Website/Website.emergency_help')}}</a></h3>
                        </div>
                        <div class="text">{{__('Website/Website.whether_youre_taking')}}</div>
                    </div>
                </div>

                <!-- Feature Block -->
                <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="500ms" data-wow-duration="1500ms">
                        <div class="upper-box">
                            <div class="icon fas fa-user-md"></div>
                            <h3><a href="#">{{__('Website/Website.qualified_doctors')}}</a></h3>
                        </div>
                        <div class="text">{{__('Website/Website.whether_youre_taking')}}</div>
                    </div>
                </div>

                <!-- Feature Block -->
                <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="750ms" data-wow-duration="1500ms">
                        <div class="upper-box">
                            <div class="icon fas fa-briefcase-medical"></div>
                            <h3><a href="#">{{__('Website/Website.medical_professionals')}}</a></h3>
                        </div>
                        <div class="text">{{__('Website/Website.whether_youre_taking')}}</div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Featured Section -->

    <!-- Department Section Three -->
    <section class="department-section-three">
        <div class="image-layer" style="background-image:url(website/images/background/5.jpg)"></div>
        <div class="auto-container">
            <!-- Department Tabs-->
            <div class="department-tabs tabs-box">
                <div class="row clearfix">
                    <!--Column-->
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <!-- Sec Title -->
                        <div class="sec-title light">
                            <h2>{{__('Website/Website.Department')}}</h2>
                            <div class="separator"></div>
                        </div>
                        <!--Tab Btns-->
                        <ul class="tab-btns tab-buttons clearfix">
                            <li data-tab="#tab-urology" class="tab-btn">{{__('Website/Website.Neurology_Department')}}</li>
                            <li data-tab="#tab-department" class="tab-btn active-btn">{{__('Website/Website.Urology_Department')}}</li>
                            <li data-tab="#tab-gastrology" class="tab-btn">{{__('Website/Website.Gastrology_Department')}}</li>
                            <li data-tab="#tab-cardiology" class="tab-btn">{{__('Website/Website.Cardiology_Department')}}</li>
                            <li data-tab="#tab-eye" class="tab-btn">{{__('Website/Website.Eye_Care_Department')}}</li>
                        </ul>
                    </div>
                    <!--Column-->
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <!--Tabs Container-->
                        <div class="tabs-content">

                            <!-- Tab -->
                            <div class="tab" id="tab-urology">
                                <div class="content">
                                    <h2>{{__('Website/Website.Neurology_Department')}}</h2>
                                    <div class="title">{{__('Website/Website.Neurology_Department')}}</div>
                                    <div class="text">
                                        <p>{{__('Website/Website.Neurosurgery')}}</p>

                                    </div>
                                    <div class="two-column row clearfix">
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3> {{__('Website/Website.Neurology_Service')}} -01 </h3>
                                            <div class="column-text">{{__('Website/Website.Nure')}}</div>
                                        </div>
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3> {{__('Website/Website.Neurology_Service')}} -02 </h3>
                                            <div class="column-text">{{__('Website/Website.Nure')}}</div>
                                        </div>
                                    </div>
                                    <a href="doctors-detail.html" class="theme-btn btn-style-two"><span class="txt">{{__('Website/Website.view_more')}}</span></a>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div class="tab active-tab" id="tab-department">
                                <div class="content">
                                    <h2>{{__('Website/Website.Urology_Department')}}</h2>
                                    <div class="title">{{__('Website/Website.Urology_Department')}}</div>
                                    <div class="text">
                                        <p>{{__('Website/Website.Urology')}}</p>

                                    </div>
                                    <div class="two-column row clearfix">
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>01 - {{__('Website/Website.Urology_Service')}}</h3>
                                            <div class="column-text">{{__('Website/Website.Urolo')}}</div>
                                        </div>
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>02 - {{__('Website/Website.Urology_Service')}}</h3>
                                            <div class="column-text">{{__('Website/Website.Urolo')}}</div>
                                        </div>
                                    </div>
                                    <a href="doctors-detail.html" class="theme-btn btn-style-two"><span class="txt"> {{__('Website/Website.view_more')}}</span></a>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div class="tab" id="tab-gastrology">
                                <div class="content">
                                    <h2>{{__('Website/Website.Gastrology_Department')}}</h2>
                                    <div class="title">{{__('Website/Website.Gastrology_Department')}}</div>
                                    <div class="text">
                                        <p>{{__('Website/Website.Department_of_General_Medicine')}}</p>
                                    </div>
                                    <div class="two-column row clearfix">
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>01 - {{__('Website/Website.Internal_Medicine_Services')}}</h3>
                                            <div class="column-text">{{__('Website/Website.General_Medicine')}}</div>
                                        </div>
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>02 -{{__('Website/Website.Internal_Medicine_Services')}}</h3>
                                            <div class="column-text">{{__('Website/Website.General_Medicine')}}</div>
                                        </div>
                                    </div>
                                    <a href="doctors-detail.html" class="theme-btn btn-style-two"><span class="txt">{{__('Website/Website.view_more')}}</span></a>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div class="tab" id="tab-cardiology">
                                <div class="content">
                                    <h2>{{__('Website/Website.Cardiology_Department')}}</h2>
                                    <div class="title">{{__('Website/Website.Cardiology_Department')}}</div>
                                    <div class="text">
                                        <p>{{__('Website/Website.cardiology')}}</p>
                                    </div>
                                    <div class="two-column row clearfix">
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>01 - {{__('Website/Website.cardiology_department')}}</h3>
                                            <div class="column-text"> {{__('Website/Website.cardiology_department_1')}} </div>
                                        </div>
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>02 - {{__('Website/Website.cardiology_department')}}</h3>
                                            <div class="column-text">{{__('Website/Website.cardiology_department_1')}}</div>
                                        </div>
                                    </div>
                                    <a href="doctors-detail.html" class="theme-btn btn-style-two"><span class="txt">{{__('Website/Website.view_more')}}</span></a>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div class="tab" id="tab-eye">
                                <div class="content">
                                    <h2>{{__('Website/Website.Eye_Care_Department')}}</h2>
                                    <div class="title">{{__('Website/Website.Eye_Care_Department')}}</div>
                                    <div class="text">
                                        <p>{{__('Website/Website.eyeCare')}}</p>
                                    </div>
                                    <div class="two-column row clearfix">
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>01 - {{__('Website/Website.Ophthalmology_Services')}}</h3>
                                            <div class="column-text">{{__('Website/Website.Ophthalmology_Services_1')}}</div>
                                        </div>
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>02 - {{__('Website/Website.Ophthalmology_Services')}}</h3>
                                            <div class="column-text">{{__('Website/Website.Ophthalmology_Services_1')}}</div>
                                        </div>
                                    </div>
                                    <a href="doctors-detail.html" class="theme-btn btn-style-two"><span class="txt">{{__('Website/Website.view_more')}}</span></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Department Section -->

    <!-- Team Section -->
    <section class="team-section">
        <div class="auto-container">

            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>{{__('Website/Website.The_Medical_Specialists')}}</h2>
                <div class="separator"></div>
            </div>

            <div class="row clearfix">

                <!-- Team Block -->
                <div class="team-block col-lg-3 col-md-6 col-sm-20 col-xs-10">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="{{URL::asset('Website/images/resource/team-1.jpg')}}" alt="" />
                            <div class="overlay-box">
                                <ul class="social-icons">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-google"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-skype"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                </ul>
                                <a href="#" class="appointment">{{__('Website/Website.appointments')}}</a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a href="#">{{__('Website/Website.Dr_Andria_Jonea')}}</a></h3>
                            <div class="designation">{{__('Website/Website.Cancer_Specialist')}}</div>
                        </div>
                    </div>
                </div>

                <!-- Team Block -->
                <div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="{{URL::asset('Website/images/resource/team-2.jpg')}}" alt="" />
                            <div class="overlay-box">
                                <ul class="social-icons">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-google"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-skype"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                </ul>
                                <a href="#" class="appointment">{{__('Website/Website.appointments')}}</a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a href="#">{{__('Website/Website.Dr_robet_samith')}}</a></h3>
                            <div class="designation">{{__('Website/Website.Heart_Surgen')}}</div>
                        </div>
                    </div>
                </div>

                <!-- Team Block -->
                <div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="500ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="{{URL::asset('Website/images/resource/team-3.jpg')}}" alt="" />
                            <div class="overlay-box">
                                <ul class="social-icons">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-google"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-skype"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                </ul>
                                <a href="#" class="appointment">{{__('Website/Website.appointments')}}</a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a href="#">{{__('Website/Website.Sharon_Laura')}}</a></h3>
                            <div class="designation">{{__('Website/Website.Family_Physician')}}</div>
                        </div>
                    </div>
                </div>

                <!-- Team Block -->
                <div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="750ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="{{URL::asset('Website/images/resource/team-4.jpg')}}" alt="" />
                            <div class="overlay-box">
                                <ul class="social-icons">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-google"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-skype"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                </ul>
                                <a href="#" class="appointment">{{__('Website/Website.appointments')}}</a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a href="#">{{__('Website/Website.Alex_Furgosen')}}</a></h3>
                            <div class="designation">{{__('Website/Website.Ortho_Specialist')}}</div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End Team Section -->

    <!-- Video Section -->
    <section class="video-section" style="background-image:url(website/images/background/5.jpg)">
        <div class="auto-container">
            <div class="content">
                <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="lightbox-image play-box"><span class="flaticon-play-button"><i class="ripple"></i></span></a>
                <div class="text">{{__('Website/Website.we_are_care_about_your_health')}}</div>
                <h2>{{__('Website/Website.we_care_about_you')}}</h2>
            </div>
        </div>
    </section>
    <!-- End Video Section -->

    <!-- Appointment Section Two -->
    <section class="appointment-section-two">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">

                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-20 col-sm-20">
                        <div class="inner-column wow slideInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <img src="{{URL::asset('Website/images/resource/doctor-2.jpg')}}" alt="" />
                            </div>
                        </div>
                    </div>

                    <!-- Form Column -->
                    <div class="form-column col-lg-5 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <!-- Sec Title -->
                            <div class="sec-title">
                                <h2>{{__('Website/Website.appointments')}}</h2>
                                <div class="separator"></div>
                            </div>

                            <!-- Appointment Form -->
                            <div class="appointment-form">
                               <livewire:appointments.create/>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section Two -->
    <section class="testimonial-section-two">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>{{__('Website/Website.What_patients_say')}}</h2>
                <div class="separator"></div>
            </div>
            <div class="testimonial-carousel owl-carousel owl-theme">

                <!-- Tesimonial Block Two -->
                <div class="testimonial-block-two">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{URL::asset('Website/images/resource/author-3.jpg')}}" alt="" />
                        </div>
                        <div class="text">{{__('Website/Website.1')}}</div>
                        <div class="lower-box">
                            <div class="clearfix">

                                <div class="pull-left">
                                    <div class="quote-icon flaticon-quote"></div>
                                </div>
                                <div class="pull-right">
                                    <div class="author-info">
                                        <h3>{{__('Website/Website.Ronnie_Coleman')}}</h3>
                                        <div class="author">{{__('Website/Website.Chest_patient')}}</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tesimonial Block Two -->
                <div class="testimonial-block-two">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{URL::asset('Website/images/resource/author-5.jpg')}}" alt="" />
                        </div>
                        <div class="text">{{__('Website/Website.1')}}</div>
                        <div class="lower-box">
                            <div class="clearfix">

                                <div class="pull-left">
                                    <div class="quote-icon flaticon-quote"></div>
                                </div>
                                <div class="pull-right">
                                    <div class="author-info">
                                        <h3>{{__('Website/Website.Jack_Moneta')}}</h3>
                                        <div class="author">{{__('Website/Website.Heart_patient')}}</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tesimonial Block Two -->
                <div class="testimonial-block-two">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{URL::asset('Website/images/resource/author-4.jpg')}}" alt="" />
                        </div>
                        <div class="text">{{__('Website/Website.1')}}</div>
                        <div class="lower-box">
                            <div class="clearfix">

                                <div class="pull-left">
                                    <div class="quote-icon flaticon-quote"></div>
                                </div>
                                <div class="pull-right">
                                    <div class="author-info">
                                        <h3>{{__('Website/Website.Max_Winchester')}}</h3>
                                        <div class="author">{{__('Website/Website.Diabetic_patient')}}</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tesimonial Block Two -->
                <div class="testimonial-block-two">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{URL::asset('Website/images/resource/author-6.jpg')}}" alt="" />
                        </div>
                        <div class="text">{{__('Website/Website.1')}}</div>
                        <div class="lower-box">
                            <div class="clearfix">

                                <div class="pull-left">
                                    <div class="quote-icon flaticon-quote"></div>
                                </div>
                                <div class="pull-right">
                                    <div class="author-info">
                                        <h3>{{__('Website/Website.Nasser_El_Sonbaty')}}</h3>
                                        <div class="author">{{__('Website/Website.Kidny_Patient')}}</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Testimonial Section Two -->

    <!-- Counter Section -->
    <section class="counter-section style-two" style="background-image:url(website/images/background/pattern-7.png)">
        <div class="auto-container">

            <!-- Fact Counter -->
            <div class="fact-counter style-two">
                <div class="row clearfix">

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="icon flaticon-logout"></div>
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="2500" data-stop="2350">0</span>
                                </div>
                                <h4 class="counter-title">{{__('Website/Website.Satisfied_patients')}}</h4>
                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="icon flaticon-logout"></div>
                                <div class="count-outer count-box alternate">
                                    +<span class="count-text" data-speed="3000" data-stop="350">0</span>
                                </div>
                                <h4 class="counter-title">{{__('Website/Website.Doctors_Team')}}</h4>
                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="icon flaticon-logout"></div>
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="3000" data-stop="2150">0</span>
                                </div>
                                <h4 class="counter-title">{{__('Website/Website.Success_Mission')}}</h4>
                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="900ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="icon flaticon-logout"></div>
                                <div class="count-outer count-box">
                                    +<span class="count-text" data-speed="2500" data-stop="225">0</span>
                                </div>
                                <h4 class="counter-title">{{__('Website/Website.Successfull_Surgeries')}}</h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- End Counter Section -->

    <!-- Doctor Info Section -->
    <section class="doctor-info-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">

                    <!-- Doctor Block -->
                    <div class="doctor-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <h3>{{__('Website/Website.Working_Hours')}}</h3>
                            <ul class="doctor-time-list">
                                <li>{{__('Website/Website.Mon–Fri')}} <span>8:00am–7:00pm</span></li>
                                <li>{{__('Website/Website.Saturday')}} <span>9:00am–5:00pm</span></li>
                                <li>{{__('Website/Website.Sunday')}} <span>9:00am–3:00pm</span></li>
                            </ul>
                            <h4>{{__('Website/Website.Emergency_Cases')}}</h4>
                            <div class="phone">{{__('Website/Website.Call_us')}} <strong>+898 68679 575 09</strong></div>
                        </div>
                    </div>

                    <!-- Doctor Block -->
                    <div class="doctor-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <h3>{{__('Website/Website.Doctors_Timetable')}}</h3>
                            <div class="text">{{__('Website/Website.Doctors_Timetable_1')}}</div>
                            <a href="#" class="detail">{{__('Website/Website.More_Detail')}}</a>
                        </div>
                    </div>

                    <!-- Doctor Block -->
                    <div class="doctor-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <h3>{{__('Website/Website.Primary_Health_Care')}}</h3>
                            <div class="text">{{__('Website/Website.Primary_Health_Care_1')}}</div>
                            <a href="#" class="detail">{{__('Website/Website.Contact_Now')}}</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Doctor Info Section -->

    <!-- News Section Two -->
    <section class="news-section-two">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>{{__('Website/Website.Latest_News_Articles')}}</h2>
                <div class="separator style-three"></div>
            </div>
            <div class="row clearfix">

                <!-- News Block Two -->
                <div class="news-block-two col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="blog-detail.html"><img src="{{URL::asset('Website/images/resource/')}}" alt="" /></a>
                        </div>
                        <div class="lower-content">
                            <div class="content">
                                <ul class="post-info">
                                    <li><span class="icon flaticon-chat-comment-oval-speech-bubble-with-text-lines"></span> 02</li>
                                    <li><span class="icon flaticon-heart"></span> 126</li>
                                </ul>
                                <ul class="post-meta">
                                    <li>{{__('Website/Website.June_21')}}</li>
                                    <li>{{__('Website/Website.Post_By')}}</li>
                                </ul>
                                <h3><a href="blog-detail.html">{{__('Website/Website.Diagnostic')}} </a></h3>
                                <div class="text">{{__('Website/Website.Diagnostic_1')}}</div>
                                <a href="blog-detail.html" class="theme-btn btn-style-five"><span class="txt">{{__('Website/Website.read_more')}}</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- News Block Two -->
                <div class="news-block-two col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="blog-detail.html"><img src="{{URL::asset('Website/images/resource')}}" alt="" /></a>
                        </div>
                        <div class="lower-content">
                            <div class="content">
                                <ul class="post-info">
                                    <li><span class="icon flaticon-chat-comment-oval-speech-bubble-with-text-lines"></span> 02</li>
                                    <li><span class="icon flaticon-heart"></span> 126</li>
                                </ul>
                                <ul class="post-meta">
                                    <li>{{__('Website/Website.June_21')}}</li>
                                    <li>{{__('Website/Website.Post_By')}}</li>
                                </ul>
                                <h3><a href="blog-detail.html">{{__('Website/Website.Heart')}}</a></h3>
                                <div class="text">{{__('Website/Website.Diagnostic_1')}}</div>
                                <a href="blog-detail.html" class="theme-btn btn-style-five"><span class="txt">{{__('Website/Website.read_more')}}</span></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--Clients Section-->
    <section class="clients-section">
        <div class="outer-container">

            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{URL::asset('Website/images/clients/')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{URL::asset('Website/images/clients/')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{URL::asset('Website/images/clients/')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{URL::asset('Website/images/clients/')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{URL::asset('Website/images/clients/')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{URL::asset('Website/images/clients/')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{URL::asset('Website/images/clients/')}}" alt=""></a></figure></li>
                </ul>
            </div>

        </div>
    </section>
@endsection
