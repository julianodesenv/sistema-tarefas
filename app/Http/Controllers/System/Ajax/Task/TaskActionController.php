<?php

namespace AgenciaS3\Http\Controllers\System\Ajax\Task;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Repositories\TaskActionRepository;
use AgenciaS3\Repositories\TaskProjectRepository;

class TaskActionController extends Controller
{
    protected $repository;

    public function __construct(TaskActionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function ajaxSelectByAction($id)
    {
        $html = '<option value="">Ação</option>';
        if ($id) {
            $dados = $this->repository->orderBy('name')->findWhere(['sector_id' => $id]);
            if ($dados->toArray()) {
                foreach ($dados as $row) {
                    $html .= '<option value="' . $row->id . '">' . $row->name . '</option>';
                }
            } else {
                $html = '<option value="">Nenhuma ação cadastrado</option>';
            }
        } else {
            $html = '<option value="">Selecione um Setor</option>';
        }

        return $html;
    }

}