<?php

namespace App\Filament\Resources\SubscriptionPriceResource\Pages;

use App\Filament\Resources\SubscriptionPriceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSubscriptionPrice extends CreateRecord
{
    protected static string $resource = SubscriptionPriceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}