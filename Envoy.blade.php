@servers(['web' => 'root@123.206.51.48'])

@task('deploy')
cd /data/larabbs
git pull -u origin master
chown www:www -R /data/larabbs
chmod 755 -R /data/larabbs
@endtask
