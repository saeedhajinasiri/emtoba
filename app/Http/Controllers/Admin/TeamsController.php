<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use App\Forms\Admin\TeamForm;
use App\Http\Requests\StoreTeamsRequest;
use Exception;
use Laracasts\Flash\Flash;

class TeamsController extends AdminController
{
    protected $section = 'teams';
    protected $single = 'team';
    protected $form = TeamForm::class;
    protected $model;
    protected $path;

    public function __construct(Team $model)
    {
        $this->path = base_path() . '/public/images/' . $this->single . '/';
        $this->model = $model;
        parent::__construct();
    }

    /**
     * @param StoreTeamsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTeamsRequest $request)
    {
        try {
            $input = $request->all();

            if (!$request->get('state')) {
                $input['state'] = 0;
            }

            $userId = \Auth::id();
            $input['created_by'] = $userId;
            $input['updated_by'] = $userId;

            if ($request->hasFile('image')) {
                $imageName = time() . $request->file('image')->getClientOriginalName();
                $img = $request->file('image')->move(
                    $this->path, $imageName
                );

                $input['image'] = $img->getFilename();
            }

            $team = $this->model->create($input);

            Flash::info(trans('admin.insert_is_successfully'));

            return $this->redirectToAction($request->get('action'), $team);
        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Team $team
     * @param StoreTeamsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Team $team, StoreTeamsRequest $request)
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
                if (\File::isFile($this->path . $team->image)) {
                    \File::delete($this->path . $team->image);
                }
            }

            $team->update($input);

            Flash::info(trans('admin.update_is_successfully'));

            return $this->redirectToAction($request->get('action'), $team);

        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }
}
