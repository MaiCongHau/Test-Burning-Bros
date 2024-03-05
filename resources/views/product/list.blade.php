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
                            aria-haspopup="true" aria-expanded="false"><span class="itm-cont">3</span> <i
                                class="flaticon-shopping-bag"></i> <strong>My Cart</strong> <br>
                            <span>3 item(s) - $500.00</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="media-left"> <a href="#." class="thumb"> <img
                                            src="images/item-img-1-1.jpg" class="img-responsive" alt=""> </a> </div>
                                <div class="media-body"> <a href="#." class="tittle">Funda Para Ebook 7" 128GB full
                                        HD</a> <span>250 x 1</span> </div>
                            </li>
                            <li>
                                <div class="media-left"> <a href="#." class="thumb"> <img
                                            src="images/item-img-1-2.jpg" class="img-responsive" alt=""> </a> </div>
                                <div class="media-body"> <a href="#." class="tittle">Funda Para Ebook 7" full HD</a>
                                    <span>250 x 1</span>
                                </div>
                            </li>
                            <li class="btn-cart"> <a href="#." class="btn-round">View Cart</a> </li>
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
                                <div class="checkbox checkbox-primary">
                                    <ul>
                                        <li>
                                            <input id="cate1" class="styled" type="checkbox">
                                            <label for="cate1"> Hồ Chí Minh </label>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Categories -->
                                <h6>Giá tiền</h6>
                                <!-- PRICE -->
                                <div class="checkbox checkbox-primary">
                                    <ul>
                                        <li>
                                            <input id="brand1" class="styled" type="checkbox">
                                            <label for="brand1">500.000 VND</label>
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
                                        <select class="selectpicker">
                                            <option>Mặc định</option>
                                            <option>Giá tiền thấp -> cao</option>
                                            <option>Giá tiền cao -> thấp </option>
                                        </select>
                                    </li>
                                </ul>
                            </div>

                            <!-- Items -->
                            <div class="item-col-3">
                                <!-- Product -->
                                <x-product />

                                <!-- pagination -->
                                <ul class="pagination">
                                    <li><a href="#" aria-label="Previous"> <i class="fa fa-angle-left"></i> </a>
                                    </li>
                                    <li><a class="active" href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#" aria-label="Next"> <i class="fa fa-angle-right"></i> </a> </li>
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
@endsection
