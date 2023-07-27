<?php

use CodeIgniter\CodingStandard\CodeIgniter4;
use Nexus\CsConfig\Factory;

return Factory::create(new CodeIgniter4(), $overrides, $options)->forLibrary(
    'CodeIgniter 4 framework',
    'CodeIgniter Foundation',
    'admin@codeigniter.com',
    2021
);
