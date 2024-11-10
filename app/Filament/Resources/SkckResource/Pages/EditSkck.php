<?php

namespace App\Filament\Resources\SkckResource\Pages;

use App\Filament\Resources\SkckResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSkck extends EditRecord
{
    protected static string $resource = SkckResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
