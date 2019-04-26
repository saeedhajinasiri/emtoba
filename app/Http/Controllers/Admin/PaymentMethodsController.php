<?php

namespace App\Http\Controllers\Admin;

use App\PaymentMethod;
use App\Forms\Admin\PaymentMethodForm;
use App\Http\Requests\StorePaymentMethodsRequest;
use Exception;
use Laracasts\Flash\Flash;

class PaymentMethodsController extends AdminController
{
    protected $section = 'payment_methods';
    protected $single = 'payment_method';
    protected $form = PaymentMethodForm::class;
    protected $model;
    protected $path;

    public function __construct(PaymentMethod $model)
    {
        $this->path = base_path() . '/public/images/' . $this->single . '/';
        $this->model = $model;
        parent::__construct();
    }

    /**
     * @param StorePaymentMethodsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePaymentMethodsRequest $request)
    {
        try {
            $input = $request->all();

            if (!$request->get('state')) {
                $input['state'] = 0;
            }

            $userId = \Auth::id();
            $input['created_by'] = $userId;
            $input['updated_by'] = $userId;

            $paymentMethod = $this->model->create($input);

            Flash::info(trans('admin.insert_is_successfully'));

            return $this->redirectToAction($request->get('action'), $paymentMethod);
        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param StorePaymentMethodsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, StorePaymentMethodsRequest $request)
    {
        try {
            $paymentMethod = PaymentMethod::findOrFail($id);
            $input = $request->all();
            if (!isset($input['state'])) {
                $input['state'] = 0;
            }

            $paymentMethod->update($input);

            Flash::info(trans('admin.update_is_successfully'));

            return $this->redirectToAction($request->get('action'), $paymentMethod);

        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }
}
