<?php

namespace AgenciaS3\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(\AgenciaS3\Repositories\UserRepository::class, \AgenciaS3\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\UserPasswordRepository::class, \AgenciaS3\Repositories\UserPasswordRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\UserRoleRepository::class, \AgenciaS3\Repositories\UserRoleRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\TypeClientRepository::class, \AgenciaS3\Repositories\TypeClientRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\SegmentClientRepository::class, \AgenciaS3\Repositories\SegmentClientRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\ClientRepository::class, \AgenciaS3\Repositories\ClientRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\StateRepository::class, \AgenciaS3\Repositories\StateRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\CityRepository::class, \AgenciaS3\Repositories\CityRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\ClientDomainRepository::class, \AgenciaS3\Repositories\ClientDomainRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\ClientDomainTextRepository::class, \AgenciaS3\Repositories\ClientDomainTextRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\StateRepository::class, \AgenciaS3\Repositories\StateRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\StateRepository::class, \AgenciaS3\Repositories\StateRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\ClientContactRepository::class, \AgenciaS3\Repositories\ClientContactRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\SectorRepository::class, \AgenciaS3\Repositories\SectorRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\UserSectorRepository::class, \AgenciaS3\Repositories\UserSectorRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\ServiceRepository::class, \AgenciaS3\Repositories\ServiceRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\ClientServiceRepository::class, \AgenciaS3\Repositories\ClientServiceRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\DemandRepository::class, \AgenciaS3\Repositories\DemandRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\ClientUserRepository::class, \AgenciaS3\Repositories\ClientUserRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\SocialMediaStatusRepository::class, \AgenciaS3\Repositories\SocialMediaStatusRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\SocialMediaPostRepository::class, \AgenciaS3\Repositories\SocialMediaPostRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\SocialMediaPostServiceRepository::class, \AgenciaS3\Repositories\SocialMediaPostServiceRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\TypeServiceRepository::class, \AgenciaS3\Repositories\TypeServiceRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\UserManagerRepository::class, \AgenciaS3\Repositories\UserManagerRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\ScheduleRepository::class, \AgenciaS3\Repositories\ScheduleRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\ScheduleUserRepository::class, \AgenciaS3\Repositories\ScheduleUserRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\TaskActionRepository::class, \AgenciaS3\Repositories\TaskActionRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\TaskPriorityRepository::class, \AgenciaS3\Repositories\TaskPriorityRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\TaskProjectTemplateRepository::class, \AgenciaS3\Repositories\TaskProjectTemplateRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\TaskProjectRepository::class, \AgenciaS3\Repositories\TaskProjectRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\TaskRepository::class, \AgenciaS3\Repositories\TaskRepositoryEloquent::class);
        $this->app->bind(\AgenciaS3\Repositories\TaskUserRepository::class, \AgenciaS3\Repositories\TaskUserRepositoryEloquent::class);
        //:end-bindings:
    }
}
