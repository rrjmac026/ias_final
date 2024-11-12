<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use App\Models\Event;
use App\Models\ClubMembership;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class LineChart extends ChartWidget
{
    protected static ?string $heading = 'Chart 2';

    use HasWidgetShield;

    protected function getData(): array
    {
        // Get student data per month
        $studentData = Trend::model(Student::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        // Get event data per month
        $eventData = Trend::model(Event::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        // Get club membership data per month
        $clubMembershipData = Trend::model(ClubMembership::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Students',
                    'data' => $studentData->map(fn (TrendValue $value) => $value->aggregate)->toArray(),
                    'backgroundColor' => '#4CAF50',  // Green color
                    'borderColor' => '#81C784',  // Lighter green
                    'fill' => false,
                ],
                [
                    'label' => 'Events',
                    'data' => $eventData->map(fn (TrendValue $value) => $value->aggregate)->toArray(),
                    'backgroundColor' => '#F59E0B',  // Filament warning color
                    'borderColor' => '#F59E0B',  // Same warning color for border
                    'fill' => false,
                ],
                [
                    'label' => 'Club Memberships',
                    'data' => $clubMembershipData->map(fn (TrendValue $value) => $value->aggregate)->toArray(),
                    'backgroundColor' => '#2196F3',  // Blue color
                    'borderColor' => '#64B5F6',  // Lighter blue
                    'fill' => false,
                ],
            ],
            'labels' => $studentData->map(fn (TrendValue $value) => Carbon::parse($value->date)->format('M'))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
