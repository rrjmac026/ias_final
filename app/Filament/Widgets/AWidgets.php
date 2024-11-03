<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\Club;
use App\Models\ClubMembership;
use App\Models\Event;
use App\Models\Student;
use App\Models\Invoice;
use App\Models\User;

use Filament\Support\Enums\IconPosition;

use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;



class AWidgets extends BaseWidget
{
    use HasWidgetShield;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Clubs', Club::count())
            ->description('Total Clubs')
            ->descriptionIcon('heroicon-m-calendar', IconPosition::Before)
            ->chart([100, 120, 130, 150, 170, 200]) // Example data
            ->color('danger'),

            Stat::make('Total Memberships', ClubMembership::count())
            ->description('Total Memberships')
            ->descriptionIcon('heroicon-m-calendar', IconPosition::Before)
            ->chart([100, 120, 130, 150, 170, 200]) // Example data
            ->color('primary'),

            Stat::make('Total Events', Event::count())
            ->description('Total Events')
            ->descriptionIcon('heroicon-m-calendar', IconPosition::Before)
            ->chart([100, 120, 130, 150, 170, 200]) // Example data
            ->color('warning'),

            Stat::make('Total Students', Student::count())
            ->description('Total Students')
            ->descriptionIcon('heroicon-m-calendar', IconPosition::Before)
            ->chart([100, 120, 130, 150, 170, 200]) // Example data
            ->color('success'),

            Stat::make('Total Invoices', Invoice::count())
            ->description('Total Invoices')
            ->descriptionIcon('heroicon-m-calendar', IconPosition::Before)
            ->chart([100, 30000, 130, 150, 170, 200]) // Example data
            ->color('danger'),

            Stat::make('Total Users', User::count())
            ->description('Total Users')
            ->descriptionIcon('heroicon-m-calendar', IconPosition::Before)
            ->chart([100, 900, 130, 150, 800, 200]) // Example data
            ->color('danger'),
        ];
    }
}
