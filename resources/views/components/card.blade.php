<div
    class="box-border bg-gray-900 rounded md:box-content h-56 overflow-hidden transition-all duration-300 transform hover:scale-105">
    <div class="p-2 grid grid-cols-5 gap-4">
        <div class="col-span-3 h-52 relative">
            <div class="absolute top-0 left-0 w-full h-full bg-black opacity-50 transition-opacity duration-300">
                <img src="{{$imagePath}}" class="object-none w-full h-full">
            </div>
        </div>
        <div class="col-span-2 p-3">
            <p class="text-2xl text-gray-200">{{$title}}</p>
            <div class="border-b border-gray-300 my-2"></div>
            <p class="text-m text-gray-200">{{$description}}</p>
        </div>
    </div>
</div>
