<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EState;
use App\Forms\Admin\AboutForm;
use App\Media;
use App\About;
use App\Tag;
use App\Http\Requests\Admin\StoreAboutRequest;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class AboutController extends AdminController
{
    protected $title;
    protected $path;
    protected $section = 'about';
    protected $form = AboutForm::class;
    protected $model;
    protected $single = 'about';
    protected $type = 'about';

    public function __construct(About $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAboutRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAboutRequest $request)
    {
        $input = $request->all();

        $item = $this->model->create($input);

        Flash::info(trans('admin.insert_is_successfully'));

        return redirect()->route('admin.' . $this->type . '.edit', $item->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param About $about
     * @param StoreAboutRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(About $about, StoreAboutRequest $request)
    {
        $input = $request->all();
        if (!isset($input['state'])) {
            $input['state'] = 0;
        }

        $about->update($input);

        Flash::info(trans('admin.update_is_successfully'));

        return redirect()->route('admin.about.edit', $about->id);
    }
}
