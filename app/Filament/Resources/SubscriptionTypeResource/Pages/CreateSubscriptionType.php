<?php

namespace App\Filament\Resources\SubscriptionTypeResource\Pages;

use App\Filament\Resources\SubscriptionTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSubscriptionType extends CreateRecord
{
    protected static string $resource = SubscriptionTypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
