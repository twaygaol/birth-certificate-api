<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $title = 'Data Akun Pendaftar';

    protected static ?string $navigationGroup = 'Data Akun';

    public static function getPluralLabel(): ?string
    {
        $locale = app()->getLocale();
        if ($locale == 'id') {
            return "Data Akun Pendaftar";
        } else
            return "Data Akun Pendaftar";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Name'),

                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email()
                    ->label('Email'),

                Forms\Components\TextInput::make('password')
                    ->required()
                    ->password() // Menandakan ini adalah field password
                    ->label('Password')
                    ->minLength(8) // Menambahkan minimum panjang password
                    ->dehydrated(fn ($state) => ! blank($state)), // Hanya mengirimkan password jika ada

                Forms\Components\Checkbox::make('is_active')
                    ->default(true) // Menyediakan opsi untuk menandai apakah user aktif
                    ->label('Is Active'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name'),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),

                Tables\Columns\BooleanColumn::make('is_active')
                    ->label('Active'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime(), // Format tanggal dan waktu
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
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
            // Tambahkan relasi jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    // Pastikan untuk memhash password sebelum menyimpan ke database
    protected static function beforeSave(Model $record): void
    {
        if ($record->isDirty('password')) {
            $record->password = Hash::make($record->password);
        }
    }
}
