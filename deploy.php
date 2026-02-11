<?php

namespace Hypernode\DeployConfiguration;

use function Deployer\{before, task, within, run, get, invoke};

$configuration = new ApplicationTemplate\Magento2([]);
$configuration->setMagentoThemes([
  'Poespas/hyva-child-one' => 'da_DK de_DE en_GB en_US es_ES fi_FI fr_FR it_IT nb_NO nl_NL pl_PL pt_BR ru_RU sv_SE tr_TR',
  'Poespas/hyva-child-two' => 'da_DK de_DE en_GB en_US es_ES fi_FI fr_FR it_IT nb_NO nl_NL pl_PL pt_BR ru_RU sv_SE tr_TR',
  'Poespas/hyva-child-three' => 'da_DK de_DE en_GB en_US es_ES fi_FI fr_FR it_IT nb_NO nl_NL pl_PL pt_BR ru_RU sv_SE tr_TR',
  'Poespas/hyva-child-four' => 'da_DK de_DE en_GB en_US es_ES fi_FI fr_FR it_IT nb_NO nl_NL pl_PL pt_BR ru_RU sv_SE tr_TR',
  'Poespas/hyva-child-five' => 'da_DK de_DE en_GB en_US es_ES fi_FI fr_FR it_IT nb_NO nl_NL pl_PL pt_BR ru_RU sv_SE tr_TR'
]);
$configuration->setVariable("static_deploy_options", "--no-parent");

$productionStage = $configuration->addStage('production', 'magento2');
$productionStage->addServer('hntestjvisser1.hypernode.io');

task('build:node' , function () {
    within("{{release_or_current_path}}/app/design/frontend/Poespas/hyva-child-one/web/tailwind", function () {
        run('npm ci');
        run('npm run build');
    });
    within("{{release_or_current_path}}/app/design/frontend/Poespas/hyva-child-two/web/tailwind", function () {
        run('npm ci');
        run('npm run build');
    });
    within("{{release_or_current_path}}/app/design/frontend/Poespas/hyva-child-three/web/tailwind", function () {
        run('npm ci');
        run('npm run build');
    });
    within("{{release_or_current_path}}/app/design/frontend/Poespas/hyva-child-four/web/tailwind", function () {
        run('npm ci');
        run('npm run build');
    });
    within("{{release_or_current_path}}/app/design/frontend/Poespas/hyva-child-five/web/tailwind", function () {
        run('npm ci');
        run('npm run build');
    });
});

before('magento:deploy:assets', 'build:node');

$configuration->enableHighPerformanceStaticDeploy();

return $configuration;
