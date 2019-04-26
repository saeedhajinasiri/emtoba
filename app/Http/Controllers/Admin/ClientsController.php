<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Forms\Admin\ClientForm;
use App\Http\Requests\StoreClientsRequest;
use Exception;
use Laracasts\Flash\Flash;

class ClientsController extends AdminController
{
    protected $section = 'clients';
    protected $single = 'client';
    protected $form = ClientForm::class;
    protected $model;
    protected $path;

    public function __construct(Client $model)
    {
        $this->path = base_path() . '/public/images/' . $this->single . '/';
        $this->model = $model;
        parent::__construct();
    }

    /**
     * @param StoreClientsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreClientsRequest $request)
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

            $client = $this->model->create($input);

            Flash::info(trans('admin.insert_is_successfully'));

            return $this->redirectToAction($request->get('action'), $client);
        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Client $client
     * @param StoreClientsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Client $client, StoreClientsRequest $request)
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
                if (\File::isFile($this->path . $client->image)) {
                    \File::delete($this->path . $client->image);
                }
            }

            $client->update($input);

            Flash::info(trans('admin.update_is_successfully'));

            return $this->redirectToAction($request->get('action'), $client);

        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }
}
