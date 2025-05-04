<?php

namespace Prem\LaravelArtisanShortcuts;

use Illuminate\Support\ServiceProvider;
use Prem\LaravelArtisanShortcuts\Commands\ShortcutCommand;

class LaravelArtisanShortcutsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            ShortcutCommand::class,
        ]);
    }
}
