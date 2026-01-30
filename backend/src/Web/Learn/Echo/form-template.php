<?php

/** @var \App\Web\Learn\Echo\MessageForm $form */
/** @var \Yiisoft\Router\UrlGeneratorInterface $urlGenerator */
/** @var string[] $errors */
/** @var \Yiisoft\Yii\View\Renderer\Csrf $csrf */

use Yiisoft\FormModel\Field;
use Yiisoft\Html\Html;

$htmlForm = Html::form()
    ->post($urlGenerator->generate('echo/web/say-form'))
    ->csrf($csrf);
?>

<?= $htmlForm->open(); ?>

    <?= Field::text($form, 'message')->required() ?>
    <?= Html::submitButton('Сказать') ?>

<?= $htmlForm->close(); ?>

<?php if ($form->isValid()): ?>
    Сообщение: <?= Html::encode($form->message); ?>
<?php endif; ?>
