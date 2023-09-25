<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GPUResource\Pages;
use App\Models\Component;
use App\Models\GPU;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Fieldset;

use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class GPUResource extends Resource
{
    protected static ?string $model = GPU::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('memory')->required(),
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

                Tables\Columns\TextColumn::make('component.model'), //show details from related component
                Tables\Columns\TextColumn::make('component.price'), //show details from related componen
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

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
            'index' => Pages\ListGPUS::route('/'),
            'create' => Pages\CreateGPU::route('/create'),
            'edit' => Pages\EditGPU::route('/{record}/edit'),
        ];
    }
}
