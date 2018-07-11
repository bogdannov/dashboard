<?php


namespace Tests\Unit\Content;


use Webmagic\Dashboard\Traits\Content\ContentFieldsUsable;

class Element
{
    use ContentFieldsUsable;

    public function setAttribuitesForTesting(array $attribuites)
    {
        foreach ($attribuites as $name => $value) {
            $this->{$name} = $value;
        }
    }

    /**
     * TestField
     *
     * @return string
     */
    public function getTestFieldSetAsMethod()
    {
        return 'test_value';
    }
}