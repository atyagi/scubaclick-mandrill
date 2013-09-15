<?php namespace ScubaClick\Mandrill;

use Guzzle\Http\Client;
use Illuminate\Support\Str;
use Guzzle\Http\Exception\BadResponseException;

class Mandrill
{
    /**
     * Holds the base endpoint
     *
     * @var string
     */
    protected $endpoint = 'https://mandrillapp.com/api/1.0';

    /**
     * Start it off
     *
     * @param string $password
     * @param string $fromName
     * @param string $fromEmail
     */
    public function __construct($password, $fromName = '', $fromEmail = '')
    {
        $this->password  = $password;
        $this->fromName  = $fromName;
        $this->fromEmail = $fromEmail;
    }

    /**
     * Send an API call off to Mandrill
     *
     * @param string $method
     * @param array  $args
     */
    public function request($method, $args = [])
    {
        $args['key'] = $this->password;

        if(!isset($args['message']['from_name']) && !empty($this->fromName)) {
            $args['message']['from_name']  = $this->fromName;
        }

        if(!isset($args['message']['from_email']) && !empty($this->fromEmail)) {
            $args['message']['from_email'] = $this->fromEmail;
        }

        if(!isset($args['message']['track_clicks'])) {
            $args['message']['track_clicks'] = true;
        }

        $client = new Client($this->endpoint);

        $request = $client->post(
            $method, 
            array('Content-Type' => 'application/json; charset=utf-8'),
            json_encode($args)
        );

        try
        {
            $response = $request->send();
        }
        catch(BadResponseException $exception)
        {
            $response = $exception->getResponse();
        } 

        return $response->json();
    }

    /**
     * Make dynamic calls to all endpoints
     *
     * @param string $method
     * @param array  $args
     */
    public function __call($func, $args)
    {
        $method = Str::snake($func, '-');

        return $this->request('messages/'. $method .'.json', $args[0]);
    }
}
