<?php

namespace AgenciaS3\Http\Controllers\System\Client;

use AgenciaS3\Criteria\FindByEmailCriteria;
use AgenciaS3\Criteria\FindByNameCriteria;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\CityRepository;
use AgenciaS3\Repositories\ClientRepository;
use AgenciaS3\Repositories\SegmentClientRepository;
use AgenciaS3\Repositories\StateRepository;
use AgenciaS3\Repositories\TypeClientRepository;
use AgenciaS3\Services\UtilObjeto;
use AgenciaS3\Validators\ClientValidator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


/**
 * Class ClientController
 * @package AgenciaS3\Http\Controllers\System\Client
 */
class ClientController extends Controller
{

    /**
     * @var ClientRepository
     */
    protected $repository;

    /**
     * @var ClientValidator
     */
    protected $validator;

    /**
     * @var StateRepository
     */
    protected $stateRepository;

    /**
     * @var CityRepository
     */
    protected $cityRepository;

    /**
     * @var SegmentClientRepository
     */
    protected $segmentClientRepository;

    /**
     * @var TypeClientRepository
     */
    protected $typeClientRepository;

    /**
     * @var UtilObjeto
     */
    protected $utilObjeto;

    /**
     * @var string
     */
    protected $path;

    /**
     * ClientController constructor.
     * @param ClientRepository $repository
     * @param ClientValidator $validator
     * @param StateRepository $stateRepository
     * @param CityRepository $cityRepository
     * @param SegmentClientRepository $segmentClientRepository
     * @param TypeClientRepository $typeClientRepository
     * @param UtilObjeto $utilObjeto
     */
    public function __construct(ClientRepository $repository,
                                ClientValidator $validator,
                                StateRepository $stateRepository,
                                CityRepository $cityRepository,
                                SegmentClientRepository $segmentClientRepository,
                                TypeClientRepository $typeClientRepository,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->stateRepository = $stateRepository;
        $this->cityRepository = $cityRepository;
        $this->segmentClientRepository = $segmentClientRepository;
        $this->typeClientRepository = $typeClientRepository;
        $this->utilObjeto = $utilObjeto;
        $this->path = 'uploads/clients/';
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        if (isset($name) || isset($email)) {
            $this->repository
                ->pushCriteria(new FindByNameCriteria($name))
                ->pushCriteria(new FindByEmailCriteria($email));
        } else {
            $this->repository->skipCriteria();
        }

        $config = $this->header();
        $config['action'] = 'Listagem';
        $dados = $this->repository->orderBy('name', 'asc')->paginate();

        return view('system.client.index', compact('dados', 'config'));
    }

    /**
     * @return mixed
     */
    public function header()
    {
        $config['title'] = "Clientes";
        $config['routeMenu'] = route('system.client.index');
        $config['activeMenu'] = 'client';
        $config['titleMenu'] = 'Clientes';

        return $config;
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        $states = $this->stateRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');
        $types = $this->typeClientRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');
        $segments = $this->segmentClientRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');
        $cities = '';

        return view('system.client.create', compact('config', 'states', 'types', 'segments', 'cities'));
    }

    /**
     * @param SystemRequest $request
     * @return RedirectResponse
     */
    public function store(SystemRequest $request)
    {
        try {
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            if ($data['type'] == 'pj') {
                $data['corporate_name'] = $data['name'];
            }
            $data['entry_date'] = data_to_mysql($data['entry_date']);

            if (isset($data['image'])) {
                $image = $this->utilObjeto->uploadFile($request, $data, $this->path, 'image', 'image|mimes:jpeg,png,jpg,gif,svg|max:2048');
                if ($image) {
                    $data['image'] = $image;
                }
            }

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dados = $this->repository->create($data);

            $response = [
                'success' => 'Registro adicionado com sucesso!'
            ];

            return redirect()->route('system.client.contact.index', $dados->id)->with('success', $response['success']);

        } catch (ValidatorException $e) {
            if (isset($data['image'])) {
                $this->utilObjeto->destroyFile($this->path, $data['image']);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $config = $this->header();
        $config['action'] = 'Editar';
        $dados = $this->repository->find($id);

        $types = $this->typeClientRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');
        $segments = $this->segmentClientRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');
        $states = $this->stateRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');
        $cities = '';
        if ($dados->city_id) {
            $cities = $this->cityRepository->orderBy('name')->findByField('state_id', $dados->state_id)->pluck('name', 'id');
        }
        $dados['entry_date'] = mysql_to_data($dados['entry_date']);

        return view('system.client.edit', compact('dados', 'config', 'states', 'cities', 'types', 'segments'));
    }

    /**
     * @param SystemRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(SystemRequest $request, $id)
    {
        try {
            $data = $request->all();
            $data['entry_date'] = data_to_mysql($data['entry_date']);

            if (isset($data['image'])) {
                $image = $this->utilObjeto->uploadFile($request, $data, $this->path, 'image', 'image|mimes:jpeg,png,jpg,gif,svg|max:2048');
                if ($image) {
                    $data['image'] = $image;
                }
            }

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $dados = $this->repository->update($data, $id);

            $response = [
                'success' => 'Registro alterado com sucesso!'
            ];

            return redirect()->back()->with('success', $response['success']);

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function active($id)
    {
        try {
            $dados = $this->repository->find($id);

            $data = $dados->toArray();
            if ($dados->active == 'y') {
                $data['active'] = 'n';
            } else {
                $data['active'] = 'y';
            }

            $dados = $this->repository->update($data, $id);

            return $dados;

        } catch (ValidatorException $e) {
            return false;
        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

    /**
     * @param $id
     * @param $name
     * @return RedirectResponse
     */
    public function destroyFile($id, $name)
    {
        $dados = $this->repository->find($id);
        if (isset($dados->$name)) {
            $data = $dados->toArray();
            if (isset($dados->$name) && $this->utilObjeto->destroyFile($this->path, $dados->$name)) {

                $data[$name] = '';
                $this->repository->update($data, $id);

                return redirect()->back()->with('success', ucfirst($name) . ' removida com sucesso!');
            }

            return redirect()->back()->withErrors('Erro ao excluír ' . ucfirst($name))->withInput();
        }
    }

}
