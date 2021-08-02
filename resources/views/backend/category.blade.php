<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../image/favicon.ico" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link href="../css/css.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Backend</title>
</head>
<body>
  <header class="container p-0">
    <div class="row m-0 h-100 align-items-center">
      <div class="col-3 row justify-content-center align-items-center">
        <img src="../image/00cat-256.png" alt="logo" class="logo">
        <h2 class="font-weight-bolder text-pink">貓貓商城</h2>
      </div>
    </div>
  </header>
  <main class="container p-0">
    <div class="row m-0">
      <div class="col-3 sideBar">
        <a href="index.html"><div>Dashboard</div></a>
        <a href="category.html"><div>商品目錄管理</div></a>
        <a href="products.html"><div>商品管理</div></a>
        <a href="members.html"><div>會員管理</div></a>
        <a href="orders.html"><div>訂單管理</div></a>
        <a href="news.html"><div>最新消息管理</div></a>
        <a href="banner.html"><div>輪播圖卡設置</div></a>
      </div>
      <div class="col-9 content">
        <!-- 新增區 -->
        <form>
          <div class="mt-1 form-group row">
            <label for="mainCategory" class="col-2 col-form-label">新增主目錄</label>
            <div class="col-4">
              <input type="text" class="form-control" id="mainCategory">
            </div>
            <button type="button" class="btn btn-info">新增</button>
          </div>
          <div class="form-group row">
            <label for="subCategory" class="col-2 col-form-label">新增子目錄</label>
            <div class="col-4">
              <select id="subCategory-main" class="form-control">
                <option value="" disabled selected>請先選擇主目錄...</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </div>
            <div class="col-4">
              <input type="text" class="form-control" id="subCategory">
            </div>
            <button type="button" class="btn btn-info">新增</button>
          </div>
        </form>
        <!-- 顯示區 -->
        <table class="mt-4 table table-hover">
          <thead class="thead-dark">
            <tr>
            <!-- <tr class="table-active font-weight-bolder"> -->
              <th scope="col" class="col-1">#</th>
              <th scope="col" class="col-3">主目錄</th>
              <th scope="col" class="col-3">子目錄</th>
              <th scope="col" class="col-1">狀態</th>
              <th scope="col" class="col-4">操作</th>
            </tr>
          </thead>
          <tbody>
            <!-- <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>Otto</td>
            </tr> -->
            <tr class="bg-yellow02">
              <th scope="row">2</th>
              <td>Main</td>
              <td></td>
              <td>顯示</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-toggle-off"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-up"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-down"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td></td>
              <td>Thornton</td>
              <td>顯示</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-toggle-off"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-up"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-down"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td></td>
              <td>Thornton</td>
              <td>顯示</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-toggle-off"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-up"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-down"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr class="bg-yellow02">
              <th scope="row">3</th>
              <td>MainMainMainMainMain</td>
              <td></td>
              <td>顯示</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-toggle-off"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-up"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-down"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td></td>
              <td>Thornton</td>
              <td>顯示</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-toggle-off"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-up"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-down"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td></td>
              <td>Thornton</td>
              <td>顯示</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-toggle-off"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-up"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-down"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td></td>
              <td>Thornton</td>
              <td>顯示</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-toggle-off"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-up"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-down"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr class="bg-yellow02">
              <th scope="row">2</th>
              <td>MainMainMain</td>
              <td></td>
              <td>隱藏</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-toggle-on"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-up"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-down"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td></td>
              <td>Thornton</td>
              <td>隱藏</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-toggle-on"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-up"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-down"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td></td>
              <td>Thornton</td>
              <td>隱藏</td>
              <td>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-toggle-on"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-up"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-caret-down"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
  <footer class="container">
    <div class="row justify-content-center">
      <p>Copyright © Lingling Chang a.k.a. MissPigHead 2021</p>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>