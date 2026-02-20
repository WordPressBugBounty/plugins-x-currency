<?php

namespace XCurrency\WpMVC\Container\Exception;

\defined('ABSPATH') || exit;
use Exception;
use XCurrency\Psr\Container\NotFoundExceptionInterface;
class NotFoundException extends Exception implements NotFoundExceptionInterface
{
}
