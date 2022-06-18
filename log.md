<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## 修改日志

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

2022-06-01
- routes/api.php
- app/Http/Controllers/UserController.php
- app/Http/Kernel.php
- app/Http/Middleware/CheckToken.php
- app/Http/Middleware/CrosMiddleware.php
- app/Entities/User.php
- config/auth.php

2022-06-15
- app/Http/Controllers/HomeController.php  
- app/Repositories/HomeSettingRepositoryEloquent.php
- app/Entities/Cases.php
- app/Entities/Article.php
- app/Entities/ArticleCate.php
- app/Entities/CasesCate.php
- article.sql

2022-06-16
- app/Http/Controllers/ProductsController.php
- app/Http/Controllers/ProductCatesController.php
- app/Repositories/ProductRepositoryEloquent.php
- app/Repositories/ProductCateRepositoryEloquent.php
- public/static/home/Inventory.js
- public/static/home/InventoryConf.js
- public/static/home/InventoryProLvl.js
- resources/views/products/index.blade.php
- routes/web.php
- resources/views/layouts/frame.blade.php
- resources/views/products/detail.blade.php
- resources/views/articles/index.blade.php
- app/Http/Controllers/ArticlesController.php
- resources/views/articles/detail.blade.php
- app/Repositories/ArticleRepositoryEloquent.php
- resources/views/articles/index.blade.php
SQL：
- INSERT INTO `kuao`.`web_settings`(`id`, `location`, `name_attr`, `name`, `type`, `content`) VALUES (18, 'common', 'loading_img', '加载图标', 4, '/static/home/puri-plug/Images/loading.gif');



