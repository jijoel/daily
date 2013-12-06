<?php namespace Days\Support;

use URL;
use Days\Support\DayComposer;

/**
 * Composer with support for multiple pages on one day
 */
class MultiPageComposer extends DayComposer
{
    public function compose($view)
    {
        parent::compose($view);

        $this->setPropertyForView('dayPath', self::DAY_PATH);

        $this->view->with('dayLink', $this->getDayLink());
    }

    protected function getDayLink()
    {
        $settings = $this->getConfigSettingsForToday();

        return URL::to($settings[self::DAY_PATH]);
    }

}

