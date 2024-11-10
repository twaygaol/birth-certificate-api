<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\BirthCertificate;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BirthCertificateResource\Pages;

class BirthCertificateResource extends Resource
{
    protected static ?string $model = BirthCertificate::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Akta Kelahiran';

    protected static ?string $title = 'tambah akta kelahiran';

    protected static ?string $navigationGroup = 'Data pendaftar akta kelahiran';

    public static function getPluralLabel(): ?string
    {
        $locale = app()->getLocale();
        if ($locale == 'id') {
            return "Pendaftar Akta Kelahiran";
        } else
            return "Pendaftar Akta Kelahiran";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                // informasi pendaftaran
                Forms\Components\View::make('informasi-pendaftaran')
                    ->label('Informasi Persyaratan')
                    ->columnSpan('full'),

                // Data Utama
                Forms\Components\Section::make('Data Akta Kelahiran')
                    ->schema([
                        Forms\Components\TextInput::make('certificate_number')
                            ->label('Nomor Akta')
                            ->required()
                            ->unique(),
                        Forms\Components\TextInput::make('baby_name')
                            ->label('Nama Bayi')
                            ->required(),
                        Forms\Components\Select::make('gender')
                            ->label('Jenis Kelamin')
                            ->options([
                                'male' => 'Laki-laki',
                                'female' => 'Perempuan',
                            ])
                            ->required(),
                        Forms\Components\DatePicker::make('birth_date')
                            ->label('Tanggal Lahir')
                            ->required(),
                        Forms\Components\TimePicker::make('birth_time')
                            ->label('Jam Lahir')
                            ->required(),
                        Forms\Components\TextInput::make('birth_place')
                            ->label('Tempat Lahir')
                            ->required(),
                        Forms\Components\TextInput::make('hospital_name')
                            ->label('Nama Rumah Sakit')
                            ->nullable(),
                        Forms\Components\Select::make('birth_order')
                            ->label('Anak ke-')
                            ->options([
                                '1' => 'Anak Pertama',
                                '2' => 'Anak Kedua',
                                '3' => 'Anak Ketiga',
                                '4' => 'Anak Keempat',
                                '5+' => 'Lebih dari Empat',
                            ])
                            ->required(),
                    ])
                    ->columns(2), // Menjadikan dua kolom untuk tampilan lebih rapih

                // Informasi Orang Tua
                Forms\Components\Section::make('Informasi Orang Tua')
                    ->schema([

                        // Informasi Ayah
                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\TextInput::make('father_name')
                                    ->label('Nama Ayah')
                                    ->required(),
                                Forms\Components\TextInput::make('father_nik')
                                    ->label('NIK Ayah')
                                    ->required()
                                    ->maxlength(16),
                                Forms\Components\TextInput::make('father_birthplace')
                                    ->label('Tempat Lahir Ayah')
                                    ->required(),
                                Forms\Components\DatePicker::make('father_birthdate')
                                    ->label('Tanggal Lahir Ayah')
                                    ->required(),
                                Forms\Components\TextInput::make('father_job')
                                    ->label('Pekerjaan Ayah')
                                    ->required(),
                            ])
                            ->columns(2), // Membuat input form ayah menjadi dua kolom

                        // Informasi Ibu
                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\TextInput::make('mother_name')
                                    ->label('Nama Ibu')
                                    ->required(),
                                Forms\Components\TextInput::make('mother_nik')
                                    ->label('NIK Ibu')
                                    ->required()
                                    ->maxlength(16),
                                Forms\Components\TextInput::make('mother_birthplace')
                                    ->label('Tempat Lahir Ibu')
                                    ->required(),
                                Forms\Components\DatePicker::make('mother_birthdate')
                                    ->label('Tanggal Lahir Ibu')
                                    ->required(),
                                Forms\Components\TextInput::make('mother_job')
                                    ->label('Pekerjaan Ibu')
                                    ->required(),
                            ])
                            ->columns(2), // Membuat input form ibu menjadi dua kolom
                    ])
                    ->columns(2), // Membuat section orang tua terbagi dalam dua kolom

                // Alamat Orang Tua
                Forms\Components\Section::make('Alamat Orang Tua')
                    ->schema([
                        Forms\Components\TextInput::make('address')
                            ->label('Alamat')
                            ->required(),
                        Forms\Components\TextInput::make('village')
                            ->label('Desa/Kelurahan')
                            ->required(),
                        Forms\Components\TextInput::make('district')
                            ->label('Kecamatan')
                            ->required(),
                        Forms\Components\TextInput::make('city')
                            ->label('Kota/Kabupaten')
                            ->required(),
                        Forms\Components\TextInput::make('province')
                            ->label('Provinsi')
                            ->required(),
                        Forms\Components\TextInput::make('postal_code')
                            ->label('Kode Pos')
                            ->required()
                            ->maxlength(5),
                    ])
                    ->columns(2), // Membuat input form alamat menjadi dua kolom

                // Informasi Saksi dan Pendaftaran
                Forms\Components\Section::make('Informasi Saksi dan Pendaftaran')
                    ->schema([
                        Forms\Components\TextInput::make('witness1_name')
                            ->label('Nama Saksi 1')
                            ->required(),
                        Forms\Components\TextInput::make('witness1_nik')
                            ->label('NIK Saksi 1')
                            ->required()
                            ->maxlength(16),
                        Forms\Components\TextInput::make('witness2_name')
                            ->label('Nama Saksi 2')
                            ->nullable(),
                        Forms\Components\TextInput::make('witness2_nik')
                            ->label('NIK Saksi 2')
                            ->nullable()
                            ->maxlength(16),
                        Forms\Components\DatePicker::make('registration_date')
                            ->label('Tanggal Pendaftaran')
                            ->required(),
                        Forms\Components\TextInput::make('registrant_name')
                            ->label('Nama Pendaftar')
                            ->required(),
                        Forms\Components\TextInput::make('registrant_relation')
                            ->label('Hubungan Pendaftar dengan Bayi')
                            ->required(),
                        Forms\Components\TextInput::make('registrant_nik')
                            ->label('NIK Pendaftar')
                            ->required()
                            ->maxlength(16),
                    ])
                    ->columns(2), // Membuat input form saksi dan pendaftar menjadi dua kolom

                // Riwayat Pendaftaran
                Forms\Components\Section::make('Riwayat Pendaftaran')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Status Akta')
                            ->options([
                                'pending' => 'Menunggu',
                                'approved' => 'Disetujui',
                                'rejected' => 'Ditolak',
                            ])
                            ->required(),
                        Forms\Components\Textarea::make('rejection_reason')
                            ->label('Alasan Penolakan')
                            ->nullable(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        $livewire = $table->getLivewire();

        return $table
            ->striped()
            ->columns(
                $livewire->isGridLayout()
                    ? static::getGridTableColumns()
                    : static::getListTableColumns()
            )
            ->contentGrid(
                fn () => $livewire->isListLayout()
                    ? null
                    : [
                        'md' => 2,
                        'lg' => 3,
                        'xl' => 4,
                    ]
            )
            ->filters([
                Tables\Filters\SelectFilter::make('status')->options([
                    'pending' => 'Menunggu',
                    'approved' => 'Disetujui',
                    'rejected' => 'Ditolak',
                ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Detail')
                    ->color('success')
                    ->modalHeading(fn(BirthCertificate $record) => $record->name),
                Tables\Actions\EditAction::make()
                    ->label('Pesan')
                    ->form([
                        Select::make('status')
                            ->required()
                            ->label('Status Akta')
                            ->options([
                                'pending' => 'Menunggu',
                                'approved' => 'Disetujui',
                                'rejected' => 'Ditolak',
                            ]),
                        TextInput::make('rejection_reason')
                            ->label('Keterangan')
                            ->nullable(),
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

    public static function getListTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('baby_name')->searchable()->label('Nama Bayi'),
            Tables\Columns\TextColumn::make('gender')->label('Jenis Kelamin')->badge()
                ->color(fn(string $state): string => match ($state) {
                    'male' => 'success',
                    'female' => 'danger',
                    default => 'default',
                }),
            Tables\Columns\TextColumn::make('birth_date')->label('Tanggal Lahir')->date()->searchable(),
            Tables\Columns\TextColumn::make('father_name')->label('Nama Ayah')->searchable(),
            Tables\Columns\TextColumn::make('mother_name')->label('Nama Ibu')->searchable(),
            Tables\Columns\TextColumn::make('status')
                ->label('Status Akta')
                ->badge()
                ->color(fn(string $state): string => match ($state) {
                    'approved' => 'success',
                    'rejected' => 'danger',
                    'pending' => 'warning',
                    default => 'default',
                }),
        ];
    }

    public static function getGridTableColumns(): array
    {
        return [
            Tables\Columns\Layout\Stack::make([
                Tables\Columns\TextColumn::make('status')->badge(),
                Tables\Columns\Layout\Stack::make([
                    Tables\Columns\TextColumn::make('baby_name')
                        ->description(__('Nama Bayi'))
                        ->weight('bold')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('father_name')
                        ->description(__('Nama Ayah'))
                        ->weight('bold')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('birth_date')
                        ->description(__('Tanggal Lahir'))
                        ->weight('bold')
                        ->searchable(),
                ]),
            ])->space(3)->extraAttributes([
                'class' => 'pb-2',
            ]),
        ];
    }

    public static function getRelations(): array
    {
        return [
            // Define any relations here, if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBirthCertificates::route('/'),
            'create' => Pages\CreateBirthCertificate::route('/create'),
            // 'edit' => Pages\EditBirthCertificate::route('/{record}/edit'),
            // 'view' => Pages\ViewBirthCertificate::route('/{record}'),
        ];
    }
}
