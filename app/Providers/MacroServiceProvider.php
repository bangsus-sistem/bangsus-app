<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use App\Macro\Kernel;
use App\Contracts\Macro\Database\BlueprintContract;
use LogicException;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerDatabaseMacro();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register database macro.
     * 
     * @return void
     */
    private function registerDatabaseMacro()
    {
        $this->registerBlueprintMacro();
    }

    /**
     * Register blueprint macro.
     * 
     * @return void
     */
    private function registerBlueprintMacro()
    {
        if (config('macro.blueprint.register')) {
            $blueprints = Kernel::$database['blueprints'];
            
            foreach ($blueprints as $methodName => $blueprint) {
                if ( ! (new $blueprint) instanceof BlueprintContract)
                    throw new LogicException(
                        'Blueprint :'.$blueprint.' must implements '.BlueprintContract::class
                    );

                Blueprint::macro(
                    $methodName,
                    call_user_func([
                        $blueprint,
                        BlueprintContract::MAIN_METHOD
                    ])
                );
            }
        }
    }
}
