<?php

namespace App\Filament\Resources\MeninggalDuniaResource\Pages;

use App\Filament\Resources\MeninggalDuniaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMeninggalDunias extends ListRecords
{
    protected static string $resource = MeninggalDuniaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
