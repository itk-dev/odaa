<?php

/*
 * This file is part of itk-dev/datatidy.
 *
 * (c) 2019 ITK Development
 *
 * This source file is subject to the MIT license.
 */

namespace App\DataSource;

use App\Annotation\DataSource\Option;
use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class AbstractHttpDataSource extends AbstractDataSource
{
    /**
     * @Option(name="URL", description="Endpoint URL", type="string", order=-1)
     */
    protected $url;

    protected $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    protected function getResponse()
    {
        return $this->httpClient->request('GET', $this->url);
    }
}
