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
      {{-- v-model="item5.OUTPUT" class="NUM-INPUT" --}}
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
    // 限制輸入訂購數量不能大於庫存
    $('input[name="quantity"]').change(function (e) {
        e.preventDefault();
        if($('input[name="quantity"]').val()>{{ $product->in_stock }}){
            $('input[name="quantity"]').val({{ $product->in_stock }})
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
            // } else if (result.status == 422) {
            // let err = ''
            // $.each(result.responseJSON.errors, function(indexInArray, valueOfElement) {
            //   $.each(valueOfElement, function(i, e) {
            //     err = err + `<li class='text-left'>${e}</li>`
            //   });
            // });
            // Swal.fire({
            //   icon: 'error',
            //   html: `<ul>${err}</ul>`,
            // })
          } else {
            console.log(response)
          }
        }
      });
    @else
      location.replace('{{ route('login') }}')
      console.log('no')
    @endif
  });
</script>
