<?php

namespace App\Filament\Resources\ClubMembershipResource\Pages;

use App\Filament\Resources\ClubMembershipResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClubMembership extends EditRecord
{
    protected static string $resource = ClubMembershipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
