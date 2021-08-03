@extends('layouts.frontend')
@section('title','歷史訂單')
@section('content')
  <main>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6 text-center">
          <div class="row mt-4 mb-sm-2">
            <div class="col">
              <h4>歷史訂單</h4>
            </div>
          </div>

          <!-- 訂單清單 -->
          <table class="table table-bordered">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="col-3">訂單編號</th>
                <th scope="col" class="col-2">訂單日期</th>
                <th scope="col" class="col-5">品項</th>
                <th scope="col" class="col-2">金額</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <a href="orderDetail.html">
                    202101010001
                  </a>
                </td>
                <td>2021-01-01</td>
                <td class="text-left">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂1</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂2 in</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂3</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂4 ac</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂5</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">...</li>
                  </ul>
                </td>
                <td>NT$ <span>2500</span></td>
              </tr>
              <tr>
                <td>
                  <a href="orderDetail.html">
                    20210101001
                  </a>
                </td>
                <td>2021-01-01</td>
                <td class="text-left">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂1</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂2 in</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂3</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂4 ac</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">小茜豆腐砂小茜豆腐砂5</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">...</li>
                  </ul>
                </td>
                <td>NT$ <span>125000</span></td>
              </tr>
              <tr>
                <td>
                  <a href="productDetail.html">20210505005</a>
                </td>
                <td>2021-05-05</td>
                <td class="text-left">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item py-1 px-2 bg-transparent">超越巔峰無穀貓糧鮭魚鹿肉4LB 1</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">超越巔峰無穀貓糧鮭魚鹿肉4LB 2 in</li>
                    <li class="list-group-item py-1 px-2 bg-transparent">超越巔峰無穀貓糧鮭魚鹿肉4LB 3</li>
                  </ul>
                </td>
                <td>NT$ <span>2500</span></td>
              </tr>
            </tbody>
          </table>

          <!-- 返回 -->
          <a href="products.html">
            <button type="button" class="btn btn-info m-2"><i class="fas fa-chevron-right"></i> 繼續購物</button>
          </a>
        </div>
      </div>
    </div>
  </main>
@endsection