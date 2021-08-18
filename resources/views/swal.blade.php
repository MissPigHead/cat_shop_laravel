<script>
  let code = ''

  @foreach ($errors->all() as $error)
    code=code+`<li class='text-left'>{{ $error }}</li>`;
  @endforeach

  Swal.fire({
    icon: 'error',
    //   title: '請依照以下提示修正輸入內容',
    text: 'Something went wrong!',
    html: `<ul>${code}</ul>`,
  })
</script>
