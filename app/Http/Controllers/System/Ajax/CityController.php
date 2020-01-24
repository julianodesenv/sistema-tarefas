<?php


namespace AgenciaS3\Http\Controllers\System\Ajax;


use AgenciaS3\Repositories\CityRepository;

class CityController
{

    protected $repository;

    public function __construct(CityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getCityByStateSelect($id)
    {
        $html = '<option value="">Nenhum estado informado</option>';
        if ($id) {
            $dados = $this->repository->orderBy('name')->findByField('state_id', $id);
            if ($dados) {
                $html = '<option value="">Selecione uma cidade</option>';
                foreach ($dados as $row) {
                    $html .= '<option value="' . $row->id . '">' . $row->name . '</option>';
                }
            }
        }

        return $html;
    }

    public function citiesSelect($state_id, $city_id)
    {
        $html = '<option value="">Selecione:</option>';

        if (!$state_id) {
            $html = '<option value="">Selecione um estado</option>';
            return $html;
        }

        $cities = $this->repository->findByField('state_id', $state_id);
        if ($cities->toArray()) {
            foreach ($cities as $city) {
                $selected = '';
                if ($city->id == $city_id) {
                    $selected = 'selected';
                }
                $html .= '<option value="' . $city->id . '" ' . $selected . '>' . $city->name . '</option>';
            }
        }

        return $html;
    }

}
