<?php
/*
   * Base Controller
   * Loads the models and views
   */
class Controller
{
  /**
   * Parameters from the matched route
   * @var array
   */
  protected $route_params = [];

  /**
   * Class constructor
   *
   * @param array $route_params  Parameters from the route
   *
   * @return void
   */
  public function __construct($route_params)
  {
    $this->route_params = $route_params;
  }

  /**
   * Magic method called when a non-existent or inaccessible method is
   * called on an object of this class. Used to execute before and after
   * filter methods on action methods. Action methods need to be named
   * with an "Action" suffix, e.g. indexAction, showAction etc.
   *
   * @param string $name  Method name
   * @param array $args Arguments passed to the method
   *
   * @return void
   */
  public function __call($name, $args)
  {
    $method = $name . 'Action';

    if (method_exists($this, $method)) {
      if ($this->before() !== false) {
        call_user_func_array([$this, $method], $args);
        $this->after();
      }
    } else {
      throw new \Exception("Method $method not found in controller " . get_class($this));
    }
  }

  /**
   * Before filter - called before an action method.
   *
   * @return void
   */
  protected function before()
  {
  }

  /**
   * After filter - called after an action method.
   *
   * @return void
   */
  protected function after()
  {
  }

  // Load model
  public function model($model)
  {
    // Require model file
    require_once '../app/models/' . $model . '.php';

    // Instatiate model
    return new $model();
  }

  // Load view
  static public function view($view, $data = [])
  {
    // Check for view file
    if (file_exists('../app/views/' . $view . '.php')) {
      require_once '../app/views/' . $view . '.php';
    } else {
      // View does not exist
      die('Cette vue n\'existe pas');
    }
  }
}
