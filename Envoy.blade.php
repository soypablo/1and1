@servers(['web' => 'root@192.168.0.100'])

@task('deploy')
    cd /home/www/larabbs
    git pull -u origin master
    composer update --no-dev
    chown www:www -R /home/www
    chmod 755 -R /home/www
@endtask
