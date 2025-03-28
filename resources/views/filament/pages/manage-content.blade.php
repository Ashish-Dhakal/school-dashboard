@php
    use App\Models\Content;
    use App\Models\PostType;
    use Filament\Support\Facades\FilamentAsset;
    use Filament\Support\Facades\FilamentIcon;

    $postTypes = PostType::withCount('contents')->get();
    $totalContent = Content::count();
    $recentContent = Content::with(['postType', 'gallery'])->latest()->take(5)->get();
@endphp

<x-filament-panels::page>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
        <x-filament::section>
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-medium">Total Content</h2>
                <p class="text-3xl font-bold text-primary-600">{{ $totalContent }}</p>
            </div>
        </x-filament::section>

        @foreach($postTypes as $type)
            <x-filament::section>
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-medium">{{ ucfirst($type->name) }}</h2>
                    <p class="text-3xl font-bold text-primary-600">{{ $type->contents_count }}</p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('filament.admin.resources.contents.create', ['post_type' => $type->slug]) }}" 
                       class="filament-button filament-button-size-sm inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2rem] px-3 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700">
                        <x-icon name="heroicon-s-plus-circle" class="w-4 h-4"/>
                        Create New {{ ucfirst($type->name) }}
                    </a>
                </div>
            </x-filament::section>
        @endforeach
    </div>

    <x-filament::section class="mt-8">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-medium">Recent Content</h2>
            <a href="{{ route('filament.admin.resources.contents.index') }}" 
               class="filament-button filament-button-size-sm inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2rem] px-3 text-sm text-gray-800 bg-white border-gray-300 hover:bg-gray-50 focus:ring-primary-600">
                View All
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left rtl:text-right divide-y table-auto">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Type</th>
                        <th class="px-4 py-2">Gallery</th>
                        <th class="px-4 py-2">Created</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($recentContent as $content)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $content->title }}</td>
                            {{-- <td class="px-4 py-2">{{ ucfirst($content->postType->) }}</td> --}}
                            <td class="px-4 py-2">{{ $content->gallery?->gallery_name ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $content->created_at->diffForHumans() }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('filament.admin.resources.contents.edit', $content) }}" 
                                   class="filament-button filament-button-size-sm inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2rem] px-3 text-sm text-gray-800 bg-white border-gray-300 hover:bg-gray-50 focus:ring-primary-600">
                                    <x-icon name="heroicon-s-pencil" class="w-4 h-4"/>
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-filament::section>
</x-filament-panels::page> 