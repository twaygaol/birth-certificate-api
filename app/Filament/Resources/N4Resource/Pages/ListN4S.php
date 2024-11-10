<?php

namespace App\Filament\Resources\N4Resource\Pages;

use App\Filament\Resources\N4Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListN4S extends ListRecords
{
    protected static string $resource = N4Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
