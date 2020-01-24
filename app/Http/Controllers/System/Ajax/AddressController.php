<?php


namespace AgenciaS3\Http\Controllers\System\Ajax;


use AgenciaS3\Repositories\CityRepository;
use AgenciaS3\Repositories\StateRepository;
use EscapeWork\Frete\Correios\ConsultaCEP;
use EscapeWork\Frete\FreteException;

class AddressController
{

    protected $stateRepository;

    protected $cityRepository;

    public function __construct(StateRepository $stateRepository,
                                CityRepository $cityRepository)
    {
        $this->stateRepository = $stateRepository;
        $this->cityRepository = $cityRepository;
    }

    public function getAddressZipCode($zip_code)
    {
        try {
            $consulta = new ConsultaCEP;
            $result = $consulta->setCep($zip_code)->find();

            /*
            # ou, pra facilitar, você pode usar o método
            # ConsultaCEP::search(93320080)
            echo $result->bairro;
            echo $result->cep;
            echo $result->cidade;
            echo $result->complemento;
            echo $result->complemento2;
            echo $result->end;
            echo $result->uf;
            */

            $dados['sucesso'] = (string)$result->resultado;
            $dados['address'] = (string)$result->end;
            $dados['district'] = (string)$result->bairro;
            $dados['city'] = (string)$result->cidade;
            $dados['state'] = (string)$result->uf;
            $dados['state_id'] = $this->getStateId((string)$result->uf);
            $dados['city_id'] = $this->getCityId($dados['state_id'], (string)$result->cidade);


            //dd($result); // debugar, debugar!
            return response()->json([
                'success' => true,
                'data' => $dados
            ]);
        } catch (FreteException $e) {
            // trate o erro adequadamente (e não escrevendo na tela)
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function getStateId($uf)
    {
        if ($uf) {
            $dados = $this->stateRepository->findByField('abbr', $uf)->first();
            if ($dados) {
                return $dados->id;
            }
        }

        return false;
    }

    public function getCityId($state_id, $name)
    {
        if (isPost($state_id) && isPost($name)) {
            $city = $this->cityRepository->findWhere(['state_id' => $state_id, 'name' => $name])->first();
            if ($city) {
                return $city->id;
            }
        }

        return false;
    }

}
