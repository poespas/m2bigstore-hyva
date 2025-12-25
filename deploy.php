<?php

namespace Hypernode\DeployConfiguration;

$configuration = new ApplicationTemplate\Magento2(['en_US']);

$productionStage = $configuration->addStage('production', 'magento2');
$productionStage->addServer('hntestjvisser1.hypernode.io');

return $configuration;
