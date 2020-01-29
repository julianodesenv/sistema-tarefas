<?php

namespace AgenciaS3\Http\Controllers\System\Ajax\Task;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Repositories\TaskProjectRepository;

class TaskProjectController extends Controller
{
    protected $repository;

    public function __construct(TaskProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function ajaxSelectByClient($id)
    {
        $html = '<option value="">Projetos</option>';
        if ($id) {
            $dados = $this->repository->orderBy('name')->findWhere(['client_id' => $id]);
            if ($dados->toArray()) {
                foreach ($dados as $row) {
                    $html .= '<option value="' . $row->id . '">' . $row->name . '</option>';
                }
            } else {
                $html = '<option value="">Nenhum projeto cadastrado</option>';
            }
        } else {
            $html = '<option value="">Selecione um cliente</option>';
        }

        return $html;
    }

}