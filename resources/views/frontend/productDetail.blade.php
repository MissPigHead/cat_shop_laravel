<div class="row" id="products">
  <div class="col-12 col-md-10 text-center my-3 topic">{{ $product->name }}</div>
  <div class="col-6 col-md-5">
    <div class="owl-carousel owl-theme">
      @foreach ($product->image_path as $image_path)
        <div class="item"><img src="{{ $image_path }}"></div>
      @endforeach
    </div>
  </div>
  <div class="col-6 col-md-5 pl-0 align-content-start">
    <h5 class="font-weight-bolder text-danger mb-2 mb-sm-3">NT$ {{ $product->price }}</h5>
    <div class="mb-2 mb-sm-3">
      {{ $product->specification }}{{ $product->specification }}{{ $product->specification }}{{ $product->specification }}{{ $product->specification }}
    </div>
    <div class="mb-2 mb-sm-3">
      庫存：{{ $product->in_stock }}
    </div>
    <div class="mb-2 mb-sm-3">
      訂購：
      <input type="number" name="quantity" value="1"
      min="1" step="1" max="{{ $product->in_stock > 999 ? 999 : $product->in_stock }}"
      oninput="this.value=this.value.replace(/[^0-9.]+/g,'');">
      <button type="button" class="btn text-pink pl-0 pl-sm-2" id="addToCart">
        <i class="fas fa-cart-plus fa-12x"></i>
      </button>
    </div>
  </div>
  <div class="col-12 col-md-10 pt-2">
    <p class="text-secondary">{{ $product->description }}</p>
  </div>
</div>

<script>
    // 限制輸入訂購數量不能大於庫存，不能小於1
    $('input[name="quantity"]').change(function (e) {
        e.preventDefault();
        if($('input[name="quantity"]').val()>{{ $product->in_stock }}){
            $('input[name="quantity"]').val({{ $product->in_stock }})
        }else if($('input[name="quantity"]').val()<1){
            $('input[name="quantity"]').val(1)
        }
    });

    // 加入購物車
  $('#addToCart').click(function(e) {
    e.preventDefault();
    @if (Auth::check())
      let data={
            _token: '{{ csrf_token() }}',
            product_id: {{ $product->id }},
            quantity: $('input[name="quantity"]').val(),
            }
      $.ajax({
          type: "post",
          url: "{{ route('api.cart.store') }}",
          data: data,
          dataType: "json",
          error: function (response) {
            if (response.status == 200) {
                console.log(200)
                Swal.fire({
                    icon: 'success',
                    html:'商品已加入購物車 <a href="{{ route('cart') }}"><i class="fas fa-shopping-cart"></i></a>',
                    timer:1500,
                })
          } else {
            console.log(response)
          }
        }
      });
    @else
        Swal.fire({
            icon: 'warning',
            title:'請登入會員才能選購哦！',
            confirmButtonText: '登入去'
        }).then((re)=>{
              location.replace('{{ route('login') }}')
        })
    @endif
  });
</script>
