Что было сделано: 

1) установлен laravel 5.8, создан файл .htaccess
   <br>
2) созданы модели и миграции для таблиц Товары и Единицы измерения
<br>
app/Product.php
<br>
Unit.php
<br>
database/migrations/2022_11_07_015001_create_products_table.php
   <br>
2022_11_07_020026_create_units_table.php
   <br>
3) в миграциях добавлены нужные поля, заданы связи между моделями
   <br>
4) добавлен контроллер Товара и валидация в методах добавления и редактирования
   <br>
   app/Http/ProductController.php
   <br>
5) добавлены нужные маршруты (в файле routes/web.php)
   <br>
6) созданы шаблоны
   <br>
Папки layouts и products в папке resources/views
(выводятся ошибки, обработан вариант пустой таблицы Товаров, есть подтверждение удаления)
