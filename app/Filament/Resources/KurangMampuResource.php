<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\KurangMampu;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KurangMampuResource\Pages;
use App\Filament\Resources\KurangMampuResource\RelationManagers;

class KurangMampuResource extends Resource
{
    protected static ?string $model = KurangMampu::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Kurang Mampu';

    protected static ?string $title = 'tambah ';

    protected static ?string $navigationGroup = 'Data pendaftar akta kelahiran';

    public static function getPluralLabel(): ?string
    {
        $locale = app()->getLocale();
        if ($locale == 'id') {
            return "Pendaftar Kurang Mampu";
        } else
            return "Pendaftar Kurang Mampu";
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
                TextInput::make('pekerjaan')
                    ->required()
                    ->label('Pekerjaan'),
                TextInput::make('tempat_sekolah')
                    ->required()
                    ->label('Tempat Sekolah'),
                TextInput::make('nim')
                    ->required()
                    ->label('NIM'),
                TextInput::make('tempat_tinggal')
                    ->required()
                    ->label('Tempat Tinggal'),
                TextInput::make('nama_ayah')
                    ->required()
                    ->label('Nama Ayah'),
                TextInput::make('nama_ibu')
                    ->required()
                    ->label('Nama Ibu'),
                TextInput::make('pekerjaan_ayah')
                    ->required()
                    ->label('Pekerjaan Ayah'),
                TextInput::make('pekerjaan_ibu')
                    ->required()
                    ->label('Pekerjaan Ibu'),
                TextInput::make('tanggungan_anak')
                    ->numeric()
                    ->required()
                    ->label('Jumlah Tanggungan Anak'),
                TextInput::make('penghasilan_ayah')
                    ->numeric()
                    ->required()
                    ->label('Penghasilan Ayah'),
                TextInput::make('penghasilan_ibu')
                    ->numeric()
                    ->required()
                    ->label('Penghasilan Ibu'),
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
                TextColumn::make('pekerjaan')->label('Pekerjaan'),
                TextColumn::make('tempat_sekolah')->label('Tempat Sekolah'),
                TextColumn::make('nim')->label('NIM'),
                TextColumn::make('tempat_tinggal')->label('Tempat Tinggal'),
                TextColumn::make('nama_ayah')->label('Nama Ayah'),
                TextColumn::make('nama_ibu')->label('Nama Ibu'),
                TextColumn::make('pekerjaan_ayah')->label('Pekerjaan Ayah'),
                TextColumn::make('pekerjaan_ibu')->label('Pekerjaan Ibu'),
                TextColumn::make('tanggungan_anak')->label('Tanggungan Anak')->sortable(),
                TextColumn::make('penghasilan_ayah')->label('Penghasilan Ayah')->sortable(),
                TextColumn::make('penghasilan_ibu')->label('Penghasilan Ibu')->sortable(),
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
            'index' => Pages\ListKurangMampus::route('/'),
            'create' => Pages\CreateKurangMampu::route('/create'),
            // 'edit' => Pages\EditKurangMampu::route('/{record}/edit'),
        ];
    }
}
