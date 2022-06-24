<?php

namespace Mika\HelloWorld\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    const XML_PATH_ENABLED = 'mika/general/enabled';

    /**
     * @var
     */
    private $config;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $config
     *
     * @return void
     */
    public function __constaruct(ScopeConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * @return mixed
     */
    public function isEnabled(): mixed
    {
        return $this->config->getValue(self::XML_PATH_ENABLED);
    }
}
