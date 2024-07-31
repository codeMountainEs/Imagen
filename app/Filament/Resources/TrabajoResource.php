<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrabajoResource\Pages;
use App\Filament\Resources\TrabajoResource\RelationManagers;
use App\Models\Trabajo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class TrabajoResource extends Resource
{
    protected static ?string $model = Trabajo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Obra')->schema([
                    Forms\Components\Select::make('obra_id')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->relationship('obra', 'name')
                ]),


                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->user()->id)
                    ->required(),


                Forms\Components\TextInput::make('trabajo_tipos_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('code'),
                Forms\Components\TextInput::make('name'),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),



                 Forms\Components\Section::make('Obra')->schema([
                     Forms\Components\FileUpload::make('images')
                         ->image()
                         ->multiple()
                         ->directory('products')
                         ->maxFiles(5)
                         ->imageEditor()
                         ->imageResizeMode('cover')
                         ->imageCropAspectRatio('16:9')
                         ->imageResizeTargetWidth('1280')
                         ->imageResizeTargetHeight('720')
                 ]),

            ]);


    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('obra_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('trabajo_tipos_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
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
            'index' => Pages\ListTrabajos::route('/'),
            'create' => Pages\CreateTrabajo::route('/create'),
            'edit' => Pages\EditTrabajo::route('/{record}/edit'),
        ];
    }
}
