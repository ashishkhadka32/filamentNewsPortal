<?php

namespace App\Filament\Widgets;

use App\Models\advertise;
use App\Models\Article;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class statsChart extends BaseWidget
{
    protected function getStats(): array
    {
        $article = Article::where('status', 'approved')->count();
        return [
            Stat::make('Total Categories', Category::where('status','approved')->count()),
            Stat::make('Total Articles', Article::where('status','approved')->count())
            ->description("$article increase")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
            Stat::make('Pending Articles', Article::where('status','pending')->count()),
            Stat::make('Total Advertises', advertise::count()),
        ];
    }
}
