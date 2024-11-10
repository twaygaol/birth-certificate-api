<?php

namespace App\Filament\Resources;

use App\Filament\Resources\N4Resource\Pages;
use App\Filament\Resources\N4Resource\RelationManagers;
use App\Models\N4;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextArea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class N4Resource extends Resource
{
    protected static ?string $model = N4::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'surat lain';

    protected static ?string $navigationLabel = 'N4';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('nama_ayah')
                ->label('Nama Ayah')
                ->required()
                ->maxLength(255),
            TextInput::make('nama_ibu')
                ->label('Nama Ibu')
                ->required()
                ->maxLength(255),
            TextArea::make('hubungan')
                ->label('Hubungan')
                ->required()
                ->maxLength(500),
            Select::make('status_kewarganegaraan')
                ->label('Status Kewarganegaraan')
                ->options([
                    'WNI' => 'WNI',
                    'WNA' => 'WNA',
                ])
                ->required(),
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('nama_ayah')
                ->label('Nama Ayah')
                ->sortable(),
            Tables\Columns\TextColumn::make('nama_ibu')
                ->label('Nama Ibu')
                ->sortable(),
            Tables\Columns\TextColumn::make('hubungan')
                ->label('Hubungan')
                ->limit(50),
            Tables\Columns\TextColumn::make('status_kewarganegaraan')
                ->label('Status Kewarganegaraan')
                ->sortable(),
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
            'index' => Pages\ListN4S::route('/'),
            'create' => Pages\CreateN4::route('/create'),
            'edit' => Pages\EditN4::route('/{record}/edit'),
        ];
    }
}
