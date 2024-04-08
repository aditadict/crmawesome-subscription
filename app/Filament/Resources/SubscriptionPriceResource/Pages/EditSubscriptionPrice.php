<?php

namespace App\Filament\Resources\SubscriptionPriceResource\Pages;

use App\Filament\Resources\SubscriptionPriceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubscriptionPrice extends EditRecord
{
    protected static string $resource = SubscriptionPriceResource::class;

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