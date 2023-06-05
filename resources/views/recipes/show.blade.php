<x-app-layout>

    <body class="antialiased">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 box-border bg-gray-900 rounded md:box-content">
                <!-- Heading -->
                <div class="py-5">
                    <h1 class="text-gray-200 text-2xl">{{$recipe->name}}</h1>
                    <h1 class="text-gray-200 text-lg">Created by {{$recipe->creator->name}}</h1>
                </div>

                <!-- Image -->
                <div
                    class="h-64 overflow-hidden">
                    <div class="p-2 grid grid-cols-5 gap-4">
                        <div class="col-span-5 h-60 relative">
                            <div
                                class="absolute top-0 left-0 w-full h-full bg-black opacity-50 transition-opacity duration-300">
                                <img src="/uploads/{{$recipe->photo}}" class="object-none w-full h-full">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="py-5">
                    <h1 class="text-gray-200 text-xl">Description</h1>
                    <p class="text-gray-200">{{$recipe->description}}</p>
                </div>

                <!-- Instructions -->
                <div class="py-5">
                    <h1 class="text-gray-200 text-xl">Instructions</h1>
                    <p class="text-gray-200">{{$recipe->instructions}}</p>
                </div>

                @auth()
                    @if(auth()->user()->can('edit recipe') && auth()->user()->id == $recipe->creator_id)
                        <!-- Actions -->
                        <div class="flex flex-row pb-5 pt-10">
                            <div class="pr-5">
                                <x-link-button href="{{route('recipes.edit', $recipe)}}"
                                               class="dark:bg-red-200 dark:hover:bg-red-300">Edit the recipe
                                </x-link-button>
                            </div>
                        </div>
                    @elseif(auth()->user()->hasRole('admin'))
                        <!-- Actions -->
                        <div class="flex flex-row pb-5 pt-5">
                            <form method="POST" action="{{route('recipes.destroy', $recipe)}}">
                                @method('DELETE')
                                @csrf
                                <div class="pr-5">
                                    <x-button class="dark:bg-red-200 dark:hover:bg-red-300" type="submit">Delete
                                    </x-button>
                                </div>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </body>

</x-app-layout>
