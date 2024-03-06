@foreach (Cart::content() as $item)
<li>
    <div class="media-left"> <a href="#." class="thumb"> <img
                src="images/item-img-1-1.jpg" class="img-responsive" alt=""> </a> </div>
    <div class="media-body"> <a href="#." class="tittle">{{ $item->name }}</a> <span>{{ number_format($item->price) }} x  {{ $item->qty }}</span> </div>
</li>
@endforeach