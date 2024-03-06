@extends('layouts.app')

@section('content')
    <div id="wrap">
        <!-- Shopping Cart -->
        <section class="shopping-cart padding-bottom-60">
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Items</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Total Price </th>
                            <th>&nbsp; </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $item)
                            <!-- Item Cart -->
                            <tr class="{{ $item->rowId }}">
                                <td>
                                    <div class="media">
                                        <div class="media-left"> <a href="#."> <img class="img-responsive"
                                                    src="images/item-img-1-1.jpg" alt=""> </a> </div>
                                        <div class="media-body">
                                            <p>{{ $item->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center padding-top-60">{{ number_format($item->price) }}</td>
                                <td class="text-center"><!-- Quinty -->
                                    <div class="quinty padding-top-20">
                                        <input type="number" value="{{ $item->qty }}"
                                            onchange="updateQty(this, '{{ $item->rowId }}')"
                                            product-id = "{{ $item->id }}">
                                    </div>
                                </td>
                                <td class="text-center padding-top-60 productItem_{{ $item->id }}">
                                    {{ number_format($item->price * $item->qty) }}</td>
                                <td class="text-center padding-top-60"><a href="#." class="removeItem"
                                        rowId = "{{ $item->rowId }}"><i class="fa fa-close"></i></a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <!-- Promotion -->
                <div class="promo">
                    <!-- Grand total -->
                    <div class="g-totel">
                        <h5>Grand total: <span class="subTotalCart">{{ Cart::subtotal() }}</span></h5>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function updateQty(self, rowId) {
            var qty = $(self).val();
            var product_id = $(self).attr('product-id');
            $.ajax({
                type: "GET",
                url: "/cart/update/" + rowId + "/" + qty,
                success: function(response) {
                    $('.subTotalCart').text(response.subtotal);
                    $('.productItem_' + product_id).text(response.totalprice);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert('Xảy ra lỗi, vui lòng thử lại sau');
                }
            });
        }

        $('.removeItem').click(function(e) {
            var rowId = $(this).attr('rowId');
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "/cart/delete/" + rowId,
                success: function(response) {
                    $('.subTotalCart').text(response.subtotal);
                    $('.' + rowId).remove();
                }
            });
        });
    </script>
@endsection
