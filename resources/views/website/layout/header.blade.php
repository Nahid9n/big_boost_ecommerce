
<!-- header part start -->
<header class="header-1">
    <div class="mobile-fix-header">
    </div>
    <div class="container">
        <div class="row header-content">
            <div class="col-lg-3 col-6">
                <div class="left-part">
                    <p>free shipping on order over $99</p>
                </div>
            </div>
            <div class="col-lg-9 col-6">
                <div class="right-part">
                    <ul>
                        <li><a href="#">today's deal</a></li>
                        <li><a href="#">gift cards</a></li>
                        <li><a href="#">track order</a></li>
                        <li><a href="#">free shipping</a></li>
                        <li><a href="#">free & easy return</a></li>
                        <li>
                            <div class="dropdown language">
                                <div class="select">
                                    <span>English</span>
                                </div>
                                <input type="hidden" name="language">
                                <ul class="dropdown-menu">
                                    <li id="English">English</li>
                                    <li id="French">French</li>
                                    <li id="Spanish">Spanish</li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown currency">
                                <div class="select">
                                    <span>USD</span>
                                </div>
                                <input type="hidden" name="currency">
                                <ul class="dropdown-menu">
                                    <li id="USD">USD</li>
                                    <li id="EUR">EUR</li>
                                    <li id="INR">INR</li>
                                    <li id="AUD">AUD</li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row header-content">
            <div class="col-12">
                <div class="header-section">
                    <div class="navbar">
                        <a href="javascript:void(0)" onclick="openNav()">
                            <div class="bar-style"><i class="fa fa-bars sidebar-bar" aria-hidden="true"></i></div>
                        </a>
                        <div id="mySidenav" class="sidenav">
                            <a href="javascript:void(0)" class="sidebar-overlay" onclick="closeNav()"></a>
                            <nav class="">
                                <div onclick="closeNav()">
                                    <div class="sidebar-back text-start"><i class="fa fa-angle-left pe-2" aria-hidden="true"></i> Back</div>
                                </div>
                                <ul id="sub-menu" class="sm pixelstrap sm-vertical ">
                                    @foreach($categories as $category)
                                    <li><a href="{{route('product.by.category',['id'=>$category->id])}}">{{$category->name}}</a>
                                        @if(count($category->subCategory) > 0)
                                        <ul>
                                            @foreach($category->subCategory as $subCategory)
                                            <li><a href="">{{ $subCategory->name }}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="brand-logo">
                        <a href="{{route('home')}}"> <img src="{{asset('/')}}website/assets/images/icon/logo.png" class="" alt=""></a>
                    </div>
                    <div class="search-bar">
                        <input class="search__input" type="text" placeholder="Search a product">
                        <div class="search-icon "></div>
                    </div>
                    <div class="nav-icon">
                        <ul>
                            <li class="onhover-div setting-icon">
                                <div><img src="{{asset('/')}}website/assets/images/icon/settings.png" class=" img-fluid setting-img" alt="">
                                    <i class="ti-settings mobile-icon"></i>
                                </div>
                                <div class="show-div setting">
                                    <h6>language</h6>
                                    <ul>
                                        <li class="active"><a href="#">english</a> </li>
                                        <li><a href="#">french</a> </li>
                                    </ul>
                                    <h6>currency</h6>
                                    <ul class="list-inline">
                                        <li><a href="#">euro</a> </li>
                                        <li class="active"><a href="#">rupees</a> </li>
                                        <li><a href="#">pound</a> </li>
                                        <li><a href="#">doller</a> </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="onhover-div search-3">
                                <div onclick="openSearch()">
                                    <i class="ti-search mobile-icon-search" ></i>
                                    <img src="{{asset('/')}}website/assets/images/icon/l-1/search.png" class=" img-fluid search-img" alt="">
                                </div>
                                <div id="search-overlay" class="search-overlay">
                                    <div>
                                        <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
                                        <div class="overlay-content">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <form>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Search a Product">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="onhover-div wishlist-icon" onclick="openWishlist()">
                                <img src="{{asset('/')}}website/assets/images/icon/l-1/wishlist.png" alt=""  class="wishlist-img">
                                <i class="ti-heart mobile-icon"></i>
                                <div class="wishlist icon-detail">
                                    <h6 class="up-cls"><span>0 item</span></h6>
                                    <h6><a href="#">wish list</a></h6>
                                </div>
                            </li>
                            @if(!Session::get('customer_id'))
                            <li class="onhover-div user-icon" onclick="openAccount()">
                                <img src="{{asset('/')}}website/assets/images/icon/l-1/user.png" alt="" class="user-img">
                                <i class="ti-user mobile-icon"></i>

                                <div class="wishlist icon-detail">
                                    <h6 class="up-cls"><span>my account</span></h6>
                                    <h6><a href="{{route('customer.login')}}">login</a> / <a href="{{route('customer.register')}}">sign up</a></h6>
                                </div>
                            </li>
                            @else
                            <li class="onhover-div user-icon my-2">
                                <img src="{{asset('/')}}website/assets/images/icon/l-1/user.png" alt="" class="user-img">
                                <i class="ti-user mobile-icon"></i>
                                <div class="wishlist icon-detail">
                                    <h6 class="up-cls"><span>My Account</span></h6>
                                    <h6><a href="{{route('customer.dashboard')}}">Dashboard</a></h6>
                                </div>
                            </li>
                            @endif
                            <li class="onhover-div cart-icon" onclick="openCart()">
                                <img src="{{asset('/')}}website/assets/images/icon/l-1/shopping-cart.png" alt="" class="cart-image">
                                <i class="ti-shopping-cart mobile-icon"></i>
                                <div class="cart  icon-detail">
                                    <h6 class="up-cls"><span>{{count(Cart::content())}} item</span></h6>
                                    <h6><a href="#">my cart</a></h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-class">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav id="main-nav">
                        <div class="toggle-nav">
                            <i class="ti-menu-alt"></i>
                        </div>
                        <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                            <li>
                                <div class="mobile-back text-end">
                                    Back<i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                                </div>
                            </li>
                            <li class="icon-cls"><a href="#"><i class="fa fa-home home-icon" aria-hidden="true"></i></a></li>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('category')}}">Category</a></li>
                            <li><a href="{{route('product')}}">product</a></li>
                            <li><a href="#">feature</a>
                                <ul>
                                    <li>
                                        <a href="#">portfolio</a>
                                        <ul>
                                            <li><a href="grid-2-col.html">portfolio grid 2</a></li>
                                            <li><a href="grid-3-col.html">portfolio grid 3</a></li>
                                            <li><a href="grid-4-col.html">portfolio grid 4</a></li>
                                            <li><a href="masonary-2-grid.html">masonry grid 2</a></li>
                                            <li><a href="masonary-3-grid.html">masonry grid 3</a></li>
                                            <li><a href="masonary-4-grid.html">masonry grid 4</a></li>
                                            <li><a href="masonary-fullwidth.html">masonry full width</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">elements</a>
                                        <ul>
                                            <li><a href="element-productbox.html">product box</a></li>
                                            <li><a href="element-app.html">application</a></li>
                                            <li><a href="element-banner.html">banner</a></li>
                                            <li><a href="element-category.html">category</a></li>
                                            <li><a href="element-collection-banner.html">collection banner</a></li>
                                            <li><a href="element-logo.html">brand logo</a></li>
                                            <li><a href="element-service.html">service</a></li>
                                            <li><a href="element-tab.html">tab</a></li>
                                            <li><a href="element-tab.html">vertical tab</a>
                                                <ul>
                                                    <li><a href="element-vertical-tab(1).html">tab 1</a></li>
                                                    <li><a href="element-vertical-tab(2).html">tab 2</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">pages</a>
                                <ul>
                                    <li>
                                        <a href="#">account</a>
                                        <ul>
                                            <li><a href="wishlist.html">wishlist</a></li>
                                            <li><a href="cart.html">cart</a></li>
                                            <li><a href="dashboard.html">Dashboard</a></li>
                                            <li><a href="login.html">login</a></li>
                                            <li><a href="register.html">register</a></li>
                                            <li><a href="contact.html">contact</a></li>
                                            <li><a href="forget_pwd.html">forget password</a></li>
                                            <li><a href="profile.html">profile </a></li>
                                            <li><a href="checkout.html">checkout</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about-page.html">about us</a></li>
                                    <li><a href="search.html">search</a></li>
                                    <li><a href="typography.html">typography </a></li>
                                    <li><a href="order-success.html">order success</a></li>
                                    <li><a href="order-history.html">order history</a></li>
                                    <li>
                                        <a href="#">compare</a>
                                        <ul>
                                            <li><a href="compare.html">compare</a></li>
                                            <li><a href="compare-2.html">compare-2 </a></li>
                                        </ul>
                                    </li>
                                    <li><a href="collection.html">collection</a></li>
                                    <li><a href="404.html">404</a></li>
                                    <li><a href="coming-soon.html">coming soon </a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">blog</a>
                                <ul>
                                    <li><a href="blog-page.html">left sidebar</a></li>
                                    <li><a href="blog(right-sidebar).html">right sidebar</a></li>
                                    <li><a href="blog(no-sidebar).html">no sidebar</a></li>
                                    <li><a href="blog-details.html">blog details</a></li>
                                </ul>
                            </li>
                            <li class="mega"><a href="#">Mega menu</a>
                                <ul class="mega-menu feature-menu full-mega-menu">
                                    <li>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xl-2 mega-box">
                                                    <div class="link-section">
                                                        <div class="demo">
                                                            <div class="menu-title">
                                                                <h6>electronics</h6>
                                                            </div>
                                                            <div class="menu-content">
                                                                <img src="{{asset('/')}}website/assets/images/mega-menu/1.jpg" class="mega-menu-img  img-fluid" alt="">
                                                                <ul>
                                                                    <li><a target="_blank" href="#">Mobile phones</a></li>
                                                                    <li><a target="_blank" href="#">televisions</a></li>
                                                                    <li><a target="_blank" href="#">refrigerator</a></li>
                                                                    <li><a target="_blank" href="#">audio devices</a></li>
                                                                    <li><a target="_blank" href="#">Air Conditioners</a></li>
                                                                    <li><a target="_blank" href="#">laptop & PC</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2 mega-box">
                                                    <div class="link-section">
                                                        <div class="demo">
                                                            <div class="menu-title">
                                                                <h6>fashion</h6>
                                                            </div>
                                                            <div class="menu-content">
                                                                <img src="{{asset('/')}}website/assets/images/mega-menu/2.jpg" class="mega-menu-img  img-fluid" alt="">
                                                                <ul>
                                                                    <li><a target="_blank" href="#">woman clothes</a></li>
                                                                    <li><a target="_blank" href="#">men clothes</a></li>
                                                                    <li><a target="_blank" href="#">footewear</a></li>
                                                                    <li><a target="_blank" href="#">accessories</a></li>
                                                                    <li><a target="_blank" href="#">watches</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2 mega-box">
                                                    <div class="link-section">
                                                        <div class="demo">
                                                            <div class="menu-title">
                                                                <h6>beauty products</h6>
                                                            </div>
                                                            <div class="menu-content">
                                                                <img src="{{asset('/')}}website/assets/images/mega-menu/3.jpg" class="mega-menu-img  img-fluid" alt="">
                                                                <ul>
                                                                    <li><a target="_blank" href="#">beauty</a></li>
                                                                    <li><a target="_blank" href="#">personal care</a></li>
                                                                    <li><a target="_blank" href="#">natural care</a></li>
                                                                    <li><a target="_blank" href="#">men</a></li>
                                                                    <li><a target="_blank" href="#">applience</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2 mega-box">
                                                    <div class="link-section">
                                                        <div class="demo">
                                                            <div class="menu-title">
                                                                <h6>home & kitchen</h6>
                                                            </div>
                                                            <div class="menu-content">
                                                                <img src="{{asset('/')}}website/assets/images/mega-menu/4.jpg" class="mega-menu-img  img-fluid" alt="">
                                                                <ul>
                                                                    <li><a target="_blank" href="#">kitchen & dinning</a></li>
                                                                    <li><a target="_blank" href="#">furniture</a></li>
                                                                    <li><a target="_blank" href="#">fine art</a></li>
                                                                    <li><a target="_blank" href="#">kitchen storage</a></li>
                                                                    <li><a target="_blank" href="#">home decor</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2 mega-box">
                                                    <div class="link-section">
                                                        <div class="demo">
                                                            <div class="menu-title">
                                                                <h6>books & movies</h6>
                                                            </div>
                                                            <div class="menu-content">
                                                                <img src="{{asset('/')}}website/assets/images/mega-menu/5.jpg" class="mega-menu-img  img-fluid" alt="">
                                                                <ul>
                                                                    <li><a target="_blank" href="#">all book</a></li>
                                                                    <li><a target="_blank" href="#">audio books</a></li>
                                                                    <li><a target="_blank" href="#">all movies</a></li>
                                                                    <li><a target="_blank" href="#">music</a></li>
                                                                    <li><a target="_blank" href="#">video games</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2 mega-box">
                                                    <div class="link-section">
                                                        <div class="demo">
                                                            <div class="menu-title">
                                                                <h6>baby products</h6>
                                                            </div>
                                                            <div class="menu-content">
                                                                <img src="{{asset('/')}}website/assets/images/mega-menu/6.jpg" class="mega-menu-img  img-fluid" alt="">
                                                                <ul>
                                                                    <li><a target="_blank" href="#">toys & games</a></li>
                                                                    <li><a target="_blank" href="#">baby products</a></li>
                                                                    <li><a target="_blank" href="#">kids fashion</a></li>
                                                                    <li><a target="_blank" href="#">toy gifting store</a></li>
                                                                    <li><a target="_blank" href="#">baby bath & skin</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">{{Session::get('customer_name')}}</a>
                                <ul>
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">
                                            <form action="{{route('customer.logout')}}" method="post">
                                                @csrf
                                                <input type="submit" onclick="return confirm('are you sure to exit ?')" value="Logout" class="btn btn-warning text-white">
                                            </form>
                                        </a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header part end -->

