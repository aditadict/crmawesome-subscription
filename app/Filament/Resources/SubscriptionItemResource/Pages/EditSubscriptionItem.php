<?php

namespace App\Filament\Resources\SubscriptionItemResource\Pages;

use App\Filament\Resources\SubscriptionItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubscriptionItem extends EditRecord
{
    protected static string $resource = SubscriptionItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
