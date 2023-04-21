# Implementa DataTable con Laravel Livewire: Guía paso a paso
+ URL: https://codersfree.com/cursos/implementa-datatables-con-laravel-livewire

## PARTE I
1. Crear proyecto (con livewire y phpunit):
    + $ laravel new datatable --jet
2. Crear base datos **datatable**.
3. Ejecutar migraciones:
    + $ php artisan migrate

## PARTE II
1. Ejecutar:
    + $ php artisan make:model Article -m
2. Establecer campos en la migración correspondiente a la tabla **articles**.
3. Ejecutar:
    + $ php artisan migrate
    + $ php artisan make:factory ArticleFactory
4. Definir datos de prueba en **database\factories\ArticleFactory.php**.
5. Programar la creación de 150 registros indicados en el factory anterior en el seeder **database\seeders\DatabaseSeeder.php**.
6. Habilitar asignación másiva y establecer relaciones en los modelos **Article** y **User**.
7. Crear observer:
    + $ php artisan make:observer ArticleObserver
8. Programar observer **app\Observers\ArticleObserver.php**.
9. Registrar el observer en **app\Providers\EventServiceProvider.php**.
10. Ejecutar:
    + $ php artisan db:seed
11. mmm


