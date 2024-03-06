@extends('layouts.app')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrap">
        <!-- Header -->
        <header>
            <div class="container">
                <div class="logo"> <a href="index.html"><img src="images/logo.png" alt=""></a> </div>
                <!-- Cart Part -->
                <ul class="nav navbar-right cart-pop">
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false"><span class="itm-cont">{{ Cart::count() }}</span> <i
                                class="flaticon-shopping-bag"></i> <strong>My Cart</strong> <br>
                           </a>
                        <ul class="dropdown-menu cartItem">
                            @include('includes.cart.item')
                            <li class="btn-cart"> <a href="{{route('product.showAllItem')}}" class="btn-round">View Cart</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>
        <!-- Content -->
        <div id="content">
            <!-- Products -->
            <section class="padding-top-40 padding-bottom-60">
                <div class="container">
                    <div class="row">
                        <!-- Shop Side Bar -->
                        <div class="col-md-3">
                            <div class="shop-side-bar">
                                <!-- Categories -->
                                <h6>Địa chỉ</h6>
                                <div>
                                    <ul>
                                        @foreach ($locations as $location)
                                            <li>
                                                <input onclick="findConditions()" id="location_{{ $location->id }}" type="radio" name="location" location="{{$location->slug}}" {{ isset(request()->location) && request()->location == $location->slug ? "checked" : ""}}>
                                                <label for="location_{{ $location->id }}"> {{ $location->name }} </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- Categories -->
                                <h6>Giá tiền</h6>
                                <!-- PRICE -->
                                <div>
                                    <ul>
                                        <li>
                                            <input id="0-500000" onclick="findConditions()" type="radio" name="price" value="0-500000" {{ isset(request()->price) && request()->price == "0-500000" ? "checked" : ""}}>
                                            <label for="0-500000">0-500.000 VND</label>
                                        </li>
                                        <li>
                                            <input id="500000-1500000" onclick="findConditions()" type="radio" name="price" value="500000-1500000" {{ isset(request()->price) && request()->price == "500000-1500000" ? "checked" : ""}}>
                                            <label for="500000-1500000">500.000-1.500.000 VND</label>
                                        </li>
                                        <li>
                                            <input id="1500000-2000000" onclick="findConditions()" type="radio" name="price" value="1500000-2000000" {{ isset(request()->price) && request()->price == "1500000-2000000" ? "checked" : ""}}>
                                            <label for="1500000-2000000" >1.500.000-2.000.000 VND</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Products -->
                        <div class="col-md-9">
                            <!-- Short List -->
                            <div class="short-lst">
                                <ul>
                                    <!-- by Default -->
                                    <li>
                                        <select class="selectpicker" id="sort-select" onchange="findConditions()">
                                            <option value="" selected >Mặc định</option>
                                            <option value="price-asc" data_url="asc" {{ isset(request()->sort) && request()->sort == "asc" ? "selected" : ""}}>Giá tăng dần</option>
                                            <option value="price-desc" data_url="desc" {{ isset(request()->sort) && request()->sort == "desc" ? "selected" : ""}}>Giá giảm dần</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                            <!-- Items -->
                            <div class="item-col-3">
                                <!-- Product -->
                                @foreach ($products as $product)
                                    <x-product :product="$product"/>
                                @endforeach
                                <!-- pagination -->
                                <ul class="pagination">
                                    {{$products->appends(request()->query())->links()}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- End Content -->
    </div>
    <!-- End Page Wrapper -->
    <script>
        var urlCart = @json($urlCart);

        function findConditions() {
            var location = $('input[name="location"]:checked').attr('location');
            var rangePrice = $("#sort-select option:selected").attr('data_url');
            var price = $('input[name="price"]:checked').val();

            var url = '/list?';
            if (location) {
                url += 'location=' + location + '&';
            }
            if (rangePrice) {
                url += 'sort=' + rangePrice + '&';
            }
            if (price) {
                url += 'price=' + price + '&';
            }
            window.location.href = url;
        }

        function addCart(self)
        {
            var product_id = $(self).attr('product_id');
            var product_name = $(self).attr('product_name');
            var product_price = $(self).attr('product_price');

            $.ajax({
                url: '/cart/add',
                type: 'GET',
                data: {
                    product_id: product_id,
                    product_name: product_name,
                    product_price: product_price
                },
                success: function (response) {
                    alert('Thêm sản phẩm vào giỏ hàng thành công');
                    display(response);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert('Xảy ra lỗi, vui lòng thử lại sau');
                }
            });
        }

        function display(response)
        {   
            let cartCount = response.count;
            $('.itm-cont').text(cartCount);
            let html = response.view + '<li class="btn-cart"> <a href="'+urlCart+'" class="btn-round">View Cart</a> </li>';
            $('.cartItem').html(html)
        }
    </script>
@endsection
