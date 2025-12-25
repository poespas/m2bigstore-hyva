<?php

namespace Hypernode\DeployConfiguration;

use function Deployer\{task, within, run};

$configuration = new ApplicationTemplate\Magento2([]);
$configuration->setMagentoThemes([
  'Poespas/hyva-child-one' => 'da_DK de_DE en_GB en_US es_ES fi_FI fr_FR it_IT nb_NO nl_NL pl_PL pt_BR ru_RU sv_SE tr_TR',
  'Poespas/hyva-child-two' => 'da_DK de_DE en_GB en_US es_ES fi_FI fr_FR it_IT nb_NO nl_NL pl_PL pt_BR ru_RU sv_SE tr_TR',
  'Poespas/hyva-child-three' => 'da_DK de_DE en_GB en_US es_ES fi_FI fr_FR it_IT nb_NO nl_NL pl_PL pt_BR ru_RU sv_SE tr_TR',
  'Poespas/hyva-child-four' => 'da_DK de_DE en_GB en_US es_ES fi_FI fr_FR it_IT nb_NO nl_NL pl_PL pt_BR ru_RU sv_SE tr_TR',
  'Poespas/hyva-child-five' => 'da_DK de_DE en_GB en_US es_ES fi_FI fr_FR it_IT nb_NO nl_NL pl_PL pt_BR ru_RU sv_SE tr_TR'
]);
$configuration->setVariable("static_deploy_options", "--no-javascript --no-css --no-less --no-parent");

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
