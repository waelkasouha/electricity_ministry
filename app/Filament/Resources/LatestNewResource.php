<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LatestNewResource\Pages;
use App\Filament\Resources\LatestNewResource\RelationManagers;
use App\Models\LatestNew;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LatestNewResource extends Resource
{
    protected static ?string $model = LatestNew::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),

                TextInput::make('slug')
                    ->required()
                    ->unique(),

                MarkdownEditor::make('content')
                    ->required(),

                FileUpload::make('imageUrl')
                    ->label('Image')
                    ->disk('public')
                    ->directory('latest-news-images')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),

                TextColumn::make('slug'),

                ImageColumn::make('imageUrl')
                    ->label('Image'),
                TextColumn::make('created_at')
                    ->label('Published At')
                    ->date(' Y M D')
                    ->sortable()
                    ->searchable()
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
            'index' => Pages\ListLatestNews::route('/'),
            'create' => Pages\CreateLatestNew::route('/create'),
            'edit' => Pages\EditLatestNew::route('/{record}/edit'),
        ];
    }
}
