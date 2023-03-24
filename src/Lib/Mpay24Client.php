<?php

namespace FmLabs\Mpay24\Lib;

use Cake\Core\Configure;
use Mpay24\Mpay24;
use Mpay24\Mpay24Config;

class Mpay24Client extends Mpay24
{
    /**
     * @param array|string $profile
     * @throws \Exception
     */
    public function __construct(array|string $profile = 'default')
    {
        if (is_string($profile)) {
            //debug(Configure::read('Mpay24'));
            if (!Configure::check('Mpay24.' . $profile)) {
                throw new \RuntimeException("Mpay24 profile $profile not configured");
            }
            $profile = (array) Configure::read('Mpay24.' . $profile);
        }

        $mpay24Config = $this->_buildMpay24Config($profile);
        parent::__construct($mpay24Config);
    }

    /**
     * @param bool $testMode
     * @return \Mpay24\Mpay24Config
     * @throws \Exception
     */
    protected function _buildMpay24Config(array $profile): Mpay24Config
    {
        $merchantId = $profile['merchantId'] ?? null;
        $merchantPassword = $profile['merchantPassword'] ?? null;
        if (!$merchantId || !$merchantPassword) {
            throw new \RuntimeException(__("Mpay24 credentials missing"));
        }

        $config = new Mpay24Config();
        $config->setMerchantID($merchantId);
        $config->setSoapPassword($merchantPassword);
        $config->useTestSystem((bool)($profile['useTestSystem'] ?? false));
        //$config->setVerifyPeer((bool)($profile['verifyPeer'] ?? false));

        // logging & debugging
        $config->setDebug((bool)($profile['debug'] ?? false));
        $config->setEnableCurlLog((bool)($profile['debug'] ?? false));
        $config->setLogPath(LOGS);
        $config->setLogFile('mpay24_client.log');
        $config->setCurlLogFile('mpay24_curl.log');

        // proxy configuration
        if ($profile['proxy'] ?? false) {
            $config->setProxyHost($profile['proxy']['host'] ?? '');
            $config->setProxyPort($profile['proxy']['port'] ?? '');
            $config->setProxyHost($profile['proxy']['user'] ?? '');
            $config->setProxyPass($profile['proxy']['pass'] ?? '');
        }

        // FLEX
        //$config->setSpid($spid);
        //$config->setFlexLinkPassword($flexLinkPassword);
        //$config->useFlexLinkTestSystem($flexLinkTestSystem);

        return $config;
    }

}