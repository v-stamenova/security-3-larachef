<x-app-layout>

    <body class="antialiased">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="p-6 lg:p-8 bg-gray-800 bg-opacity-98	 border-b border-gray-200 dark:border-gray-700  sm:rounded-lg">
                    <div class="flex justify-between">
                        <div>
                            <h1 class="text-3xl text-gray-200 pb-5">Add a new recipe</h1>
                        </div>
                    </div>

                    <div>
                        <x-validation-errors class="mb-4"/>

                        <form method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Name -->
                            <div class="pt-5">
                                <x-label for="name" value="{{ __('Name') }}"/>
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                         :value="old('name')" required autofocus/>
                                <x-input-error for="name"></x-input-error>
                            </div>

                            <!-- Short Description -->
                            <div class="pt-5">
                                <x-label for="description" value="{{ __('Description') }}"/>
                                <x-input id="description" class="block mt-1 w-full" type="text" name="description"
                                         :value="old('description')"/>
                                <x-input-error for="description"></x-input-error>
                            </div>

                            <!-- Instructions -->
                            <div class="pt-5">
                                <x-label for="instructions" value="{{ __('Instructions') }}"/>
                                <x-textarea id="instructions" class="block mt-1 w-full h-52" type="" name="instructions"
                                            :value="old('instructions')"/>
                                <x-input-error for="instructions"></x-input-error>
                            </div>

                            <!-- Cover photo -->
                            <div class="pt-5">
                                <x-label for="photo" value="{{ __('Cover Image') }}"/>
                                <input type="file" name="photo">
                                <x-input-error for="photo"></x-input-error>
                            </div>

                            <!-- Actions -->
                            <div class="flex flex-row pb-5 pt-10">
                                <div class="pr-5">
                                    <x-button class="dark:bg-green-200 dark:hover:bg-green-300" submit>Save</x-button>
                                </div>
                                <div>
                                    <a href="{{route('recipes.index')}}">
                                        <x-link-button href="{{route('recipes.index')}}">Cancel</x-link-button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

</x-app-layout>
