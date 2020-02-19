<?php

namespace AgenciaS3\Repositories;

use AgenciaS3\Entities\Category;
use AgenciaS3\Entities\ClientUser;
use AgenciaS3\Entities\SocialMediaPost;
use AgenciaS3\Services\UserService;
use AgenciaS3\Validators\SocialMediaPostValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class SocialMediaPostRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class SocialMediaPostRepositoryEloquent extends BaseRepository implements SocialMediaPostRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * @param $user_id
     * @param null $limit
     * @return mixed
     */
    public function getByClientManagerUser($user_id, $limit = null)
    {
        $clients = (new UserService)->getClientUserManager($user_id);
        $dados = $this->orderBy('date', 'asc')
            ->with(['services', 'services.service', 'status', 'client'])
            ->scopeQuery(function ($query) use ($user_id, $clients) {

                if ($clients) {
                    $ids = null;
                    foreach ($clients as $row) {
                        $ids[] = $row;
                    }

                    $query = $query->whereIn('client_id', $ids);
                }

                //$query = $query->groupBy('id');

                return $query;
            });

        if ($limit) {
            return $dados->paginate($limit);
        } else {
            return $dados->paginate();
        }
    }

    /**
     * @param $user_id
     * @param null $limit
     * @return mixed
     */
    public function getByClientUser($user_id, $limit = null)
    {
        $clients = ClientUser::where('user_id', $user_id)->get();
        $dados = $this->orderBy('date', 'asc')
            ->with(['services', 'services.service', 'status', 'client'])
            ->scopeQuery(function ($query) use ($user_id, $clients) {

                if ($clients) {
                    $ids = null;
                    foreach ($clients as $row) {
                        $ids[] = $row->client_id;
                    }

                    $query = $query->whereIn('client_id', $ids);
                }

                return $query;
            });


        if ($limit) {
            return $dados->paginate($limit);
        } else {
            return $dados->paginate();
        }
    }

    /**
     * @param $client_id
     * @param null $limit
     * @return mixed
     */
    public function getByClientId($client_id, $limit = null)
    {
        $dados = $this->orderBy('date', 'asc')
            ->with(['services', 'services.service', 'status', 'client'])
            ->scopeQuery(function ($query) use ($client_id) {
                $query = $query->where('client_id', $client_id);
                return $query;
            });

        if ($limit) {
            if ($limit == 'all') {
                return $dados->all();
            }
            return $dados->paginate($limit);
        } else {
            return $dados->paginate();
        }
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SocialMediaPost::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return SocialMediaPostValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
