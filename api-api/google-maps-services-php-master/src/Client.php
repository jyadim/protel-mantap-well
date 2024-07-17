<?php

namespace yidas\googleMaps;

use Exception;
use GuzzleHttp\Client as HttpClient;
$gmaps = new \yidas\googleMaps\Client(['key'=>'AIzaSyD5JxBIzyf-6PyHWkkQqTJlM7tBWFHu-0o']);
// Get elevation by locations parameter
$elevationResult = $gmaps->elevation([-6.870021, 107.551460]);
$elevationResult = $gmaps->elevation('-6.870021, 107.551460');
/**
 * Google Maps PHP Client
 *
 * @author  Nick Tsai <myintaer@gmail.com>
 * @version 1.2.0
 *
 * @method array directions(string $origin, string $destination, array $params=[])
 * @method array distanceMatrix(string $origin, string $destination, array $params=[])
 * @method array elevation(string $locations, array $params=[])
 * @method array geocode(string $address, array $params=[])
 * @method array reverseGeocode(string $latlng, array $params=[])
 * @method array computeRoutes(array $origin, array $destination, array $body=[], array $fieldMask=[])
 * @method array geolocate(array $bodyParams=[])
 * @method array timezone(string $location, string $timestamp=null, array $params=[])
 */
class Client
{
    /**
     * Google Maps Platform base API host
     */
    // const API_HOST = 'https://maps.googleapis.com';

    /**
     * For service autoload
     *
     * @see http://php.net/manual/en/language.namespaces.rules.php
     */
    const SERVICE_NAMESPACE = "\\yidas\\googleMaps\\";

    /**
     * For Client-Service API method director
     *
     * @var array Method => Service Class name
     */
    protected static $serviceMethodMap = [
        'directions' => 'Directions',
        'distanceMatrix' => 'DistanceMatrix',
        'elevation' => 'Elevation',
        'geocode' => 'Geocoding',
        'reverseGeocode' => 'Geocoding',
        'geolocate' => 'Geolocation',
        'timezone' => 'Timezone',
        'computeRoutes' => 'Routes',
        'snapToRoads' => 'Roads',
    ];

    /**
     * Google API Key
     *
     * Authenticating by API Key, otherwise by client ID/digital signature
     *
     * @var string
     */
    protected $apiKey;

    /**
     * Google client ID
     *
     * @var string
     */
    protected $clientID;

    /**
     * Google client's digital signature
     *
     * @var string
     */
    protected $clientSecret;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * Google Maps default language
     *
     * @var string ex. 'zh-TW'
     */
    protected $language;

    /**
     * Constructor
     *
     * @param string|array $optParams API Key or option parameters
     *  'key' => Google API Key
     *  'clientID' => Google clientID
     *  'clientSecret' => Google clientSecret
     * @return self
     */
    function __construct($optParams)
    {
        // Quick setting for API Key
        if (is_string($optParams)) {
            // Params as a string key
            $key = $optParams;
            $optParams = [];
            $optParams['key'] = $key;
        }

        // Assignment
        $key = isset($optParams['key']) ? $optParams['key'] : null;
        $clientID = isset($optParams['clientID']) ? $optParams['clientID'] : null;
        $clientSecret = isset($optParams['clientSecret']) ? $optParams['clientSecret'] : null;
        $defaultLang = isset($optParams['language']) ? $optParams['language'] : null;

        // Use API Key
        if ($key) {

            if ($clientID || $clientSecret) {
                throw new Exception("clientID/clientSecret should not set when using key", 400);
            }

            $this->apiKey = (string) $key;
        }
        // Use clientID/clientSecret
        elseif ($clientID && $clientSecret) {

            $this->clientID = (string) $clientID;
            $this->clientSecret = (string) $clientSecret;
        }
        else {

            throw new Exception("Unable to set Client credential due to your wrong params", 400);
        }

        // Default Language setting
        if ($defaultLang) {
            $this->setLanguage($defaultLang);
        }

        // Load GuzzleHttp\Client
        $this->httpClient = new HttpClient([
            // 'base_uri' => self::API_HOST,
            'timeout'  => 5.0,
        ]);

        return $this;
    }

    /**
     * Request Google Map API
     *
     * @param string $url
     * @param array $params
     * @param string $method HTTP request method
     * @param string $body
     * @param array $headers
     * @return GuzzleHttp\Psr7\Response
     */
    public function request($url, $params=[], $method='GET', $body=null, $headers=null)
    {
        // Guzzle request options
        $options = [
            'http_errors' => false,
        ];

        // Parameters for Auth
        $defaultParams = ($this->apiKey)
            ? ['key' => $this->apiKey]
            : ['client' => $this->clientID, 'signature' => $this->clientSecret];

        // Query String
        $options['query'] = array_merge($defaultParams, $params);

        // Body
        if ($body) {
            $options['body'] = $body;
        }

        // Headers
        if ($headers) {
            $options['headers'] = $headers;
        }

        // $options['debug'] = true;
        return $this->httpClient->request($method, $url, $options);
    }

    /**
     * Set default language for Google Maps API
     *
     * @param string $language ex. 'zh-TW'
     * @return self
     */
    public function setLanguage($language=null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get current language setting for Google Maps API
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Get current API key in client
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Client methods refer to each service
     *
     * All service methods from Client calling would leave out the first argument (Client itself).
     *
     * @param string Client's method name
     * @param array Method arguments
     * @return mixed Current service method return
     * @example
     *  $equal = \yidas\googleMaps\Geocoding::geocode($client, 'Address');
     *  $equal = $client->geocode('Address');
     */
    public function __call($method, $arguments)
    {
        // Matching self::$serviceMethodMap is required
        if (!isset(self::$serviceMethodMap[$method]))
            throw new Exception("Call to undefined method ".__CLASS__."::{$method}()", 400);

        // Get the service mapped by method
        $service = self::$serviceMethodMap[$method];

        // Fill Client in front of arguments
        array_unshift($arguments, $this);

        return call_user_func_array([self::SERVICE_NAMESPACE . $service, $method], $arguments);
    }
}
