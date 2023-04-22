<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class ArticleTable extends DataTableComponent
{
    // protected $model = Article::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
        $this->setSingleSortingDisabled();
    }

    public function columns(): array
    {
        return [
            //Column::make('Orden', 'sort'),
            Column::make('id')
                ->sortable(fn($query, $direction) => $query->orderBy('id', $direction))
                ->collapseOnTablet(),   /* Para colapsar desde un mobil en lugar desde una tablet, tenemos el método: ->collapseOnMobile() */
            Column::make('Autor', 'user.name')
                ->sortable()
                ->searchable(fn($query, $searchTerm) => $query->orWhere('title', 'like', '%' . $searchTerm . '%'))
                ->collapseOnTablet(),
            Column::make('Título', 'title')
                ->sortable()
                ->searchable(),
            BooleanColumn::make('Publicado', 'is_published')
                /* ->setSuccessValue(false),
                ->yesNo() */
                ->sortable()
                ->collapseOnTablet(),
            ImageColumn::make('Imagen')
                ->location(fn() => 'https://cdn.pixabay.com/photo/2012/04/23/16/12/click-38743_1280.png')
                ->collapseOnTablet(),
            Column::make('Fecha creación', 'created_at')
                ->format(fn($value) => $value->format('d/m/Y'))
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make('Acciones')
                    ->label(fn($row) => view('articles.tables.action', [
                        'id' => $row->id
                    ]))
                    ->collapseOnTablet(),
            /* Column::make('Acciones', 'id')
                ->format(fn($value) => view('articles.tables.action', [
                    'id' => $value
                ])), */
            /* -Column::make('Acciones', 'id')
                >format(fn($value) => "<a href='/dashboard?id={$value}' class='btn btn-green'>Ver</a>")
                ->html() */
            /* ButtonGroupColumn::make('Action')
                ->buttons([
                    LinkColumn::make('Action')
                        ->title(fn() => 'Ver')
                        ->location(fn($row) => route('dashboard', [
                            'id' => $row->id
                        ]))
                        ->attributes(fn() => [
                            'class' => 'btn btn-green'
                        ]),
                    LinkColumn::make('Action')
                        ->title(fn() => 'Editar')
                        ->location(fn($row) => route('dashboard', [
                            'id' => $row->id
                        ]))
                        ->attributes(fn() => [
                            'class' => 'btn btn-blue'
                        ])
                ]) */
            /* Column::make("Id", "id")
                ->sortable(),
            Column::make("Title", "title")
                ->sortable(),
            Column::make("Content", "content")
                ->sortable(),
            Column::make("User id", "user_id")
                ->sortable(),
            Column::make("Is published", "is_published")
                ->sortable(),
            Column::make("Sort", "sort")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(), */
        ];
    }

    public function builder(): Builder {
        return Article::query()->with('user');
    }
}
