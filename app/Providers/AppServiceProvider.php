<?php

namespace App\Providers;

use App\Models\PostType; // Import the PostType model
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
        // Fetch and add pinned post types to the sidebar
        $pinnedPostTypes = PostType::where('is_pinned', true)->get();

        foreach ($pinnedPostTypes as $postType) {
            // Define a mapping of program types to routes
            $routeMap = [
                'type1' => 'program.type1.index', // Replace with your actual route names
                'type2' => 'program.type2.index',
                'type3' => 'program.type3.index',
                // Add more mappings as needed
            ];

            // Determine the route based on the program type
            $routeName = $routeMap[$postType->program_type] ?? 'program.index'; // Fallback route

            $event->menu->add([
                'text' => $postType->name,
                'route' => $routeName,
                'parameters' => [$postType->slug], // Pass the slug as a parameter
                'icon' => 'fas fa-book', // Use an appropriate icon if needed
            ]);
        }
    });
}

}
