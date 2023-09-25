<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KeyboardResource\Pages;
use App\Filament\Resources\KeyboardResource\RelationManagers;
use App\Models\Keyboard;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Fieldset;

class KeyboardResource extends Resource
{
    protected static ?string $model = Keyboard::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('switch_type_id')->required(),
                Forms\Components\TextInput::make('rgb')->required(),
                Forms\Components\TextInput::make('wired')->required(),
                Forms\Components\TextInput::make('connector')->required(),
                Forms\Components\TextInput::make('type')->required(),

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
                Tables\Columns\TextColumn::make('component.model'),
                Tables\Columns\TextColumn::make('component.price'),
                Tables\Columns\TextColumn::make('wired'),
                Tables\Columns\TextColumn::make('rgb'),
                Tables\Columns\TextColumn::make('connector'),
                Tables\Columns\TextColumn::make('type'),


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
            'index' => Pages\ListKeyboards::route('/'),
            'create' => Pages\CreateKeyboard::route('/create'),
            'edit' => Pages\EditKeyboard::route('/{record}/edit'),
        ];
    }
}
