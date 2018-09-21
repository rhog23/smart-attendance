<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Template
{
  function generate_view($template = '', $view = '', $data = array())
  {
    $this->CI = &get_instance();
    $template_data['contents'] = $this->CI->load->view($view, $data, true);
    return $this->CI->load->view($template, $template_data);
  }
}