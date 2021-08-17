踩地雷!!
1. PATCH 無法傳form-data 的file >> 非laravel問題, 2011 就有人發現這問題在php 官網提出
https://github.com/laravel/framework/issues/13457
https://bugs.php.net/bug.php?id=55815

2. session 不work >> laravel不是直接使用原生php $SESSION... 要做middleware 加入session項目
https://stackoverflow.com/questions/48397625/unable-to-access-sessions-in-laravel-app-exceptions-handler-php

3. realrashid/sweetslert 套件 >> 不支援 laravel 6.x
```linux
- realrashid/sweet-alert v4.0.0 requires laravel/framework ^7.0|^8.0 -> found laravel/framework[v7.0.0, ..., 7.x-dev, v8.0.0, ..., 8.x-dev] but it conflicts with your root composer.json require (^6.20.26).
```    
4. uxweb/sweet-alert 套件 >> 有其他人反應bug 目前無解  
https://github.com/uxweb/sweet-alert/issues/115  
https://github.com/uxweb/sweet-alert/issues/118  
===> 不再找laravel-sweetalert套件了, 直接用sweetalert就好...
