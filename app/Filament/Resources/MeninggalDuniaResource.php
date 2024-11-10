<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MeninggalDuniaResource\Pages;
use App\Filament\Resources\MeninggalDuniaResource\RelationManagers;
use App\Models\MeninggalDunia;
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
use Filament\Forms\Components\TimePicker;
use Illuminate\Support\Facades\Storage;

class MeninggalDuniaResource extends Resource
{
    protected static ?string $model = MeninggalDunia::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'meninggal dunia';

    protected static ?string $title = 'tambah ';

    protected static ?string $navigationGroup = 'Data pendaftar akta kelahiran';

    public static function getPluralLabel(): ?string
    {
        $locale = app()->getLocale();
        if ($locale == 'id') {
            return "Pendaftar meninggal dunia";
        } else
            return "Pendaftar meninggal dunia";
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
                    ->label('Bangsa & Agama'),
                TextInput::make('tempat_tinggal_akhir')
                    ->required()
                    ->label('Tempat Tinggal Terakhir'),
                DatePicker::make('hari_tanggal')
                    ->required()
                    ->label('Hari & Tanggal Meninggal'),
                TimePicker::make('pukul')
                    ->required()
                    ->label('Pukul Meninggal'),
                TextInput::make('sebab_meninggal')
                    ->required()
                    ->label('Sebab Meninggal'),
                TextInput::make('tempat_meninggal')
                    ->required()
                    ->label('Tempat Meninggal'),
                TextInput::make('dikebumikan')
                    ->required()
                    ->label('Tempat Dikebumikan'),
                TextInput::make('nama_pelapor')
                    ->required()
                    ->label('Nama Pelapor'),
                TextInput::make('hubungan_pelapor')
                    ->required()
                    ->label('Hubungan dengan Pelapor'),
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
                TextColumn::make('bangsa_agama')->label('Bangsa & Agama'),
                TextColumn::make('tempat_tinggal_akhir')->label('Tempat Tinggal Terakhir'),
                TextColumn::make('hari_tanggal')->label('Hari & Tanggal Meninggal')->date(),
                TextColumn::make('pukul')->label('Pukul Meninggal')->time(),
                TextColumn::make('sebab_meninggal')->label('Sebab Meninggal'),
                TextColumn::make('tempat_meninggal')->label('Tempat Meninggal'),
                TextColumn::make('dikebumikan')->label('Tempat Dikebumikan'),
                TextColumn::make('nama_pelapor')->label('Nama Pelapor'),
                TextColumn::make('hubungan_pelapor')->label('Hubungan Pelapor'),
                TextColumn::make('tanggal_surat')->label('Tanggal Surat')->date(),
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
                //
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
            'index' => Pages\ListMeninggalDunias::route('/'),
            'create' => Pages\CreateMeninggalDunia::route('/create'),
            // 'edit' => Pages\EditMeninggalDunia::route('/{record}/edit'),
        ];
    }
}
