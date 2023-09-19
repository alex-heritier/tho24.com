<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RouteMatcherCommand extends Command
{
    protected $signature = 'route:match {url}';

    protected $description = 'Find the route that matches the given URL';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $url = $this->argument('url');
        $request = Request::create($url, 'GET');
        $router = app('router');

        try {
            $matchedRoute = $router->getRoutes()->match($request);
            $action = $matchedRoute->getAction();

            if (isset($action['controller'])) {
                $this->info('Matched Controller and Action: '.$action['controller']);
            } else {
                $this->info('Matched Route, but no controller specified.');
            }
        } catch (NotFoundHttpException $e) {
            $this->error('No route matched.');
        } catch (MethodNotAllowedHttpException $e) {
            $this->error('Route found, but the method is not allowed.');
        }
    }
}
