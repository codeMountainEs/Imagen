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

class TrabajoResource extends Resource
{
    protected static ?string $model = Trabajo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            Forms\Components\Section::make('Datos Trabajo')->schema([
                Forms\Components\Select::make('trabajo_tipo_id')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->relationship('trabajo_tipo', 'name'),
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->user()->id)
                    ->required(),

                Forms\Components\Toggle::make('is_active')
                    ->default(true)
                    ->required(),



            ])->columns(2),




             Forms\Components\Section::make('Datos Trabajo')->schema([

                Forms\Components\Select::make('obra_id')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->relationship('obra', 'name'),


                Forms\Components\TextInput::make('code')->label('Código'),
                Forms\Components\TextInput::make('name')->label('Nombre')->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('description')->label('Descripción')
                    ->columnSpanFull(),
             ])->columns(2),



                Forms\Components\Section::make('Immágenes del Trabajo')->schema([

                    Forms\Components\FileUpload::make('images')
                        ->directory('trabajos')
                        ->multiple()
                        ->maxFiles(5)
                        ->reorderable()
                        ->imageEditor()
                        ->imageResizeMode('cover')
                        ->imageCropAspectRatio('16:9')
                        ->imageResizeTargetWidth('1280')
                        ->imageResizeTargetHeight('720')
                        ->columnSpanFull()
                    ,

                ])->columns(1),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              Tables\Columns\TextColumn::make('obra.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),


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
