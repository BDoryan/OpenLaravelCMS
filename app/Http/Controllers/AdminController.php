<?php

namespace App\Http\Controllers;

use App\Exceptions\ModelNotFound;
use App\Http\Requests\Model\SetRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.pages.dashboard');
    }

    public function crud($model_name): View
    {
        $model_name = ucfirst($model_name);
        $model = "App\Models\\$model_name";

        if (!class_exists($model)) {
            throw ModelNotFound::withModel($model);
        }

        $model_instance = new $model;

        return view('admin.pages.crud.index', ['model' => $model_name, 'title' => $model, 'description' => 'Créer, lire, mettre à jour et supprimer', 'table' => $model_instance->getTableComponent()]);
    }

    public function postSet(SetRequest $request, $model_name, $id = null)
    {
        try {
            $model_name = ucfirst($model_name);
            $model = "App\Models\\$model_name";

            if (!class_exists($model)) {
                throw ModelNotFound::withModel($model);
            }

            if (!empty($id)) {
                $model = $model::find($request->id);
            } else {
                $model = new $model;
            }
            $validator = Validator::make($request->all(), $model->rules());

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $model->fill($request->all());
            $model->save();

            if (!empty($id)) {
                $request->session()->addAlert('success', 'L\'élément a bien été mis à jour');
            } else {
                $request->session()->addAlert('success', 'L\'élément a bien été ajouté');
            }

            if ($request->has('stay'))
                return redirect()->route('admin.crud.update', ['model' => $model_name, 'id' => $model->id]);

            return redirect()->route('admin.crud', ['model' => $model_name]);
        } catch (\Throwable $th) {
            $request->session()->addAlert('danger', 'Une erreur est survenue lors de l\'ajout de l\'élément');
            return redirect()->back();
        }
    }

    public function delete($model_name, $entity_id)
    {
        $model_name = ucfirst($model_name);
        $model = "App\Models\\$model_name";

        if (!class_exists($model)) {
            throw ModelNotFound::withModel($model);
        }

        $model_instance = $model::find($entity_id);

        if ($model_instance) {
            $model_instance->delete();
        }

        Session::addAlert('success', 'L\'élément a bien été supprimé');

        return redirect()->route('admin.crud', ['model' => $model_name]);
    }

    public function set($model_name, $entity_id = null): View
    {
        $model_name = ucfirst($model_name);
        $model = "App\Models\\$model_name";

        if (!class_exists($model)) {
            throw ModelNotFound::withModel($model);
        }

        if (!empty($entity_id))
            $model_instance = $model::find($entity_id);
        else
            $model_instance = new $model;


        return view('admin.pages.crud.set', ['model' => $model_name, 'form' => $model_instance->getFormView()]);
    }

    public function pages()
    {
        return view('admin.pages.pages');
    }

    public function login()
    {
        return view('admin.pages.login');
    }
}
