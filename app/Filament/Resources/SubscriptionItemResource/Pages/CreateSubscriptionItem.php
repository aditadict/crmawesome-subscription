<?php

namespace App\Filament\Resources\SubscriptionItemResource\Pages;

use App\Filament\Resources\SubscriptionItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSubscriptionItem extends CreateRecord
{
    protected static string $resource = SubscriptionItemResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}