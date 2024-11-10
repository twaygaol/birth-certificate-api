<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkckResource\Pages;
use App\Filament\Resources\SkckResource\RelationManagers;
use App\Models\Skck;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\LinkColumn;
use Illuminate\Support\Facades\Storage;

class SkckResource extends Resource
{
    protected static ?string $model = Skck::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationLabel = 'Skck';

    protected static ?string $title = 'tambah akta kelahiran';

    protected static ?string $navigationGroup = 'Data pendaftar akta kelahiran';

    public static function getPluralLabel(): ?string
    {
        $locale = app()->getLocale();
        if ($locale == 'id') {
            return "Pendaftar Skck";
        } else
            return "Pendaftar Skck";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Nama')
                    ->required(),
                Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->required(),
                TextInput::make('tempat_tgl_lahir')
                    ->label('Tempat & Tanggal Lahir')
                    ->required(),
                TextInput::make('bangsa_agama')
                    ->label('Bangsa/Agama')
                    ->required(),
                TextInput::make('nik')
                    ->label('NIK')
                    ->required(),
                TextInput::make('pekerjaan')
                    ->label('Pekerjaan')
                    ->required(),
                TextInput::make('alamat')
                    ->label('Alamat')
                    ->required(),
                DatePicker::make('tanggal_surat')
                    ->label('Tanggal Surat')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('nama')
                ->label('Nama')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('jenis_kelamin')
                ->label('Jenis Kelamin')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('tempat_tgl_lahir')
                ->label('Tempat & Tanggal Lahir')
                ->sortable(),
            Tables\Columns\TextColumn::make('bangsa_agama')
                ->label('Bangsa/Agama')
                ->sortable(),
            Tables\Columns\TextColumn::make('nik')
                ->label('NIK')
                ->sortable(),
            Tables\Columns\TextColumn::make('pekerjaan')
                ->label('Pekerjaan')
                ->sortable(),
            Tables\Columns\TextColumn::make('alamat')
                ->label('Alamat')
                ->sortable(),
            Tables\Columns\TextColumn::make('tanggal_surat')
                ->label('Tanggal Surat')
                ->sortable(),
            Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->sortable(),
            Tables\Columns\TextColumn::make('status')
                ->label('status surat')
                ->sortable()
                ->color(fn(string $state): string => match ($state) {
                    'approved' => 'success',
                    'rejected' => 'danger',
                    'pending' => 'warning',
                    default => 'default',
                }),
            Tables\Columns\TextColumn::make('file_pdf')
                ->label('Unduh Berkas')
                ->formatStateUsing(fn ($record) => $record->file_pdf
                    ? '<a href="' . url($record->file_pdf) . '" target="_blank" style="color: blue; text-decoration: underline;">Download</a>'
                    : 'Tidak tersedia'
                )
                ->html(),

        ])
        ->actions([
            Tables\Actions\ViewAction::make()
                ->label('Detail')
                ->color('success'),
            Tables\Actions\EditAction::make()
                ->label('Pesan')
                ->form([
                    Select::make('status')
                        ->required()
                        ->label('Status skck')
                        ->options([
                            'pending' => 'Menunggu',
                            'approved' => 'Disetujui',
                            'rejected' => 'Ditolak',
                        ]),
                ]),
            Tables\Actions\Action::make('delete')
                ->label('Hapus')
                ->icon('heroicon-o-trash')
                ->color('danger'),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSkcks::route('/'),
            'create' => Pages\CreateSkck::route('/create'),
            // 'edit' => Pages\EditSkck::route('/{record}/edit'),
        ];
    }
}
