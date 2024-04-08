<?php

namespace App\Filament\Resources\SubscriptionItemResource\Pages;

use App\Filament\Resources\SubscriptionItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubscriptionItems extends ListRecords
{
    protected static string $resource = SubscriptionItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
