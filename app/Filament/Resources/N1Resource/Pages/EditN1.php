<?php

namespace App\Filament\Resources\N1Resource\Pages;

use App\Filament\Resources\N1Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditN1 extends EditRecord
{
    protected static string $resource = N1Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
