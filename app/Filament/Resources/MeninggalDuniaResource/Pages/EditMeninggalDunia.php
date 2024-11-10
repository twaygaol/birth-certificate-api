<?php

namespace App\Filament\Resources\MeninggalDuniaResource\Pages;

use App\Filament\Resources\MeninggalDuniaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMeninggalDunia extends EditRecord
{
    protected static string $resource = MeninggalDuniaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
