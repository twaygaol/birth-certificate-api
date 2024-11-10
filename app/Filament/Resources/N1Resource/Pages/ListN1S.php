<?php

namespace App\Filament\Resources\N1Resource\Pages;

use App\Filament\Resources\N1Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListN1S extends ListRecords
{
    protected static string $resource = N1Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
