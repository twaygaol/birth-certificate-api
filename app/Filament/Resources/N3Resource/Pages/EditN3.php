<?php

namespace App\Filament\Resources\N3Resource\Pages;

use App\Filament\Resources\N3Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditN3 extends EditRecord
{
    protected static string $resource = N3Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
