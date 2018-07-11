<?php

namespace Webmagic\Dashboard\Elements\Forms;

use Webmagic\Dashboard\Elements\ComplexElement;

class Form extends ComplexElement
{
    protected $view = 'dashboard::elements.forms.form';

    protected $available_fields = [
        'classes',
        'action',
        'method' => [
            'acceptable_values' => [
                'GET',
                'POST',
                'PUT',
                'DELETE',
                'PATCH'
            ]
        ],
        'form_content',
        'horizontal' => [
            'type' => 'bool',
            'default' => false
        ]
    ];

    protected $default_field = 'form_content';
}