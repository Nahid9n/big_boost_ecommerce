@extends('website.layout.app')
@section('title','Category Page')

@section('body')

    <!-- breadcrumb start -->
    <section class="breadcrumb-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <h2>All Category</h2>
                    </div>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb End -->


    <!-- section start -->
    <section class="section-b-space ratio_square">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 collection-filter">
                        <!-- side-bar colleps block stat -->
                        <div class="collection-filter-block">
                            <!-- brand filter start -->
                            <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title">brand</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        <div class="form-check collection-filter-checkbox">
                                            <input type="checkbox" class="form-check-input" id="zara">
                                            <label class="form-check-label" for="zara">zara</label>
                                        </div>
                                        <div class="form-check collection-filter-checkbox">
                                            <input type="checkbox" class="form-check-input" id="vera-moda">
                                            <label class="form-check-label" for="vera-moda">vera-moda</label>
                                        </div>
                                        <div class="form-check collection-filter-checkbox">
                                            <input type="checkbox" class="form-check-input" id="forever-21">
                                            <label class="form-check-label" for="forever-21">forever-21</label>
                                        </div>
                                        <div class="form-check collection-filter-checkbox">
                                            <input type="checkbox" class="form-check-input" id="roadster">
                                            <label class="form-check-label" for="roadster">roadster</label>
                                        </div>
                                        <div class="form-check collection-filter-checkbox">
                                            <input type="checkbox" class="form-check-input" id="only">
                                            <label class="form-check-label" for="only">only</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- color filter start here -->
                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title">colors</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="color-selector">
                                        <ul>
                                            <li class="color-1 active"></li>
                                            <li class="color-2"></li>
                                            <li class="color-3"></li>
                                            <li class="color-4"></li>
                                            <li class="color-5"></li>
                                            <li class="color-6"></li>
                                            <li class="color-7"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- price filter start here -->
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">price</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        <div class="form-check collection-filter-checkbox">
                                            <input type="checkbox" class="form-check-input" id="hundred">
                                            <label class="form-check-label" for="hundred">$10 - $100</label>
                                        </div>
                                        <div class="form-check collection-filter-checkbox">
                                            <input type="checkbox" class="form-check-input" id="twohundred">
                                            <label class="form-check-label" for="twohundred">$100 - $200</label>
                                        </div>
                                        <div class="form-check collection-filter-checkbox">
                                            <input type="checkbox" class="form-check-input" id="threehundred">
                                            <label class="form-check-label" for="threehundred">$200 - $300</label>
                                        </div>
                                        <div class="form-check collection-filter-checkbox">
                                            <input type="checkbox" class="form-check-input" id="fourhundred">
                                            <label class="form-check-label" for="fourhundred">$300 - $400</label>
                                        </div>
                                        <div class="form-check collection-filter-checkbox">
                                            <input type="checkbox" class="form-check-input" id="fourhundredabove">
                                            <label class="form-check-label" for="fourhundredabove">$400 above</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- silde-bar colleps block end here -->
                        <!-- side-bar single product slider start -->
                        <div class="theme-card">
                            <h5 class="title-border">new product</h5>
                            <div class="offer-slider slide-1">
                                <div>
                                    <div class="media">
                                        <a href="#"><img class="img-fluid " src="../assets/images/product/1.jpg" alt=""></a>
                                        <div class="media-body align-self-center">
                                            <a href="product-page(no-sidebar).html"><h6>richard mcClintock</h6></a>
                                            <h4>$963.00</h4>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <a href="#"><img class="img-fluid " src="../assets/images/product/2.jpg" alt=""></a>
                                        <div class="media-body align-self-center">
                                            <a href="product-page(no-sidebar).html"><h6>richard mcClintock</h6></a>
                                            <h4>$963.00</h4>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <a href="#"><img class="img-fluid " src="../assets/images/product/3.jpg" alt=""></a>
                                        <div class="media-body align-self-center">
                                            <a href="product-page(no-sidebar).html"><h6>richard mcClintock</h6></a>
                                            <h4>$963.00</h4>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="media">
                                        <a href="#"><img class="img-fluid " src="../assets/images/product/4.jpg" alt=""></a>
                                        <div class="media-body align-self-center">
                                            <a href="product-page(no-sidebar).html"><h6>richard mcClintock</h6></a>
                                            <h4>$963.00</h4>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <a href="#"><img class="img-fluid " src="../assets/images/product/5.jpg" alt=""></a>
                                        <div class="media-body align-self-center">
                                            <a href="product-page(no-sidebar).html"><h6>Slim Fit Cotton Shirt</h6></a>
                                            <h4>$963.00</h4>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <a href="#"><img class="img-fluid " src="../assets/images/product/6.jpg" alt=""></a>
                                        <div class="media-body align-self-center">
                                            <a href="product-page(no-sidebar).html"><h6>richard mcClintock</h6></a>
                                            <h4>$963.00</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- side-bar single product slider end -->
                    </div>
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="filter-main-btn"><span class="filter-btn btn btn-solid btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-filter-content">
                                                        <div class="search-count">
                                                            <h5>Showing Categories {{count($categories)}} of {{count($categories)}}</h5></div>
                                                        <div class="collection-view">
                                                            <ul>
                                                                <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="collection-grid-view">
                                                            <ul>
                                                                <li><a href="javascript:void(0)" class="product-2-layout-view"><ul class="filter-select"><li></li><li></li></ul></a></li>
                                                                <li><a href="javascript:void(0)" class="product-3-layout-view"><ul class="filter-select"><li></li><li></li><li></li></ul></a></li>
                                                                <li><a href="javascript:void(0)" class="product-4-layout-view"><ul class="filter-select"><li></li><li></li><li></li><li></li></ul></a></li>
                                                                <li><a href="javascript:void(0)" class="product-6-layout-view"><ul class="filter-select"><li></li><li></li><li></li><li></li><li></li><li></li></ul></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-page-per-view">
                                                            <select>
                                                                <option value="High to low">24 Products Par Page</option>
                                                                <option value="Low to High">50 Products Par Page</option>
                                                                <option value="Low to High">100 Products Par Page</option>
                                                            </select>
                                                        </div>
                                                        <div class="product-page-filter">
                                                            <select>
                                                                <option value="High to low">Sorting items</option>
                                                                <option value="Low to High">50 Products</option>
                                                                <option value="Low to High">100 Products</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-wrapper-grid">
                                            <div class="row">
                                                @foreach($categories as $category)
                                                <div class="col-xl-3 m-2 col-md-4 col-6 col-grid-box border">
                                                        <div class="product-box">
                                                            <div class="img-block p-0">
                                                                <a href="{{route('product.by.category',['id'=>$category->id])}}"><img src="{{asset($category->banner)}}" class=" img-fluid bg-img" alt=""></a>
                                                            </div>
                                                            <div class="product-info p-2">
                                                                <div>
                                                                    <a href="{{route('product.by.category',['id'=>$category->id])}}"><h6>{{$category->name}}</h6></a>
                                                                    <h5>{{count($category->product)}} product</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="product-pagination mb-2">
                                            <div class="theme-paggination-block">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <nav aria-label="Page navigation">
                                                            <ul class="pagination">
                                                                <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span> <span class="sr-only">Previous</span></a></li>
                                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span> <span class="sr-only">Next</span></a></li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <div class="product-search-count-bottom"><h5>Showing Products 1-24 of 10 Result</h5></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section End -->

@endsection
