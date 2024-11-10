<?php

namespace App\Filament\Resources\N3Resource\Pages;

use App\Filament\Resources\N3Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListN3S extends ListRecords
{
    protected static string $resource = N3Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
