<?php

declare(strict_types=1);


namespace SymfonyHackers\Bundle\FormBundle\Form\JQuery\Type\Autocomplete;


use SymfonyHackers\Bundle\FormBundle\Form\JQuery\Type\AutocompleteType;

class TextType extends AutocompleteType
{
    public function getBlockPrefix()
    {
        return 'autocomplete_text';
    }
}