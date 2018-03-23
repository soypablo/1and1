@servers(['web' => 'root@123.206.51.48'])

@task('deploy')
cd /data/larabbs
git checkout .
git clean -f -d
git pull -u origin master
composer install --no-dev
chown www:www -R /data/larabbs
chmod 755 -R /data/larabbs
@endtask
