<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriptionItemResource\Pages;
use App\Filament\Resources\SubscriptionItemResource\RelationManagers;
use App\Models\SubscriptionItem;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubscriptionItemResource extends Resource
{
    protected static ?string $model = SubscriptionItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make([
                        Select::make('subscription_type_id')
                            ->label('Subscription Type')
                            ->relationship('subscriptionType', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                    ]),
                ]),
                Split::make([
                    Section::make([
                        Repeater::make('name')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Name')
                                    ->required()
                                    ->placeholder('Name'),
                            ]),
                    ]),
                ]),
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
                TextColumn::make('name')
                    ->getStateUsing(function ($record) {
                        $names = collect($record->name)->pluck('name')->toArray();
                        return $names;
                    })
                    ->badge(),
                TextColumn::make('description')
                    ->label('Description')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListSubscriptionItems::route('/'),
            'create' => Pages\CreateSubscriptionItem::route('/create'),
            'edit' => Pages\EditSubscriptionItem::route('/{record}/edit'),
        ];
    }
}