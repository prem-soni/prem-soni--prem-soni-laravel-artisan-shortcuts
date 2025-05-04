<?php

namespace Prem\LaravelArtisanShortcuts\Commands;

use Illuminate\Console\Command;

class ShortcutCommand extends Command
{
    protected $signature = 'shortcut {cmd} {name?}';
    protected $description = 'Run Laravel Artisan commands via shortcut aliases';

    public function handle()
    {
        $cmd = $this->argument('cmd');
        $name = $this->argument('name');

        // $shortcuts = [
        //     'm' => "make:model $name -mcr",
        //     'c' => "make:controller {$name}Controller",
        //     'r' => "route:list",
        //     's' => "serve",
        //     'mig' => "migrate",
        // ];
       $shortcuts = [
    // Create commands
    'm'     => "make:model $name -mcr",                  // Create model with migration, controller, and resource
    'c'     => "make:controller {$name}Controller",      // Create controller
    'r'     => "make:route {$name}",                     // Create route (if alias exists)
    'f'     => "make:factory {$name}Factory",            // Create factory
    'se'    => "make:seeder {$name}Seeder",              // Create seeder
    'p'     => "make:policy {$name}Policy",              // Create policy
    'migr'  => "make:migration create_{$name}_table",    // Create migration

    // Migration and Seeder commands
    'mig'   => "migrate",                                // Run all migrations
    'migf'  => "migrate --force",                        // Run migrations with --force
    'migreset' => "migrate:reset",                       // Reset migrations
    'migrb' => "migrate:rollback",                       // Rollback the last migration
    'migrp' => "migrate:refresh",                        // Refresh migrations
    'migrstatus' => "migrate:status",                    // Migration status

    'seed'      => "db:seed",                            // Run all seeders
    'seedf'     => "db:seed --force",                    // Force run seeders
    'seedclass' => "db:seed --class={$name}Seeder",      // Run specific seeder class

    // Database commands
    'migrfile' => "migrate --path=database/migrations/{$name}.php", // Run specific migration file

    // Route commands
    'rlist'  => "route:list",                            // List routes
    'rcache' => "route:cache",                           // Cache routes
    'rclear' => "route:clear",                           // Clear route cache

    // Other commands
    'clear'        => "cache:clear",                     // Clear app cache
    'configcache'  => "config:cache",                    // Cache config
    'configclear'  => "config:clear",                    // Clear config cache
    'optim'        => "optimize",                        // Optimize app
    'viewclear'    => "view:clear",                      // Clear view cache
    'tinker'       => "tinker",                          // Open tinker shell
    's'            => "serve",                           // Start Laravel development server
];

        

        if (!isset($shortcuts[$cmd])) {
            $this->error("Unknown shortcut: $cmd");
            return 1;
        }

        $this->info("Running: php artisan {$shortcuts[$cmd]}");
        passthru("php artisan {$shortcuts[$cmd]}");
        return 0;
    }
}
