<?php

// Arahkan folder penyimpanan internal Laravel ke folder sementara Vercel (/tmp)
$_ENV['APP_STORAGE'] = '/tmp/storage';
$_SERVER['APP_STORAGE'] = '/tmp/storage';

// Buat struktur folder storage di /tmp secara otomatis jika belum ada
$storageFolders = [
    '/tmp/storage/app/public',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
];

foreach ($storageFolders as $folder) {
    if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
    }
}

// Panggil file entry point Laravel asli
require __DIR__ . '/../public/index.php';