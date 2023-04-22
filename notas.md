# Implementa DataTable con Laravel Livewire: Guía paso a paso
+ URL: https://codersfree.com/cursos/implementa-datatables-con-laravel-livewire

## PARTE I
1. Crear proyecto (con livewire y phpunit):
    + $ laravel new datatable --jet
2. Crear base datos **datatable**.
3. Ejecutar migraciones:
    + $ php artisan migrate
4. Ejecutar el compilador de VITE:
    + $ npm run dev

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

## PARTE III
+ **Documentaciónn**: 
    + https://rappasoft.com/docs/laravel-livewire-tables/v2/start/installation
    + https://rappasoft.com/docs/laravel-livewire-tables/v2/start/configuration
    + https://laravel.com/docs/10.x/localization
    + https://laravel-lang.com/installation
1. Instalar paquete laravel-livewire-tables:
    + $ composer require rappasoft/laravel-livewire-tables
2. Publicar Assets:
    + $ php artisan vendor:publish --provider="Rappasoft\LaravelLivewireTables\LaravelLivewireTablesServiceProvider" --tag=livewire-tables-config
    + $ php artisan vendor:publish --provider="Rappasoft\LaravelLivewireTables\LaravelLivewireTablesServiceProvider" --tag=livewire-tables-views
    + $ php artisan vendor:publish --provider="Rappasoft\LaravelLivewireTables\LaravelLivewireTablesServiceProvider" --tag=livewire-tables-translations
    + **Nota**: en el archivo de configuración **config\livewire-tables.php** se puede elegir trabajar con bootstrap en lugar de tailwindcss.
3. Crear componente livewire datatable (de último se indica el modelo a víncular):
    + $ php artisan make:datatable ArticleTable Article
4. Modificar la vista **resources\views\dashboard.blade.php** para que muestre el datatable Article.
5. Para poder cargar los estilos, ejecutar:
    + $ npm run build
6. Para incluir nuestro estilos crear **resources\css\components.css**.
7. Importar los estilos anteriores en **resources\css\app.css**.
8. Dar nombre **welcome** a la ruta raíz en **routes\web.php**.
9. Personalizar el controlador livewire **app\Http\Livewire\ArticleTable.php**.
    + **Nota**: en el método **builder** se pueden indicar los campos y relaciones que se deseen mostrar en la tabla.
10. Para cambiar la configirución del idioma ir a **config\app.php** y establecer **local** en **es**.
11. Para traducir Laravel al español:
    + $ php artisan lang:publish
    + $ composer require laravel-lang/common --dev
    + $ php artisan lang:add es

## PARTE IV


