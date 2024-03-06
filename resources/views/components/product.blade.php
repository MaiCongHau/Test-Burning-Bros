<div class="product">
    <article> <img class="img-responsive" src="images/item-img-1-1.jpg" alt="">

        <!-- Content -->
        <a href="#." class="tittle">{{ $product->name }}</a>
        <!-- Reviews -->
        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">Đã bán
                {{ $product->sold_amount }}</span></p>
        <div class="price">{{ number_format($product->price) }} VND</div> <br>
        <div>Địa chỉ: {{ $product->location->name }}</div>
        <a href="#." class="cart-btn" onclick="addCart(this)" product_id= "{{ $product->id }}"
            product_name="{{ $product->name }}" product_price="{{ $product->price }}"><i
                class="icon-basket-loaded"></i></a>
    </article>
</div>
