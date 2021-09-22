<div class="col-3 sideBar">
  <a href="{{ route('admin') }}">
    <div>Dashboard</div>
  </a>
  <a href="{{ route('admin.category') }}">
    <div>商品目錄區</div>
  </a>
  <a href="{{ route('admin.product') }}">
    <div>商品區</div>
  </a>
  <a href="{{ route('admin.user') }}">
    <div>會員區</div>
  </a>
  <a href="{{ route('admin.order') }}">
    <div>訂單區</div>
  </a>
  <a href="{{ route('admin.news') }}">
    <div>育貓新知區</div>
  </a>
  <a href="{{ route('admin.banner') }}">
    <div>Banner 廣告區</div>
  </a>
  <a href="{{ route('home') }}" target="_blank" class="text-pink">
    <div>前台首頁</div>
  </a>
  <a  href="{{ route('logout') }}"
  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
    <div>登出</div>
  </a>
  {{-- 登出 --}}
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
  {{-- 登出 --}}
</div>
