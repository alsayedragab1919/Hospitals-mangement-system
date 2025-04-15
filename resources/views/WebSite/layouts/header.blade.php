<div class="nav-outer clearfix">
    <!--Mobile Navigation Toggler For Mobile--><div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
    <nav class="main-menu navbar-expand-md navbar-light">
        <div class="navbar-header">
            <!-- Togg le Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon flaticon-menu"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
            <ul class="navigation clearfix">
                <li><a href="{{url('/')}}">{{__('Website/Website.home')}}</a></li>
                <li class="dropdown"><a href="#">{{__('Website/Website.about')}}</a>
                    <ul>
                        <li><a href="{{url('about')}}">About Us</a></li>
                        <li><a href="team.html">Our Team</a></li>
                        <li><a href="faq.html">Faq</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="comming-soon.html">Comming Soon</a></li>
                    </ul>
                </li>

                <li class="dropdown"><a href="#">{{__('Website/Website.doctors')}}</a>
                    <ul>
                        <li><a href="doctors.html">Doctors</a></li>
                        <li><a href="doctors-detail.html">Doctors Detail</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">{{__('Website/Website.section')}}</a>
                    <ul>
                        <li><a href="department.html">Department</a></li>
                        <li><a href="department-detail.html">Department Detail</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">{{__('Website/Website.medical_tourism')}}</a>
                    <ul>
                        <li><a href="blog.html">Our Blog</a></li>
                        <li><a href="blog-classic.html">Blog Classic</a></li>
                        <li><a href="blog-detail.html">Blog Detail</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">{{__('Website/Website.patients')}}</a>
                    <ul>
                        <li><a href="shop.html">Shop</a></li>
                        <li><a href="shop-single.html">Shop Details</a></li>
                        <li><a href="shoping-cart.html">Cart Page</a></li>
                        <li><a href="checkout.html">Checkout Page</a></li>
                    </ul>
                </li>

                <li><a href="contact.html">{{__('Website/Website.contact')}}</a></li>

                <li class="dropdown"><a href="#">{{ LaravelLocalization::getCurrentLocaleNative() }}</a>
                    <ul>
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>

    </nav>
    <!-- Main Menu End-->

    <!-- Main Menu End-->
    <div class="outer-box clearfix">
        <!-- Main Menu End-->
        <div class="nav-box">
            <div class="nav-btn nav-toggler navSidebar-button"><span class="icon flaticon-menu-1"></span></div>
        </div>

        <!-- Social Box -->
        <ul class="social-box clearfix">
            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
            <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
            <li><a title="تسجيل دخول" href="{{route('dashboard.user')}}"><span class="fas fa-user"></span></a>
            </li>


        </ul>

        <!-- Search Btn -->
        <div class="search-box-btn"><span class="icon flaticon-search"></span></div>

    </div>
</div>
