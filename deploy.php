<?php

namespace Hypernode\DeployConfiguration;

use function Deployer\{task, within, run};

$configuration = new ApplicationTemplate\Magento2(['en_US']);

$productionStage = $configuration->addStage('production', 'magento2');
$productionStage->addServer('hntestjvisser1.hypernode.io');

task('build:hyva:theme1' , function () {
    within("{{release_or_current_path}}/app/design/frontend/Poespas/hyva-child-one/web/tailwind", function () {
        run('npm ci');
        run('npm run build');
    });
});

task('build:hyva:theme2' , function () {
    within("{{release_or_current_path}}/app/design/frontend/Poespas/hyva-child-two/web/tailwind", function () {
        run('npm ci');
        run('npm run build');
    });
});

task('build:hyva:theme3' , function () {
    within("{{release_or_current_path}}/app/design/frontend/Poespas/hyva-child-three/web/tailwind", function () {
        run('npm ci');
        run('npm run build');
    });
});

task('build:hyva:theme4' , function () {
    within("{{release_or_current_path}}/app/design/frontend/Poespas/hyva-child-four/web/tailwind", function () {
        run('npm ci');
        run('npm run build');
    });
});

task('build:hyva:theme5' , function () {
    within("{{release_or_current_path}}/app/design/frontend/Poespas/hyva-child-five/web/tailwind", function () {
        run('npm ci');
        run('npm run build');
    });
});

$configuration->addBuildTask('build:hyva:theme1');
$configuration->addBuildTask('build:hyva:theme2');
$configuration->addBuildTask('build:hyva:theme3');
$configuration->addBuildTask('build:hyva:theme4');
$configuration->addBuildTask('build:hyva:theme5');

return $configuration;
