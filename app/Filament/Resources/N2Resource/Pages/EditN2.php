<?php

namespace App\Filament\Resources\N2Resource\Pages;

use App\Filament\Resources\N2Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditN2 extends EditRecord
{
    protected static string $resource = N2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
