<?php
namespace Deployer;

require 'recipe/codeigniter.php';

// Project name
set('application', '/var/www/html/chorbazaar-dev');

// Project repository
set('repository', 'https://github.com/rakeshf/CodeIgniter.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', ['application/.env']);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('chorbazaar-aws')
    ->set('deploy_path', '{{application}}');    
    
// Tasks
desc('Build application');
task('deploy:build', function () {
    run('cd {{release_path}}/application && {{bin/composer}} install');
});

// [Optional] if deploy fails automatically unlock.
after('deploy','deploy:build','deploy:failed', 'deploy:unlock');

