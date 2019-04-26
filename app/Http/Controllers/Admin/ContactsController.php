<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Forms\Admin\ContactForm;
use App\Http\Requests\StoreContactsRequest;
use Laracasts\Flash\Flash;
use Mockery\CountValidator\Exception;

class ContactsController extends AdminController
{
    protected $section = 'contacts';
    protected $single = 'contact';
    protected $form = ContactForm::class;
    protected $model;
    protected $path;

    public function __construct(Contact $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    /**
     * Show all restaurants with pagination
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = $this->model->with('user')->orderBy('id', 'DESC')->paginate(10);

        return view($this->section . '.admin.index', compact('items'));
    }

    /**
     * @param StoreContactsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreContactsRequest $request)
    {
        try {
            $input = $request->all();

            $userId = \Auth::id();
            $input['created_by'] = $userId;
            $input['updated_by'] = $userId;

            $contact = $this->model->create($input);

            Flash::info(trans('admin.insert_is_successfully'));

            return $this->redirectToAction($request->get('action'), $contact);
        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Contact $contact
     * @param StoreContactsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Contact $contact, StoreContactsRequest $request)
    {
        try {
            $input = $request->all();
            if (!isset($input['state'])) {
                $input['state'] = 0;
            }

            $contact->update($input);

            Flash::info(trans('admin.update_is_successfully'));

            return $this->redirectToAction($request->get('action'), $contact);

        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }
}
