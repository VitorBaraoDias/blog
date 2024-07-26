<?php
require_once 'controllers/Controller.php';
class MainController extends Controller
{
    protected $modelClass;
    protected $viewPrefix;
    public function __construct($modelClass, $viewPrefix)
    {
        $this->modelClass = $modelClass;
        $this->viewPrefix = $viewPrefix;
    }
    public function index()
    {
        //$objects = call_user_func([$this->modelClass, 'all']);
        $objects = modelClass::all();
        $this->renderView($this->viewPrefix, 'index', ['objects' => $objects]);
    }

    public function show($id)
    {
        //$object = call_user_func([$this->modelClass, 'find'], $id);
        $object = modelClass::find($id);
        if (is_null($object)) {
            // TODO: redirect to standard error page
        } else {
            $this->renderView($this->viewPrefix, 'show', ['$object' => $object]);
        }
    }

    public function create()
    {
        $this->renderView($this->viewPrefix, 'create');
    }

    public function store()
    {
        $object = new $this->modelClass($this->getHTTPPost());
        if ($object->is_valid()) {
            $object->save();
            $this->redirect('index');
        } else {
            $this->renderView($this->viewPrefix, 'create', ['object' => $object]);
        }
    }

    public function edit($id)
    {
        //$object = call_user_func([$this->modelClass, 'find'], $id);
        $object = modelClass::find($id);

        if (is_null($object)) {
            // TODO: redirect to standard error page
        } else {
            $this->renderView($this->viewPrefix, 'edit', ['object' => $object]);
        }
    }

    public function update($id)
    {
        //$object = call_user_func([$this->modelClass, 'find'], $id);
        $object = modelClass::find($id);
        $object->update_attributes($this->getHTTPPost());
        if ($object->is_valid()) {
            $object->save();
            $this->redirect('index');
        } else {
            $this->renderView($this->viewPrefix, 'edit', ['object' => $object]);
        }
    }

    public function delete($id)
    {
        $object = call_user_func([$this->modelClass, 'find'], $id);
        //$object = modelClass::find($id);

        $object->delete();
        $this->redirect('index');
    }
}
