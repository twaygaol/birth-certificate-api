<?php

namespace App\Filament\Resources;

use App\Filament\Resources\N2Resource\Pages;
use App\Filament\Resources\N2Resource\RelationManagers;
use App\Models\N2;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;

class N2Resource extends Resource
{
    protected static ?string $model = N2::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'surat lain';

    protected static ?string $navigationLabel = 'N2';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('nama')
                ->required()
                ->label('Nama'),
            DatePicker::make('tanggal_lahir')
                ->required()
                ->label('Tanggal Lahir'),
            TextInput::make('asal_daerah')
                ->required()
                ->label('Asal Daerah'),
            TextInput::make('status_verifikasi')
                ->required()
                ->label('Status Verifikasi')
                ->placeholder('Misalnya: Terverifikasi, Belum Terverifikasi'),
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('nama')
                ->label('Nama')
                ->sortable(),
            TextColumn::make('tanggal_lahir')
                ->label('Tanggal Lahir')
                ->date()
                ->sortable(),
            TextColumn::make('asal_daerah')
                ->label('Asal Daerah')
                ->sortable(),
            TextColumn::make('status_verifikasi')
                ->label('Status Verifikasi')
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
            'index' => Pages\ListN2S::route('/'),
            'create' => Pages\CreateN2::route('/create'),
            'edit' => Pages\EditN2::route('/{record}/edit'),
        ];
    }
}
