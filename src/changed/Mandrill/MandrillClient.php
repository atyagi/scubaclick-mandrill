<?php namespace ScubaClick\Mandrill;

use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

class MandrillClient extends Client
{
    const VERSION = '1.0';

    /**
     * Get the show on the road!
     * 
     * @param string $password
     * @param string $version
     * @param string $manifestPath
     */
    public function __construct($password, $version = '1.0', $manifestPath = '')
    {
        if(empty($manifestPath)) {
            $manifestPath = __DIR__ .'/manifests';
        }

        parent::__construct('', array(
            'command.params' => array(
                'key' => $password
            ),
            'request.options' => array(
                'headers' => array(
                    'Content-Type' => 'application/json; charset=utf-8'
                ),
            ),
        ));

        $this->setDescription(ServiceDescription::factory($manifestPath .'/'. $version .'.json'));
        $this->setUserAgent('ScubaClick-Mandrill/' . self::VERSION, true);
    }

    /**
     * To view a list of all supported methods view the  
     * current manifest
     */
    public function __call($method, $args = array())
    {
        return parent::__call(ucfirst($method), $args);
    }
}
