<?php

class Table
{
  private $columns;

  /**
   * Get the value of columns
   */
  public function getColumns()
  {
    return $this->columns;
  }

  /**
   * Set the value of columns
   *
   * @return  self
   */
  public function setColumns($columns)
  {
    $this->columns = $columns;

    return $this;
  }
}
