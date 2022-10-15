<?php

return [

    'defaultConnection' => 'default',
    'connections' => [

        'default' => [
            /*
             *
             * @see https://www.elastic.co/guide/en/elasticsearch/client/php-api/2.0/_configuration.html#_extended_host_configuration
             * @see https://www.elastic.co/guide/en/elasticsearch/client/php-api/2.0/_configuration.html#_inline_host_configuration
             */

            'hosts' => [
                [
                    'host'              => env('ELASTICSEARCH_HOST', 'localhost'),
                    'port'              => env('ELASTICSEARCH_PORT', 9200),
                    'scheme'            => env('ELASTICSEARCH_SCHEME', null),
                    'user'              => env('ELASTICSEARCH_USER', null),
                    'pass'              => env('ELASTICSEARCH_PASS', null),

                ],
            ],

            'sslVerification' => null,

            'logging' => false,


            'logPath' => storage_path('logs/elasticsearch.log'),

            'logLevel' => Monolog\Logger::INFO,


            'retries' => null,


            'sniffOnStart' => false,

            /**
             * HTTP Handler
             *
             * @see https://www.elastic.co/guide/en/elasticsearch/client/php-api/2.0/_configuration.html#_configure_the_http_handler
             * @see http://ringphp.readthedocs.org/en/latest/client_handlers.html
             */

            'httpHandler' => null,

            /**
             * Connection Pool
             *
             * @see https://www.elastic.co/guide/en/elasticsearch/client/php-api/2.0/_configuration.html#_setting_the_connection_pool
             * @see https://www.elastic.co/guide/en/elasticsearch/client/php-api/2.0/_connection_pool.html
             */

            'connectionPool' => null,

            /**
             * Connection Selector
             *
             * @see https://www.elastic.co/guide/en/elasticsearch/client/php-api/2.0/_configuration.html#_setting_the_connection_selector
             * @see https://www.elastic.co/guide/en/elasticsearch/client/php-api/2.0/_selectors.html
             */

            'connectionSelector' => null,

            /**
             * Serializer
             *
             * @see https://www.elastic.co/guide/en/elasticsearch/client/php-api/2.0/_configuration.html#_setting_the_serializer
             * @see https://www.elastic.co/guide/en/elasticsearch/client/php-api/2.0/_serializers.html
             */

            'serializer' => null,

            /**
             * Connection Factory
             *
             * @see https://www.elastic.co/guide/en/elasticsearch/client/php-api/2.0/_configuration.html#_setting_a_custom_connectionfactory
             */

            'connectionFactory' => null,

            /**
             * Endpoint
             *
             * @see https://www.elastic.co/guide/en/elasticsearch/client/php-api/6.0/_configuration.html#_set_the_endpoint_closure
             */

            'endpoint' => null,


            /**
             * Register additional namespaces
             *
             * An array of additional namespaces to register.
             *
             * @example 'namespaces' => [XPack::Security(), XPack::Watcher()]
             * @see https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/ElasticsearchPHP_Endpoints.html#Elasticsearch_ClientBuilderregisterNamespace_registerNamespace
             */
            'namespaces' => [],

            /**
             * Tracer
             *
             * Tracer is handled by passing in a name of the class implements Psr\Log\LoggerInterface.
             *
             * @see https://www.elastic.co/guide/en/elasticsearch/client/php-api/2.0/_configuration.html#_setting_a_custom_connectionfactory
             */
            'tracer' => null,

        ],

    ],

];