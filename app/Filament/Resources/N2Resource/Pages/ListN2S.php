<?php

namespace App\Filament\Resources\N2Resource\Pages;

use App\Filament\Resources\N2Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListN2S extends ListRecords
{
    protected static string $resource = N2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
