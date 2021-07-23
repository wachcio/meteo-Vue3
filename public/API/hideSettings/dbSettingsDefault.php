<?php

class dbSettings
{
    private $setting = [];

    public function getSettings()
    {
        $this->setSettings();
        return $this->setting;
    }

    private function setSettings()
    {
        $this->setting['dbName'] = "";
        $this->setting['user'] = "";
        $this->setting['password'] = "";
        $this->setting['host'] = "localhost";
        $this->setting['API_key'] = "";
    }
}
