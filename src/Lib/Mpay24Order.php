<?php

namespace FmLabs\Mpay24\Lib;

use Mpay24\Mpay24Order as BaseMpay24Order;

class Mpay24Order extends BaseMpay24Order {

    /**
     * Validate xml document against MDXI schema.
     *
     * @return bool
     */
    public function validate(): bool
    {
        //$schemaPath = \Cake\Core\Plugin::path('FmLabs/Mpay24') . DS . "resources" . DS . "MDXI.xsd";
        $schemaPath = dirname(dirname(dirname(__FILE__))) . DS . "resources" . DS . "MDXI.xsd";
        if (!$this->document->schemaValidate($schemaPath)) {
            return false;
        }
        return true;
    }

    /**
     * Public accessor for DOMDocument instance.
     *
     * @return \DOMDocument|null
     */
    public function getDocument(): ?\DOMDocument
    {
        return $this->document;
    }
}
