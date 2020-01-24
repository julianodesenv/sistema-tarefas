<?php

namespace AgenciaS3\Http\Controllers\System\SocialMedia;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SystemRequest;
use AgenciaS3\Repositories\ServiceRepository;
use AgenciaS3\Repositories\SocialMediaPostServiceRepository;
use AgenciaS3\Validators\SocialMediaPostServiceValidator;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class SocialMediaPostServiceController extends Controller
{

    protected $repository;

    protected $validator;

    protected $serviceRepository;

    public function __construct(SocialMediaPostServiceRepository $repository,
                                SocialMediaPostServiceValidator $validator,
                                ServiceRepository $serviceRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->serviceRepository = $serviceRepository;
    }

    public function index($post_id)
    {
        $config = $this->header();
        $config['action'] = 'Listagem';
        $dados = $this->repository
            ->with('service')
            ->scopeQuery(function ($query) use ($post_id) {
            return $query->where('post_id', $post_id);
        })->paginate();

        $services = $this->serviceRepository->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');

        return view('system.social-media.post.service.index', compact('dados', 'config', 'services', 'post_id'));
    }

    public function header()
    {
        $config['title'] = "Posts";
        $config['activeMenu'] = 'social-media';
        $config['titleMenu'] = 'Social Midia';
        $config['activeMenuN2'] = 'post';
        $config['titleMenuN2'] = 'Posts';

        return $config;
    }

    public function store(SystemRequest $request)
    {
        $data = $request->all();
        $check = $this->repository->findWhere(['post_id' => $data['post_id'], 'service_id' => $data['service_id']])->first();
        if ($check) {
            return redirect()->back()->withErrors('Serviço já adicionado neste post!')->withInput();
        }

        try {
            if (isPost($data['value'])) {
                $data['value'] = trataCampoValor($data['value']);
            }

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dados = $this->repository->create($data);

            $response = [
                'success' => 'Registro adicionado com sucesso!'
            ];

            return redirect()->back()->with('success', $response['success']);

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function edit($id)
    {
        $config = $this->header();
        $config['action'] = 'Editar';
        $dados = $this->repository->find($id);
        $post_id = $dados->post_id;
        $dados->value = formata_valor($dados->value);

        $services = $this->serviceRepository->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');

        return view('system.social-media.post.service.edit', compact('dados', 'config', 'post_id', 'services'));
    }

    public function update(SystemRequest $request, $id)
    {
        try {
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;

            if (isPost($data['value'])) {
                $data['value'] = trataCampoValor($data['value']);
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

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

}
