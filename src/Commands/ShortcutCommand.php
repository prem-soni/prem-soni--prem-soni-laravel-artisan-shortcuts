<?php

namespace Prem\LaravelArtisanShortcuts\Commands;

use Illuminate\Console\Command;

class ShortcutCommand extends Command
{
    protected $signature = 'ps {cmd} {name?}';
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
            's'    => "serve",  // ← This line allows `php artisan ps s`
            'tk'   => "tinker",
           // Make commands
            'm'    => "make:model $name -mcr",
            'c'    => "make:controller {$name}Controller",
            'f'    => "make:factory {$name}Factory",
            'sdr'  => "make:seeder {$name}Seeder",
            'p'    => "make:policy {$name}Policy",
            'migc' => "make:migration create_{$name}_table",
            'migf' => "migrate --force",
        
            // Migration commands
            'mi'   => "migrate",
            'mir'  => "migrate:reset",
            'mib'  => "migrate:rollback",
            'mip'  => "migrate:refresh",
            'mis'  => "migrate:status",
            'mif'  => "migrate --path=database/migrations/{$name}.php",
        
            // Seeder commands
            'sd'   => "db:seed",
            'sdf'  => "db:seed --force",
            'sdc'  => "db:seed --class={$name}Seeder",

            // Route commands
            'rl'   => "route:list",
            'rc'   => "route:cache",
            'rcl'  => "route:clear",
        
            // Cache/config/view
            'cc'   => "cache:clear",
            'cfgc' => "config:cache",
            'cfgcl'=> "config:clear",
            'vc'   => "view:clear",
            'opt'  => "optimize",
        
            // Other
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
