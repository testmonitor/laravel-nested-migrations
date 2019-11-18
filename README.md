# Laravel Nested Migrations

[![Latest Stable Version](https://poser.pugx.org/testmonitor/laravel-nested-migrations/v/stable)](https://packagist.org/packages/testmonitor/laravel-nested-migrations)
[![CircleCI](https://img.shields.io/circleci/project/github/testmonitor/laravel-nested-migrations.svg)](https://circleci.com/gh/testmonitor/laravel-nested-migrations)
[![Travis Build](https://travis-ci.com/testmonitor/laravel-nested-migrations.svg?branch=master)](https://travis-ci.com/testmonitor/laravel-nested-migrations)
[![Code Quality](https://scrutinizer-ci.com/g/testmonitor/laravel-nested-migrations/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/testmonitor/laravel-nested-migrations/?branch=master)
[![StyleCI](https://styleci.io/repos/222276101/shield)](https://styleci.io/repos/222276101)
[![License](https://poser.pugx.org/testmonitor/laravel-nested-migrations/license)](https://packagist.org/packages/testmonitor/laravel-nested-migrations)

With Nested Migrations, you can organize your migration files into subfolders, keeping things a bit cleaner. 

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Examples](#examples)
- [Tests](#tests)
- [Changelog](#changelog)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)
  
## Installation

This package can be installed through Composer:

```sh
$ composer require testmonitor/laravel-nested-migrations
```

The package will automatically register itself. 

## Usage

Once loaded, you can start organizing your migration files into folders. You might want to take a look at 
the [examples](#examples) section to get a better picture.

Please note that nesting is limited to **one level deep**. This avoids any recursive mess.

## Examples

Imagine a migration file layout like this:

```
 database/migrations/
    - 2018_09_01_180000_create_projects_table.php
    - 2018_11_11_180000_create_users_table.php
    - 2019_01_20_180000_create_settings_table.php
    - 2019_11_12_180000_create_teams_table.php
```

Nothing out of the ordinary, right? But what if this list gets bigger? Like a 100 migration
files? Things tend to get difficult at that stage. Usually, you'd want to categorize these
files into folders and that's exactly where this package comes in. 

Now, you can do this:

```
 database/migrations/1.0
    - 2018_09_01_180000_create_projects_table.php
    - 2018_11_11_180000_create_users_table.php

 database/migrations/1.1
    - 2019_01_20_180000_create_settings_table.php

 database/migrations/2.0
    - 2019_11_12_180000_create_teams_table.php
```

A version-based migration folder layout is a great way to handle bigger apps, but you can use
any name or number you'd like. Just keep in mind that the folders are sorted alphanumerically
and migration files are ran through accordingly. 
 
## Tests

The package contains integration tests. You can run them using PHPUnit.

```
$ vendor/bin/phpunit
```

## Changelog

Refer to [CHANGELOG](CHANGELOG.md) for more information.

## Contributing

Refer to [CONTRIBUTING](CONTRIBUTING.md) for contributing details.

## Credits

- [Thijs Kok](https://www.testmonitor.com/)
- [Stephan Grootveld](https://www.testmonitor.com/)
- [Frank Keulen](https://www.testmonitor.com/)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Refer to the [License](LICENSE.md) for more information.
