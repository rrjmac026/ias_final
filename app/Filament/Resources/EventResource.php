<?php
namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateColumn;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationLabel = 'Events';

    protected static ?string $label = 'Event';
    protected static ?string $pluralLabel = 'Events';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('club_id')
                    ->relationship('club', 'name')
                    ->required()
                    ->label('Club'),
                TextInput::make('name')
                    ->required()
                    ->label('Event Name'),
                Textarea::make('description')
                    ->label('Description')
                    ->rows(4),
                DatePicker::make('event_date')
                    ->required()
                    ->label('Event Date'),
                TextInput::make('location')
                    ->required()
                    ->label('Location'),
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('name')
                ->sortable()
                ->searchable()
                ->label('Event Name'),
            TextColumn::make('club.name')
                ->sortable()
                ->label('Club'),
            TextColumn::make('location')
                ->label('Location'),
            TextColumn::make('event_date')
                ->label('Event Date'),
        ])
            ->filters([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
