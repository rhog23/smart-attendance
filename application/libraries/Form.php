<?php

class Form
{
  private $action;
  private $config;

  /**
   * Get the value of action
   */ 
  public function getAction()
  {
    return $this->action;
  }

  /**
   * Set the value of action
   *
   * @return  self
   */ 
  public function setAction($action)
  {
    $this->action = $action;

    return $this;
  }

  /**
   * Get the value of config
   */ 
  public function getConfig()
  {
    return $this->config;
  }

  /**
   * Set the value of config
   *
   * @return  self
   */ 
  public function setConfig($config)
  {
    $this->config = $config;

    return $this;
  }
}
