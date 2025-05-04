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
            'm'    => "make:model $name -mcr",                  // Create model with migration, controller, and resource
            'c'    => "make:controller {$name}Controller",      // Create controller
            'r'    => "make:route {$name}",                      // Create route (assuming you have this as an alias)
            'f'    => "make:factory {$name}Factory",             // Create factory
            's'    => "make:seeder {$name}Seeder",               // Create seeder
            'p'    => "make:policy {$name}Policy",               // Create policy
            'migr' => "make:migration create_{$name}_table",     // Create migration (add `create_{$name}_table`)
            
            // Migration and Seeder commands
            'mig'  => "migrate",                                // Run all migrations
            'migf' => "migrate --force",                        // Run migrations with --force
            'migr' => "migrate:reset",                          // Reset migrations
            'migrb' => "migrate:rollback",                      // Rollback the last migration
            'migrp' => "migrate:refresh",                       // Refresh migrations (rollback and re-run)
            'migrstatus' => "migrate:status",                   // Show the status of migrations
            
            'seed' => "db:seed",                                // Run all seeders
            'seedf' => "db:seed --force",                       // Force run seeders
            'seedclass' => "db:seed --class={$name}Seeder",     // Run specific seeder class
            
            // Database commands
            'migrfile' => "migrate --path=database/migrations/{$name}.php", // Run migration by specific file name
            
            // Route commands
            'rlist' => "route:list",                            // List all routes
            'rcache' => "route:cache",                          // Cache the routes
            'rclear' => "route:clear",                          // Clear the route cache
            
            // Other commands
            'clear' => "cache:clear",                           // Clear application cache
            'configcache' => "config:cache",                    // Cache the config
            'configclear' => "config:clear",                    // Clear config cache
            'optim' => "optimize",                              // Optimize the application
            'viewclear' => "view:clear",                        // Clear view cache
            'm' => "make:model $name -mcr",                     // Shortcut for creating model, migration, controller
            'tinker' => "tinker",                               // Open tinker (interactive shell)
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
