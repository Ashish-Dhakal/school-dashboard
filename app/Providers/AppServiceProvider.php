<?php

namespace App\Providers;

use App\Models\PostType;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(Dispatcher $events): void
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {

            $pinnedPostTypes = PostType::where('is_pinned', true)->get();
            
            $routeMap = [
                'program' => 'program.index',
                'about-us' => 'about.index',
                'event' => 'event.index',
                'notice' => 'notice.index',
            ];

            // Define a mapping of post types to icons
            $icons = [
                'program' => 'fas fa-calendar-week',
                'about-us' => 'fas fa-info-circle',
                'event' => 'fas fa-calendar-alt',
                'notice' => 'fas fa-bell',
            ];

            foreach ($pinnedPostTypes as $postType) {

                $routeName = $routeMap[$postType->slug] ?? null;
                $icon = $icons[$postType->slug] ?? 'fas fa-book';


                if ($routeName) {
                    $event->menu->add([
                        'text' => $postType->name,
                        'route' => $routeName,
                        'parameters' => [$postType->slug],
                        'icon' => $icon,
                    ]);
                }
            }
        });
    }
}
