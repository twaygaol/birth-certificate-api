<?php

namespace App\Filament\Resources;

use App\Filament\Resources\N1Resource\Pages;
use App\Filament\Resources\N1Resource\RelationManagers;
use App\Models\N1;
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

class N1Resource extends Resource
{
    protected static ?string $model = N1::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'surat lain';

    protected static ?string $navigationLabel = 'N1';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_calon_pengantin_pria')
                    ->required()
                    ->label('Nama Calon Pengantin Pria'),
                TextInput::make('nama_calon_pengantin_wanita')
                    ->required()
                    ->label('Nama Calon Pengantin Wanita'),
                DatePicker::make('tanggal_pernikahan')
                    ->required()
                    ->label('Tanggal Pernikahan'),
                TextInput::make('status_persetujuan')
                    ->required()
                    ->label('Status Persetujuan')
                    ->placeholder('Misalnya: Disetujui, Ditolak'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_calon_pengantin_pria')
                    ->label('Nama Calon Pengantin Pria')
                    ->sortable(),
                TextColumn::make('nama_calon_pengantin_wanita')
                    ->label('Nama Calon Pengantin Wanita')
                    ->sortable(),
                TextColumn::make('tanggal_pernikahan')
                    ->label('Tanggal Pernikahan')
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
            'index' => Pages\ListN1S::route('/'),
            'create' => Pages\CreateN1::route('/create'),
            'edit' => Pages\EditN1::route('/{record}/edit'),
        ];
    }
}
