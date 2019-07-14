<?php

namespace App\Http\Controllers\Admin;

use App\Subscriber;
use Exception;

class SubscribersController extends AdminController
{
    protected $section = 'subscribers';
    protected $model;

    public function __construct(Subscriber $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        try {
            $items = $this->model->orderBy('id', 'DESC')->paginate(10);

            return view('admin.' . $this->section . '.index', compact('items'));
        } catch (Exception $exception) {
            return $this->returnWithError($exception->getMessage());
        }
    }

}
