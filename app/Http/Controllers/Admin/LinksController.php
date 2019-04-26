<?php

namespace App\Http\Controllers\Admin;

use App\Link;
use App\Forms\Admin\LinkForm;
use App\Http\Requests\Admin\StoreLinksRequest;
use Exception;
use Laracasts\Flash\Flash;

class LinksController extends AdminController
{
    protected $section = 'links';
    protected $single = 'link';
    protected $form = LinkForm::class;
    protected $model;
    protected $path;

    public function __construct(Link $model)
    {
        $this->path = base_path() . '/public/images/' . $this->single . '/';
        $this->model = $model;
        parent::__construct();
    }

    /**
     * @param StoreLinksRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreLinksRequest $request)
    {
        try {
            $input = $request->all();

            if (!$request->get('state')) {
                $input['state'] = 0;
            }

            $userId = \Auth::id();
            $input['created_by'] = $userId;
            $input['updated_by'] = $userId;

            $link = $this->model->create($input);

            Flash::info(trans('admin.insert_is_successfully'));

            return $this->redirectToAction($request->get('action'), $link);
        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Link $link
     * @param StoreLinksRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Link $link, StoreLinksRequest $request)
    {
        try {
            $input = $request->all();
            if (!isset($input['state'])) {
                $input['state'] = 0;
            }

            $link->update($input);

            Flash::info(trans('admin.update_is_successfully'));

            return $this->redirectToAction($request->get('action'), $link);

        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }
}
