<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ListingResource\Pages;
use App\Filament\Resources\ListingResource\RelationManagers;
use App\Models\Listing;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ListingResource extends Resource
{
    protected static ?string $model = Listing::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')->required(),
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\FileUpload::make('logo')
                    ->disk('public_uploads')  // Ensure this matches your disk configuration
                    ->directory('logos')      // This specifies the directory under the disk
                    ->image()                 // Optional: if you want to validate image files
                    ->required(),            // Make it required if needed
                Forms\Components\TextInput::make('tags')->required(),
                Forms\Components\TextInput::make('company')->required(),
                Forms\Components\TextInput::make('location')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\TextInput::make('website')->required(),
                Forms\Components\TextInput::make('description')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\ImageColumn::make('logo')      // Display image previews
                    ->disk('public_uploads')                   // Ensure this matches your disk configuration
                    ->directory('logos'),                      // This specifies the directory under the disk
                Tables\Columns\TextColumn::make('tags'),
                Tables\Columns\TextColumn::make('company'),
                Tables\Columns\TextColumn::make('location'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('website'),
                Tables\Columns\TextColumn::make('description'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListListings::route('/'),
            'create' => Pages\CreateListing::route('/create'),
            'edit' => Pages\EditListing::route('/{record}/edit'),
        ];
    }
}
