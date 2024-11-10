<?php

namespace App\Filament\Resources\N4Resource\Pages;

use App\Filament\Resources\N4Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditN4 extends EditRecord
{
    protected static string $resource = N4Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
