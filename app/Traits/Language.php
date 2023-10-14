<?php

namespace App\Traits;

trait Language
{
    /**
     * getTranslatedAttribute : come from  Voyager
     * https://voyager-docs.devdojo.com/core-concepts/multilanguage
     * currentLocale() : Helper function in App\Helpers\Helpers.php
     *
     * *
     * @param  null  $lng
     * @return mixed
     */
    public function field($field, $lng = null)
    {
        return $this->getTranslatedAttribute($field, $lng ?? $this->currentLocale(), 'fallbackLocale')

            ?? $this->{$field};
    }

    private function currentLocale()
    {
        return \LaravelLocalization::getCurrentLocale();
    }
}
