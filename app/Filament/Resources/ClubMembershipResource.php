<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClubMembershipResource\Pages;
use App\Models\ClubMembership;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateColumn;

class ClubMembershipResource extends Resource
{
    protected static ?string $model = ClubMembership::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Club Memberships';

    protected static ?string $label = 'Club Membership';
    protected static ?string $pluralLabel = 'Club Memberships';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('club_id')
                    ->relationship('club', 'name')
                    ->required()
                    ->label('Club'),
                Select::make('student_id')
                    ->relationship('student', 'name') // Assuming there's a relationship in the Student model
                    ->required()
                    ->label('Student'),
                TextInput::make('role') // Optional: you can add a role or position in the club
                    ->label('Role'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('club.name')
                    ->sortable()
                    ->label('Club'),
                TextColumn::make('student.name')
                    ->sortable()
                    ->label('Student'),
                TextColumn::make('role')
                    ->label('Role'),
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
            'index' => Pages\ListClubMemberships::route('/'),
            'create' => Pages\CreateClubMembership::route('/create'),
            'edit' => Pages\EditClubMembership::route('/{record}/edit'),
        ];
    }
}
