<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriptionPriceResource\Pages;
use App\Filament\Resources\SubscriptionPriceResource\RelationManagers;
use App\Models\SubscriptionPrice;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubscriptionPriceResource extends Resource
{
    protected static ?string $model = SubscriptionPrice::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Select::make('subscription_type_id')
                        ->label('Subscription Type')
                        ->relationship('subscriptionType', 'name')
                        ->required()
                        ->searchable()
                        ->preload(),
                    TextInput::make('price')
                        ->mask(RawJs::make('$money($input)'))
                        ->stripCharacters(',')
                        ->numeric()
                        ->prefix('Rp '),
                    TextInput::make('description')
                        ->label('Description')
                        ->placeholder('Description'),
                ])
                    ->columns(2),
                Toggle::make('is_active')
                    ->label('Is Active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')
                    ->label('No')
                    ->rowIndex(),
                TextColumn::make('subscriptionType.name')
                    ->label('Subscription Type')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->label('Price')
                    ->money('IDR')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Description')
                    ->searchable(),
                IconColumn::make('is_active')
                    ->label('Is Active')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubscriptionPrices::route('/'),
            'create' => Pages\CreateSubscriptionPrice::route('/create'),
            'edit' => Pages\EditSubscriptionPrice::route('/{record}/edit'),
        ];
    }
}
