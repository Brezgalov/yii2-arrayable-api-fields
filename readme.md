## Как пользоваться
Установка через composer:

    composer require brezgalov/yii2-arrayable-api-fields --prefer-dist

Для php8:

    composer require brezgalov/yii2-arrayable-api-fields --prefer-dist --ignore-platform-reqs

Подключить в behaviours модели:


    'arrayableInput' => [
        'class' => ArrayableInputBehaviour::class,
        'fields' => ['id', 'exclude_id'],
    ],
