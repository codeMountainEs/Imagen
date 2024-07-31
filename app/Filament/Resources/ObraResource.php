<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ObraResource\Pages;
use App\Filament\Resources\ObraResource\RelationManagers;
use App\Models\Obra;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ObraResource extends Resource
{
    protected static ?string $model = Obra::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([


                Forms\Components\Section::make('Tipos de Obra')->schema([

                    Forms\Components\TextInput::make('Code'),

                    Forms\Components\Select::make('obra_tipo_id')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->relationship('obra_tipo', 'name'),

                      Forms\Components\Toggle::make('is_active')
                          ->required(),
                ])->columns(3),
                Forms\Components\TextInput::make('name'),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('phone')
                    ->tel(),
                Forms\Components\Textarea::make('street_address')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('location'),
                Forms\Components\TextInput::make('city'),
                Forms\Components\TextInput::make('state'),
                Forms\Components\TextInput::make('zip_code'),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->multiple()
                    ->directory('obras')
                    ->maxFiles(5)
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('1280')
                    ->imageResizeTargetHeight('720')


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('obras_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('obra_tipos_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('zip_code')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListObras::route('/'),
            'create' => Pages\CreateObra::route('/create'),
            'edit' => Pages\EditObra::route('/{record}/edit'),
        ];
    }
}
