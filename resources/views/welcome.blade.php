<x-app-layout>

    <body class="antialiased">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="p-6 lg:p-8 bg-gray-800 bg-opacity-98	 border-b border-gray-200 dark:border-gray-700  sm:rounded-lg">
                    <x-application-logo class="block h-12 w-auto"/>

                    @guest()
                        <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
                            Welcome!
                        </h1>
                    @endguest
                    @auth()
                        <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
                            Welcome, {{Auth::user()->name}}!
                        </h1>
                    @endauth

                    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
                        We know that cooking can sometimes feel like an enigmatic coding assignment, but fear not,
                        because LaraChef is
                        here to turn your culinary journey into a delightful and pun-filled adventure!
                    </p>
                    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
                        Prepare to dive headfirst into a world of Laravelicious recipes that will have you exclaiming,
                        "Hot damn, I'm a
                        chef!" Our app is designed with a sprinkle of humor and a dash of playful charm, because hey,
                        who says coding
                        and cooking can't be fun?
                    </p>
                    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
                        Whether you're a master of the command line or struggle with basic kitchen lingo, LaraChef will
                        be your trusty
                        sidekick. Think of it as your sous-chef, guiding you through the realms of culinary creativity
                        while keeping
                        your taste buds entertained.
                    </p>
                    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
                        With our Laravel-powered backend, you'll experience the magic of Dockerized recipes that are as
                        smooth as a
                        perfectly executed git push. Browse through our mouthwatering collection of dishes, all
                        carefully curated and
                        served with a side of puns that'll make you chuckle faster than an artisanal sourdough starter.
                    </p>
                    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
                        So, why wait? It's time to don your apron, fire up your imagination, and let LaraChef be your
                        compass in this
                        culinary odyssey. Get ready to whip up gastronomic masterpieces that would make even the most
                        seasoned Laravel
                        developer say, "I'm impressed, chef!"
                    </p>
                    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
                        Remember, in the kitchen and in coding, sometimes it's best to not take yourself too seriously.
                        So let's dive
                        in, have some laughs, and create dishes that will make your taste buds dance the fandango! Happy
                        cooking, and
                        may the code be with you!
                    </p>
                </div>


            </div>
        </div>
    </body>
</x-app-layout>
