<?php

use Illuminate\Support\Facades\DB;

if (DB::connection()->getDatabaseName())
{
    return 'Connected to the DB: ' . DB::connection()->getDatabaseName();
}