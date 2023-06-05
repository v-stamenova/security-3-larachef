<x-app-layout>

    <body class="antialiased">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="p-6 lg:p-8 bg-gray-800 bg-opacity-98	 border-b border-gray-200 dark:border-gray-700  sm:rounded-lg">
                    <div class="flex justify-between">
                        <div>
                            <h1 class="text-8xl text-gray-200 pb-5">Recipes</h1>
                        </div>
                        <div class="flex items-center">
                            @can('create recipe')
                                <x-link-button href="{{route('recipes.create')}}">Add a new recipe</x-link-button>
                            @endcan
                        </div>
                    </div>

                    <div>
                        @foreach($recipes as $recipe)
                            <a href="{{route('recipes.show', $recipe)}}">
                                <div class="py-3">
                                    <x-card :title="$recipe->name"
                                            :imagePath="'/uploads/' . $recipe->photo"
                                            :description="$recipe->description"></x-card>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>

</x-app-layout>
