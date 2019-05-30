<?php

namespace App\Http\Controllers\Admin;

use App\Lesson;
use App\Forms\Admin\LessonForm;
use App\Http\Requests\Admin\StoreLessonsRequest;
use Exception;
use Laracasts\Flash\Flash;

class LessonsController extends AdminController
{
    protected $section = 'lessons';
    protected $single = 'lesson';
    protected $form = LessonForm::class;
    protected $model;
    protected $path;
    protected $relative_path;

    public function __construct(Lesson $model)
    {
        $this->relative_path = Lesson::imagePath();
        $this->path = public_path() . $this->relative_path;
        $this->model = $model;
        parent::__construct();
    }

    /**
     * @param StoreLessonsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreLessonsRequest $request)
    {
        try {
            $input = $request->all();

            if (!$request->get('state')) {
                $input['state'] = 0;
            }

            if ($request->hasFile('file')) {
                $imageName = time() . $request->file('file')->getClientOriginalName();
                $img = $request->file('file')->move(
                    $this->path, $imageName
                );

                $input['file'] = $img->getFilename();
            }

            $userId = \Auth::id();
            $input['created_by'] = $userId;
            $input['updated_by'] = $userId;

            $lesson = $this->model->create($input);

            Flash::info(trans('admin.insert_is_successfully'));

            return $this->redirectToAction($request->get('action'), $lesson);
        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Lesson $lesson
     * @param StoreLessonsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Lesson $lesson, StoreLessonsRequest $request)
    {
        try {
            $input = $request->all();
            if (!isset($input['state'])) {
                $input['state'] = 0;
            }

            if ($request->hasFile('file')) {
                $imageName = time() . $request->file('file')->getClientOriginalName();
                $img = $request->file('file')->move(
                    $this->path, $imageName
                );

                $input['file'] = $img->getFilename();
                if (\File::isFile($this->path . $lesson->image)) {
                    \File::delete($this->path . $lesson->image);
                }
            }

            $lesson->update($input);

            Flash::info(trans('admin.update_is_successfully'));

            return $this->redirectToAction($request->get('action'), $lesson);

        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }
}
