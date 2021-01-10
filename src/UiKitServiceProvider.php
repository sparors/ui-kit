<?php

namespace Sparors\UiKit;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class UiKitServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ui-kit');
        $this->bootBladeComponents();
        $this->bootDirectives();
    }

    public function register()
    {
        
    }

    private function bootBladeComponents()
    {
        $this->callAfterResolving(BladeCompiler::class, function () {
            foreach(
                [
                    'alert', 'auth-card', 'badge', 'button', 'card', 'checkbox',
                    'container', 'dropdown', 'error', 'file', 'form-button',
                    'form', 'input', 'item', 'label', 'menu-item', 'navbar',
                    'password', 'radio', 'select', 'switch', 'table', 'td',
                    'textarea', 'th',
                ]
                as
                $name
            ) {
                Blade::component("ui-kit::components.{$name}", "ui-{$name}");
            }
        });
    }

    private function bootDirectives()
    {
        Blade::directive('uiKitAssets', function () {
            return "<?php echo Sparors\\UiKit\\UiKit::outputAssets(); ?>";
        });
    }
}
