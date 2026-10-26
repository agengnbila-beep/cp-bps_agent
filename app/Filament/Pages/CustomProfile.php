<?php

namespace App\Filament\Pages;

use Filament\Auth\Pages\EditProfile;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class CustomProfile extends EditProfile
{
    protected static bool $shouldRegisterNavigation = false;

    protected string $view = 'filament-panels::auth.pages.edit-profile';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pribadi')
                    ->description('Perbarui informasi identitas administrator.')
                    ->icon(Heroicon::OutlinedUserCircle)
                    ->schema([
                        $this->getNameFormComponent()
                            ->prefixIcon(Heroicon::OutlinedUser),

                        $this->getEmailFormComponent()
                            ->prefixIcon(Heroicon::OutlinedEnvelope),
                    ]),

                Section::make('Keamanan Akun')
                    ->description('Kosongkan kata sandi jika tidak ingin mengubahnya.')
                    ->icon(Heroicon::OutlinedShieldCheck)
                    ->schema([
                        $this->getPasswordFormComponent()
                            ->prefixIcon(Heroicon::OutlinedLockClosed),

                        $this->getPasswordConfirmationFormComponent()
                            ->prefixIcon(Heroicon::OutlinedLockClosed),
                    ]),
            ]);
    }
}
