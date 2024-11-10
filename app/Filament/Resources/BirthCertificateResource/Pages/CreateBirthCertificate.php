<?php

namespace App\Filament\Resources\BirthCertificateResource\Pages;

use App\Filament\Resources\BirthCertificateResource;
use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;

class CreateBirthCertificate extends CreateRecord
{
    protected static string $resource = BirthCertificateResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected static ?string $title = 'Form Input Data Akta Kelahiran';
}
