<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;

class ArticleTable extends DataTableComponent
{
    // protected $model = Article::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
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
                ->sortable(),
        ];
    }

    public function builder(): Builder {
        return Article::query()->with('user');
    }
}
