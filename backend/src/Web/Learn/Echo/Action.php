<?php

declare(strict_types=1);

namespace App\Web\Learn\Echo;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\Router\HydratorAttribute\RouteArgument;
use Yiisoft\Yii\View\Renderer\ViewRenderer;

final readonly class Action
{
    public function __construct(
        private ViewRenderer $view,
    ) {}

    public function __invoke(
        #[RouteArgument(name: 'message')]
        string $message = 'hello',
    ): ResponseInterface {
        return $this->view->render(__DIR__ . '/template.php', [
            'message' => $message,
        ]);
    }
}
