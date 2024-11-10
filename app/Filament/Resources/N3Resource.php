<?php

namespace App\Filament\Resources;

use App\Filament\Resources\N3Resource\Pages;
use App\Filament\Resources\N3Resource\RelationManagers;
use App\Models\N3;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class N3Resource extends Resource
{
    protected static ?string $model = N3::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'surat lain';

    protected static ?string $navigationLabel = 'N3';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_pengantin_pria')
                    ->required()
                    ->label('Nama Pengantin Pria'),
                TextInput::make('nama_pengantin_wanita')
                    ->required()
                    ->label('Nama Pengantin Wanita'),
                DatePicker::make('tanggal_persetujuan')
                    ->required()
                    ->label('Tanggal Persetujuan'),
                TextInput::make('status_persetujuan')
                    ->required()
                    ->label('Status Persetujuan')
                    ->placeholder('Misalnya: Disetujui, Belum Disetujui'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_pengantin_pria')
                    ->label('Nama Pengantin Pria')
                    ->sortable(),
                TextColumn::make('nama_pengantin_wanita')
                    ->label('Nama Pengantin Wanita')
                    ->sortable(),
                TextColumn::make('tanggal_persetujuan')
                    ->label('Tanggal Persetujuan')
                    ->date()
                    ->sortable(),
                TextColumn::make('status_persetujuan')
                    ->label('Status Persetujuan')
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
            'index' => Pages\ListN3S::route('/'),
            'create' => Pages\CreateN3::route('/create'),
            'edit' => Pages\EditN3::route('/{record}/edit'),
        ];
    }
}
