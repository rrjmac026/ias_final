<?php

namespace App\Filament\Resources\ClubMembershipResource\Pages;

use App\Filament\Resources\ClubMembershipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClubMemberships extends ListRecords
{
    protected static string $resource = ClubMembershipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
