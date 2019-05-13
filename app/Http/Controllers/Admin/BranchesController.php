<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Forms\Admin\BranchForm;
use App\Http\Requests\Admin\StoreBranchesRequest;
use Exception;
use Laracasts\Flash\Flash;

class BranchesController extends AdminController
{
    protected $section = 'branches';
    protected $single = 'branch';
    protected $form = BranchForm::class;
    protected $model;
    protected $path;
    protected $relative_path;

    public function __construct(Branch $model)
    {
        $this->relative_path = Branch::imagePath();
        $this->path = public_path() . $this->relative_path;
        $this->model = $model;
        parent::__construct();
    }

    /**
     * @param StoreBranchesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBranchesRequest $request)
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

            $branch = $this->model->create($input);

            Flash::info(trans('admin.insert_is_successfully'));

            return $this->redirectToAction($request->get('action'), $branch);
        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Branch $branch
     * @param StoreBranchesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Branch $branch, StoreBranchesRequest $request)
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
                if (\File::isFile($this->path . $branch->image)) {
                    \File::delete($this->path . $branch->image);
                }
            }

            $branch->update($input);

            Flash::info(trans('admin.update_is_successfully'));

            return $this->redirectToAction($request->get('action'), $branch);

        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }
}
