<!--category toggle section start-->
<section class="category_tog">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <ul>
                    <li class="dropdown-holder hassubs list-inline-item mr-0"><a href="#"><i style="margin-right: 10px;" class="fa fa-bars" ></i>All Category</a>
                        <ul>
                            @foreach($categories as $category)
                            <li><a href="{{route('product.by.category',['id'=>$category->id])}}">{{$category->name}}</a></li>
                            @endforeach
                            <li class="all"><a target="blank"  href="{{route('category')}}">All category</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('product')}}">All Products</a></li>
                    <li><a href="#">Hot offers</a></li>
                    <li><a href="#">Gift boxes</a></li>
                    <li><a href="#">Dailly Offer</a></li>
                    <li><a href="{{route('brand')}}">Brand</a></li>
                    <li><a href="#" >More<i style="margin-left: 7px;" class="fa fa-angle-down"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--category toggle section end-->
