<?php

namespace App\Filament\Resources\BirthCertificateResource\Pages;

use App\Filament\Resources\BirthCertificateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Hydrat\TableLayoutToggle\Concerns\HasToggleableTable;

class MyListRecords extends ListRecords
{
    use HasToggleableTable;
}

class ListBirthCertificates extends ListRecords
{

    use HasToggleableTable;

    protected static string $resource = BirthCertificateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
