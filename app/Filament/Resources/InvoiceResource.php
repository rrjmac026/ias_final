<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Models\Invoice;
use App\Models\Student; // Ensure to import the Student model
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                    ->label('Student') // Add a label for clarity
                    ->relationship('student', 'name') // Assuming 'name' is the display column in the Student model
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric() // Ensure it's a numeric input
                    ->minValue(0), // Optionally set a minimum value
                Forms\Components\Select::make('status')
                    ->label('Status') // Add a label for clarity
                    ->options([
                        1 => 'Paid', // Assuming 1 represents paid
                        0 => 'Due',  // Assuming 0 represents due
                    ])
                    ->required(),
                Forms\Components\Textarea::make('description') // Correctly placed in the form
                    ->label('Description')
                    ->nullable(), // Allow it to be nullable if you want
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name') // Ensure to access the student's name
                ->searchable()
                ->label('Student'),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Amount'),
                Tables\Columns\BooleanColumn::make('status')
                    ->label('Paid Status')
                    ->trueIcon('heroicon-o-check') // Correct icon name for true status
                    ->falseIcon('heroicon-o-x-mark'), // Correct icon name for false status
                Tables\Columns\TextColumn::make('description') // Display the description in the table
                    ->label('Description'),
            ])
            ->filters([/* Define any filters if necessary */])
                ->actions([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [/* Define any relations if necessary */];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
