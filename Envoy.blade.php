<?php
$remote = 'root@128.199.87.75';
?>
@servers(['local' => ['127.0.0.1'], 'remote' => [$remote]])
@story('koel')
    upload
    sync
@endstory
@task('upload', ['on' => 'local'])
    scp -r {{ $path }}/* {{ $remote }}:/root/music
@endtask
@task('sync', ['on' => 'remote'])
    cd /var/www/music.nnusunn.jp
    php artisan koel:sync
@endtask
