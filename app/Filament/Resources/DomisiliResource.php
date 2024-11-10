<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Domisili;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DomisiliResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DomisiliResource\RelationManagers;

class DomisiliResource extends Resource
{
    protected static ?string $model = Domisili::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static ?string $navigationLabel = 'Domisili';

    protected static ?string $title = 'tambah akta kelahiran';

    // protected static ?string $navigationGroup = 'Data pendaftar akta kelahiran';

    public static function getPluralLabel(): ?string
    {
        $locale = app()->getLocale();
        if ($locale == 'id') {
            return "Pendaftar Domisili";
        } else
            return "Pendaftar Domisili";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_lengkap')
                    ->required()
                    ->label('Nama Lengkap'),
                TextInput::make('jenis_kelamin')
                    ->required()
                    ->label('Jenis Kelamin'),
                TextInput::make('tempat_tgl_lahir')
                    ->required()
                    ->label('Tempat & Tanggal Lahir'),
                TextInput::make('bangsa_agama')
                    ->required()
                    ->label('Bangsa dan Agama'),
                TextInput::make('nik')
                    ->required()
                    ->label('NIK'),
                TextInput::make('pekerjaan')
                    ->required()
                    ->label('Pekerjaan'),
                TextInput::make('alamat')
                    ->required()
                    ->label('Alamat'),
                DatePicker::make('tanggal_surat')
                    ->required()
                    ->label('Tanggal Surat'),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->label('Email'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_lengkap')->label('Nama Lengkap')->sortable(),
                TextColumn::make('jenis_kelamin')->label('Jenis Kelamin')->sortable(),
                TextColumn::make('tempat_tgl_lahir')->label('Tempat & Tanggal Lahir'),
                TextColumn::make('bangsa_agama')->label('Bangsa dan Agama'),
                TextColumn::make('nik')->label('NIK')->sortable(),
                TextColumn::make('pekerjaan')->label('Pekerjaan'),
                TextColumn::make('alamat')->label('Alamat'),
                TextColumn::make('tanggal_surat')->label('Tanggal Surat')->sortable()->date(),
                TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('file_pdf')
                ->label('Unduh Berkas')
                ->formatStateUsing(fn ($record) => $record->file_pdf
                    ? '<a href="' . Storage::url($record->file_pdf) . '" target="_blank" style="color: blue; text-decoration: underline;">Download</a>'
                    : 'Tidak tersedia'
                )
                ->html(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
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
            'index' => Pages\ListDomisilis::route('/'),
            'create' => Pages\CreateDomisili::route('/create'),
            // 'edit' => Pages\EditDomisili::route('/{record}/edit'),
        ];
    }
}
