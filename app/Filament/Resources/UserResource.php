<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Spatie\Permission\Models\Role;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    
    protected static ?string $navigationLabel = 'Users';
    protected static ?string $navigationGroup = 'User Management';
    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
        {
            return $form
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->unique(User::class, 'name', ignoreRecord: true) // Ensures name is unique, ignoring current record on edit
                        ->label('Name'),

                    Forms\Components\TextInput::make('email')
                        ->required()
                        ->email()
                        ->unique(User::class, 'email', ignoreRecord: true) // Ensures email is unique, ignoring current record on edit
                        ->label('Email'),

                    Forms\Components\TextInput::make('password')
                        ->password()
                        ->minLength(8)
                        ->dehydrated(fn ($state): bool => filled($state))
                        ->dehydrateStateUsing(fn ($state) => Hash::make($state)),

                    Forms\Components\Select::make('roles')
                        ->relationship('roles', 'name')
                        ->multiple()
                        ->required(),

                    // Add the expiry date as a default field
                    Forms\Components\DatePicker::make('account_expires_at')
                        ->label('Account Expiry Date')
                        ->default(fn () => Carbon::now()->addDays(150)) // Default to 150 days from now
                        ->minDate(Carbon::now()), // Ensure it can't be set in the past
                ]);
        }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name'),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('roles.name')->label('Role'),
                TextColumn::make('account_expires_at') // Display expiry date in the table
                    ->label('Account Expiry Date')
                    ->date() // Format as a date
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
