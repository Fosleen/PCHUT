<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PSUResource\Pages;
use App\Filament\Resources\PSUResource\RelationManagers;
use App\Models\PSU;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Fieldset;

class PSUResource extends Resource
{
    protected static ?string $model = PSU::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('power')->required(),
                Fieldset::make('Component')
                    ->relationship('component')
                    ->schema([
                        TextInput::make('manufacturer_id'),
                        TextInput::make('model'),
                        TextInput::make('price')->numeric(),
                        TextInput::make('discount')->numeric(),
                        TextInput::make('description'),
                        TextInput::make('product_type_cro')
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('component.model',), //show details from related component
                Tables\Columns\TextColumn::make('component.price',), //show details from related component
                Tables\Columns\TextColumn::make('power',), //show details from related component

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPSUS::route('/'),
            'create' => Pages\CreatePSU::route('/create'),
            'edit' => Pages\EditPSU::route('/{record}/edit'),
        ];
    }
}
