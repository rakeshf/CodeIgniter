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
add('shared_files', []);
add('shared_dirs', ['assets']);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('chorbazaar-aws')
    ->set('deploy_path', '{{application}}');    
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

