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
    protected $relative_path;

    public function __construct(Link $model)
    {
        $this->relative_path = Link::imagePath();
        $this->path = public_path() . $this->relative_path;
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

            if ($request->hasFile('image')) {
                $imageName = time() . $request->file('image')->getClientOriginalName();
                $img = $request->file('image')->move(
                    $this->path, $imageName
                );

                $input['image'] = $img->getFilename();
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

            if ($request->hasFile('image')) {
                $imageName = time() . $request->file('image')->getClientOriginalName();
                $img = $request->file('image')->move(
                    $this->path, $imageName
                );

                $input['image'] = $img->getFilename();
                if (\File::isFile($this->path . $link->image)) {
                    \File::delete($this->path . $link->image);
                }
            }

            $link->update($input);

            Flash::info(trans('admin.update_is_successfully'));

            return $this->redirectToAction($request->get('action'), $link);

        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }
}
