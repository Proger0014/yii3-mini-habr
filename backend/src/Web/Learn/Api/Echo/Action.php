<?php

declare(strict_types=1);

namespace App\Web\Learn\Api\Echo;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Yiisoft\Router\HydratorAttribute\RouteArgument;

final readonly class Action
{
    public function __construct(
        private ResponseFactoryInterface $responseFactory,
    ) {}

    public function __invoke(
        #[RouteArgument(name: 'message')]
        string $message = 'Hello',
    ): ResponseInterface {
        $response = $this->responseFactory->createResponse();
        $response = $response
            ->withHeader('Content-Type', 'application/json');

        $response
            ->getBody()
            ->write(json_encode([
                'message' => $message,
            ]));

        return $response;
    }
}
