<div class="row" id="products">
  @foreach ($products as $product)
    <div class="col-6 col-md-4 col-lg-3 text-center">
      <a href="{{ route('product.show', $product->id) }}">
        <div class="owl-carousel owl-theme bg-dark">
          @foreach ($product->image_path as $image_path)
            <div class="item"><img src="{{ $image_path }}"></div>
          @endforeach
        </div>
        <p class="mb-1 text-secondary small font-weight-light">{{ mb_substr($product->specification,0,10) }}</p>
        <p class="mb-0">{{ $product->name }}</p>
        <p class="font-weight-bolder text-danger">NTD {{ $product->price }}</p>
      </a>
    </div>
  @endforeach
</div>
<div class="row justify-content-center">
  {{ $products->onEachSide(2)->links() }}
</div>
