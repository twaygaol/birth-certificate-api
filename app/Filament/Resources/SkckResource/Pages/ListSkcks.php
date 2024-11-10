<?php

namespace App\Filament\Resources\SkckResource\Pages;

use App\Filament\Resources\SkckResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSkcks extends ListRecords
{
    protected static string $resource = SkckResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
