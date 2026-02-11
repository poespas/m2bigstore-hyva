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
        run('npx hyva-sources');
        run('npm run build');
    });
    within("{{release_or_current_path}}/app/design/frontend/Poespas/hyva-child-two/web/tailwind", function () {
        run('npm ci');
        run('npx hyva-sources');
        run('npm run build');
    });
    within("{{release_or_current_path}}/app/design/frontend/Poespas/hyva-child-three/web/tailwind", function () {
        run('npm ci');
        run('npx hyva-sources');
        run('npm run build');
    });
    within("{{release_or_current_path}}/app/design/frontend/Poespas/hyva-child-four/web/tailwind", function () {
        run('npm ci');
        run('npx hyva-sources');
        run('npm run build');
    });
    within("{{release_or_current_path}}/app/design/frontend/Poespas/hyva-child-five/web/tailwind", function () {
        run('npm ci');
        run('npx hyva-sources');
        run('npm run build');
    });
});

before('magento:deploy:assets', 'build:node');
/*
task('magento:deploy:assets', function () {
    invoke('magento:deploy:assets:adminhtml');
    within("{{release_or_current_path}}", function () {
        run('wget https://github.com/elgentos/magento2-static-deploy/releases/download/0.0.2/magento2-static-deploy-linux-amd64 -O /tmp/magento2-static-deploy');
        run('chmod +x /tmp/magento2-static-deploy');
    });

    $themes = get('magento_themes');
    foreach ($themes as $theme => $locales) {
        within("{{release_or_current_path}}", function () use ($theme, $locales) {
            run('echo "Deploying static content for theme ' . $theme . ' and locales: ' . $locales . '"');
            run('/tmp/magento2-static-deploy -root . -themes ' . $theme . ' -locales ' . join(',', explode(' ', $locales)) . ' -areas frontend -v -content-version {{ content_version }}');
        });
    }
});
*/

$configuration->enableHighPerformanceStaticDeploy();

return $configuration;
