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
    + https://sweetalert2.github.io/#examples
    + https://docs.laravel-excel.com/3.1/getting-started/installation.html
    + https://docs.laravel-excel.com/3.1/exports
    + https://github.com/livewire/sortable
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
8. Modificar plantilla principal **resources\views\layouts\app.blade.php** para capturar los mensajes emitidos por los controladores de la aplicación, colocando un script al final del body.
9. Crear y diseñar vistas:
    + resources\views\articles\index.blade.php
    + resources\views\articles\create.blade.php
    + resources\views\articles\edit.blade.php
    + resources\views\articles\show.blade.php
    + resources\views\articles\tables\action.blade.php
10. Dar nombre **welcome** a la ruta raíz en **routes\web.php**.
11. Instalar dependencia Laravel Excel (verificar que las extenciones requeridas esten habilitadas en **php.ini** / Ver: https://docs.laravel-excel.com/3.1/getting-started/installation.html):
    + $ composer require maatwebsite/excel
12. Crear archivo de exportación a Excel:
    + $ php artisan make:export ArticlesExport --model=Article
    + **Nota**: como este comando no me funcionó, se creo el archivo de forma manual en:
        + app\Exports\ArticlesExport.php
13. Personalizar el controlador livewire **app\Http\Livewire\ArticleTable.php**.
    + **Nota**: en el método **builder** se pueden indicar los campos y relaciones que se deseen mostrar en la tabla.
14. Para cambiar la configirución del idioma ir a **config\app.php** y establecer **local** en **es**.
15. Para traducir Laravel al español:
    + $ php artisan lang:publish
    + $ composer require laravel-lang/common --dev
    + $ php artisan lang:add es

## PARTE IV





## Herramienta para la generación de CRUD
+ https://github.com/flightsadmin/livewire-crud
1. Instalar dependencia **Livewire Crud Generator**:
    + $ composer require flightsadmin/livewire-crud
    + $ php artisan crud:install
2. Generar CRUD del modelo User:
    + $ php artisan crud:generate users
    + **Nota**: dar el nombre de la tabla tal cual está en la base de datos.

