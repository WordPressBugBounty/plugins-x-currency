<?php

namespace XCurrency\WpMVC\Container\Exception;

\defined('ABSPATH') || exit;
use Exception;
use XCurrency\Psr\Container\ContainerExceptionInterface;
class ContainerException extends Exception implements ContainerExceptionInterface
{
}
