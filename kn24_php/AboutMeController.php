<?php

/**
 * cd "C:\Users\олег\Desktop\4 composer\kn24_php"
 * php -S localhost:8000 
 * Class AboutMeController
 * Контролер для сторінки "About me".
 * Готує дані про автора та передає їх у шаблон представлення.
 */
class AboutMeController
{
    /**
     * Повертає дані для відображення на сторінці "About me".
     *
     * @return array<string, mixed> Масив даних для шаблону:
     *                              - name        — ім'я автора
     *                              - role        — поточна роль / позиція
     *                              - bio         — коротка біографія
     *                              - skills      — список навичок
     *                              - hobbies     — список хобі
     *                              - contacts    — контакти (email, посилання тощо)
     */
    public function getViewData(): array
    {
        return [
            'name'     => 'Олег',
            'role'     => 'PHP / Web Developer (student)',
            'bio'      => 'Короткий опис про себе, навчання та інтерес до веб-розробки.',
            'skills'   => [
                'PHP 8+',
                'HTML5 & CSS3',
                'JavaScript (ES6+)',
                'Git / GitHub',
                'Основи SQL',
            ],
            'hobbies'  => [
                'Вивчення нових веб-технологій',
                'Читання технічних статей та блогів',
                'Настільні ігри або відеоігри',
            ],
            'contacts' => [
                'email'   => 'your.email@example.com',
                'github'  => 'https://github.com/your-profile',
            ],
        ];
    }
}


