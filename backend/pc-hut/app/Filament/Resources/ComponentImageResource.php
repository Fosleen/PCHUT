<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComponentImageResource\Pages;
use App\Filament\Resources\ComponentImageResource\RelationManagers;
use App\Models\ComponentImage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComponentImageResource extends Resource
{
    protected static ?string $model = ComponentImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('url')->required(),
                Forms\Components\TextInput::make('component_id')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('url',),
                Tables\Columns\TextColumn::make('component_id',),

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
            'index' => Pages\ListComponentImages::route('/'),
            'create' => Pages\CreateComponentImage::route('/create'),
            'edit' => Pages\EditComponentImage::route('/{record}/edit'),
        ];
    }
}
