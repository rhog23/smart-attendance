<?php

class Form
{
  private $action;
  private $config;
  private $title;
  private $form_error_message = [
    'required' => '{field} tidak boleh kosong',
    'numeric' => '{field} hanya boleh berisi angka',
    'alpha' => '{field} hanya boleh berisi huruf abjad',
    'alphanumeric' => '{field} hanya boleh berisi huruf abjad atau angka'
  ];

  /**
   * Get the value of action
   */
  public function get_action()
  {
    return $this->action;
  }

  /**
   * Set the value of action
   *
   * @return  self
   */
  public function set_action($action)
  {
    $this->action = $action;

    return $this;
  }

  /**
   * Get the value of config
   */
  public function get_config()
  {
    return $this->config;
  }

  /**
   * Set the value of config
   *
   * @return  self
   */
  public function set_config($config)
  {
    $this->config = $config;

    return $this;
  }

  /**
   * Get the value of title
   */
  public function get_title()
  {
    return $this->title;
  }

  /**
   * Set the value of title
   *
   * @return  self
   */
  public function set_title($title)
  {
    $this->title = $title;

    return $this;
  }

  /**
   * Get the value of form_error_message
   */
  public function get_form_error()
  {
    return $this->form_error_message;
  }
}
