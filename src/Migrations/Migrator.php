<?php

namespace TestMonitor\NestedMigrations\Migrations;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Database\Migrations\Migrator as IlluminateMigrator;

class Migrator extends IlluminateMigrator
{
    /**
     * Get all of the migration files in a given path, including
     * those in a nested folder.
     *
     * @param  string|array  $paths
     * @return array
     */
    public function getMigrationFiles($paths)
    {
        return Collection::make($paths)->flatMap(function ($path) {
            return Str::endsWith($path, '.php') ? [$path] : $this->findMigrationFiles($path);
        })->filter()->values()->keyBy(function ($file) {
            return $this->getMigrationName($file);
        })->sortBy(function ($file, $key) {
            return $key;
        })->all();
    }

    /**
     * Finds migration files recursively, limited to one level.
     *
     * @param string $path
     * @return array
     */
    protected function findMigrationFiles($path)
    {
        return $this->files->glob($path . '/{,*/}*_*.php', GLOB_BRACE);
    }
}
