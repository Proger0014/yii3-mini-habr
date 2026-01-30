<?php

namespace App\Web\Learn\Echo;

use Yiisoft\FormModel\FormModel;
use Yiisoft\Validator\Label;
use Yiisoft\Validator\Rule\Length;

final class MessageForm extends FormModel
{
    #[Label('Сообщение')]
    #[Length(min: 5, lessThanMinMessage: '{property} должно быть не меньше {min, number} символов')]
    public string $message = '';
}
