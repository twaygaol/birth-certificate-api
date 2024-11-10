<?php

namespace App\Filament\Resources\KurangMampuResource\Pages;

use App\Filament\Resources\KurangMampuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKurangMampu extends EditRecord
{
    protected static string $resource = KurangMampuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
