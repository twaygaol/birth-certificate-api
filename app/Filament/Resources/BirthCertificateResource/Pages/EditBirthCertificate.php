<?php

namespace App\Filament\Resources\BirthCertificateResource\Pages;

use App\Filament\Resources\BirthCertificateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBirthCertificate extends EditRecord
{
    protected static string $resource = BirthCertificateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];

    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
