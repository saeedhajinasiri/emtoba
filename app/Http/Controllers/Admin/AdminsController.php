<?php

namespace App\Http\Controllers\Admin;


use App\Admin;
use App\Forms\Admin\UserForm;
use App\Http\Requests\Admin\StoreUserRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class AdminsController extends AdminController
{
    protected $section = 'admins';
    protected $form = UserForm::class;
    protected $model;
    protected $path;

    /**
     * RolesController constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->path = public_path() . User::imagePath();
        $this->model = $model;
        parent::__construct();
    }

    public function index()
    {
        $items = Admin::with('user')->orderBy('id', 'DESC')->paginate(10);

        return view('admin.users.index', compact('items'))->with('section', $this->section);
    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(UserForm::class, [
            'method' => 'post',
            'url' => route('admin.' . $this->section . '.store')
        ]);

        return view('admin.users.form', compact('form'))->with('section', $this->section);
    }

    public function store(StoreUserRequest $request)
    {
        try {
            \DB::beginTransaction();

            $input = $request->all();

            if (!isset($input['password'])) {
                Flash::error(trans('admin.' . $this->section . '.password_must_be_filled'));
            } else {
                $input['password'] = Hash::make($input['password']);
                if (!$request->get('state')) {
                    $input['state'] = 0;
                }
                if ($request->hasFile('avatar')) {
                    $imageName = time() . $request->file('avatar')->getClientOriginalName();
                    $img = $request->file('avatar')->move(
                        $this->path, $imageName
                    );

                    $input['avatar'] = $img->getFilename();
                }

                $admin = Admin::create([
                    'created_by' => Auth::id(),
                    'updated_by' => Auth::id(),
                ]);
                $user = $admin->user()->create($input);

                if (isset($input['role_list'])) {
                    $user->roles()->attach($input['role_list']);
                }

                if (isset($input['department_list'])) {
                    $user->departments()->attach($input['department_list']);
                }

                \DB::commit();

                Flash::info(trans('admin.insert_is_successfully'));
                return $this->redirectToAction($request->get('action'), $admin);
            }
        } catch (\Exception $e) {
            \DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => trans('admin.admins.create_admin_has_error'),
            ], 400);
        }
    }

    public function edit($id, FormBuilder $formBuilder)
    {
        $user = Admin::findOrFail($id)->user;
        $user->department_list = $user->departments()->pluck('departments.id')->toArray();

        unset($user->password);
        $form = $formBuilder->create(UserForm::class, [
            'method' => 'PUT',
            'url' => route('admin.' . $this->section . '.update', $id),
            'model' => $user
        ]);

        return view('admin.users.form', compact('form', 'user'))->with('section', $this->section);
    }

    public function update($id, StoreUserRequest $request)
    {
        $admin = Admin::findOrFail($id);
        $user = $admin->user;

        $input = $request->all();
        if (!isset($input['state'])) {
            $input['state'] = 0;
        }

        if ($input['password'] == '') {
            unset($input['password']);
        } else {
            $input['password'] = Hash::make($input['password']);
        }

        if ($request->hasFile('avatar')) {
            $imageName = time() . $request->file('avatar')->getClientOriginalName();
            $img = $request->file('avatar')->move(
                $this->path, $imageName
            );

            $input['avatar'] = $img->getFilename();
            if (\File::isFile($this->path . $user->avatar)) {
                \File::delete($this->path . $user->avatar);
            }
        }

        $user->update($input);

        if (isset($input['role_list'])) {
            $user->roles()->sync($input['role_list']);
        }

        if (isset($input['department_list'])) {
            $user->departments()->sync($input['department_list']);
        }
        Cache::forget('entrust_roles_for_user_' . $user->id);

        Flash::info(trans('admin.update_is_successfully'));

        return $this->redirectToAction($request->get('action'), $admin);
    }
}
