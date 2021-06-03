<?php

class apiSettings
{
    private $setting = [];

    public function getSettings()
    {
        $this->setSettings();
        return $this->setting;
    }

    private function setSettings()
    {
        $this->setting['token'] = "";
    }
}
