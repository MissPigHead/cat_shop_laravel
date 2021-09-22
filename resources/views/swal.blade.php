@php
$msg=isset($msg)?session($msg):'';
@endphp
<script>
  let err = ''
  @foreach ($errors->all() as $error)
    err=err+`<li class='text-left'>{{ $error }}</li>`;
  @endforeach

  Swal.fire({
    icon: `{{ $icon }}`,
    title: `{{ $msg }}`,
    html: `<ul>${err}</ul>`,
  })
</script>
