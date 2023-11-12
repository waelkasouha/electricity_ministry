<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MartyrResource\Pages;
use App\Filament\Resources\MartyrResource\RelationManagers;
use App\Models\Martyr;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MartyrResource extends Resource
{
    protected static ?string $model = Martyr::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->unique(),

                FileUpload::make('imageUrl')
                    ->label('Image')
                    ->disk('public')
                    ->directory('martyrs-images')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),

                ImageColumn::make('imageUrl')
                    ->label('Image'),
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
            'index' => Pages\ListMartyrs::route('/'),
            'create' => Pages\CreateMartyr::route('/create'),
            'edit' => Pages\EditMartyr::route('/{record}/edit'),
        ];
    }
}
