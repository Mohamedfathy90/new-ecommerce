   <!--============================
        MAIN MENU START
    ==============================-->
    <nav class="wsus__main_menu d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="relative_contect d-flex">
                        <div class="wsus_menu_category_bar">
                            <i class="fas fa-bars"></i>
                        </div>
                        
                        @php
                        $categories =\App\Models\Category::where('status','active')
                        ->with(['subcategory'=>function ($query) {
                        $query->where('status', 'active')
                        ->with(['childcategory'=>function ($query) {
                        $query->where('status', 'active');
                        }]);
                        }])
                        ->get() ;
                        @endphp
                        
                        <ul class="wsus_menu_cat_item show_home toggle_menu">
                            @foreach($categories as $category)
                            <li><a class="{{count($category->subcategory)>0 ? 'wsus__droap_arrow' : '' }}"                
                                href="#"><i class="{{$category->icon}}"></i>{{$category->name}}</a>
                                @if(count($category->subcategory)>0)
                                <ul class="wsus_menu_cat_droapdown">
                                @foreach($category->subcategory as $subcategory)
                                <li><a href="#"> {{$subcategory->name}}   
                                <i class="{{count($subcategory->childcategory)>0 ? 'fas fa-angle-right' : '' }}" ></i></a>
                                    @if(count($subcategory->childcategory)>0)
                                    <ul class="wsus__sub_category">
                                    @foreach($subcategory->childcategory as $childcategory)
                                    <li><a href="#">{{$childcategory->name}}</a> </li>
                                    </li>
                                    @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                            </ul>
                            
                           
                        <ul class="wsus__menu_item">
                            <li><a class="active" href="/">home</a></li>
                            <li><a href="product_grid_view.html">shop <i class="fas fa-caret-down"></i></a>
                                <div class="wsus__mega_menu">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-3">
                                            <div class="wsus__mega_menu_colum">
                                                <h4>women</h4>
                                                <ul class="wsis__mega_menu_item">
                                                    <li><a href="#">New Arrivals</a></li>
                                                    <li><a href="#">Best Sellers</a></li>
                                                    <li><a href="#">Trending</a></li>
                                                    <li><a href="#">Clothing</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                    <li><a href="#">Bags</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">Jewlery & Watches</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3">
                                            <div class="wsus__mega_menu_colum">
                                                <h4>men</h4>
                                                <ul class="wsis__mega_menu_item">
                                                    <li><a href="#">New Arrivals</a></li>
                                                    <li><a href="#">Best Sellers</a></li>
                                                    <li><a href="#">Trending</a></li>
                                                    <li><a href="#">Clothing</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                    <li><a href="#">Bags</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">Jewlery & Watches</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3">
                                            <div class="wsus__mega_menu_colum">
                                                <h4>category</h4>
                                                <ul class="wsis__mega_menu_item">
                                                    <li><a href="#"> Healthy & Beauty</a></li>
                                                    <li><a href="#">Gift Ideas</a></li>
                                                    <li><a href="#">Toy & Games</a></li>
                                                    <li><a href="#">Cooking</a></li>
                                                    <li><a href="#">Smart Phones</a></li>
                                                    <li><a href="#">Cameras & Photo</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">View All Categories</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3">
                                            <div class="wsus__mega_menu_colum">
                                                <h4>women</h4>
                                                <ul class="wsis__mega_menu_item">
                                                    <li><a href="#">New Arrivals</a></li>
                                                    <li><a href="#">Best Sellers</a></li>
                                                    <li><a href="#">Trending</a></li>
                                                    <li><a href="#">Clothing</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                    <li><a href="#">Bags</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">Jewlery & Watches</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="vendor.html">vendor</a></li>
                            <li><a href="blog.html">blog</a></li>
                            <li><a href="daily_deals.html">campain</a></li>
                            <li class="wsus__relative_li"><a href="#">pages <i class="fas fa-caret-down"></i></a>
                                <ul class="wsus__menu_droapdown">
                                    <li><a href="404.html">404</a></li>
                                    <li><a href="faqs.html">faq</a></li>
                                    <li><a href="invoice.html">invoice</a></li>
                                    <li><a href="about_us.html">about</a></li>
                                    <li><a href="product_grid_view.html">product</a></li>
                                    <li><a href="check_out.html">check out</a></li>
                                    <li><a href="team.html">team</a></li>
                                    <li><a href="change_password.html">change password</a></li>
                                    <li><a href="custom_page.html">custom page</a></li>
                                    <li><a href="forget_password.html">forget password</a></li>
                                    <li><a href="privacy_policy.html">privacy policy</a></li>
                                    <li><a href="product_category.html">product category</a></li>
                                    <li><a href="brands.html">brands</a></li>
                                </ul>
                            </li>
                            <li><a href="track_order.html">track order</a></li>
                            <li><a href="daily_deals.html">daily deals</a></li>
                        </ul>
                        <ul class="wsus__menu_item wsus__menu_item_right">
                            <li><a href="contact.html">contact</a></li>
                            
                            @auth
                            @if(auth()->user()->role === 'admin')
                            <li><a href="/admin/dashboard">Dashboard</a></li>
                            @elseif(auth()->user()->role === 'vendor')
                            <li><a href="/vendor/dashboard">Account</a></li>
                            @else
                            <li><a href="/user/dashboard">my account</a></li>
                            @endif
                            @endauth
                            <li>@guest
                                <a href="/user/login">login</a></li>
                                @else
                                <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="/logout" onclick="event.preventDefault();this.closest('form').submit();">
                                Log Out
                                </a>
                                </form>
                                @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--============================
        MAIN MENU END
    ==============================-->