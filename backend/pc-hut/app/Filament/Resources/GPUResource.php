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
                // Tables\Columns\TextColumn::make('model'),
                // Tables\Columns\TextColumn::make('memory'),
                // Tables\Columns\TextColumn::make('price'),
                // Tables\Columns\TextColumn::make('manufacturer_id'),
                // Tables\Columns\TextColumn::make('description'),
                // Tables\Columns\TextColumn::make('discount'),
                // Tables\Columns\TextColumn::make('productable_id'),
                // Tables\Columns\TextColumn::make('productable_type'),
                Tables\Columns\TextColumn::make('component.model',), //show details from related component
                Tables\Columns\TextColumn::make('component.price',), //show details from related componen
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

    public static function store(Request $request)
    {
        $validatedData = $request->validate([
            'model' => 'required',
            'memory' => 'required',
            'price' => 'required',
            'manufacturer_id' => 'required',
            'description',
            'discount',
        ]);

        try {
            // Create the GPU
            $gpu = GPU::create($validatedData);

            // Create the associated component
            $component = new Component([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'discount' => $request->discount,
                'product_type_cro' => "Grafička kartica",
            ]);

            // Save the component
            $gpu->component()->save($component);

            return redirect()->route('gpu.index')->with('success', 'GPU created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error creating GPU: ' . $e->getMessage());
        }
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
