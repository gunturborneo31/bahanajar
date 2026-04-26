<?php
require __DIR__."/vendor/autoload.php";
$app = require_once __DIR__."/bootstrap/app.php";
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$count = DB::table("articles")
    ->whereIn("zendesk_id", [1001,1002,1003,1004,1005,1006,1007,1008,1009,1010,1011,1012])
    ->where("inaproc_jenis", "!=", "Dokumen")
    ->count();

echo "RESULT: " . $count . "\n";