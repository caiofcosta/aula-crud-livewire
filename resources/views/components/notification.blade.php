<div x-data="{show: true}" x-show="show">
    <div x-show="show" class="w-full flex bg-teal-300 rounded-lg my-2 p-2 text-brack font-bold">
        <span class="w-full text-center">
            {{ $slot }}
        </span>
        <button class="hover:bg-red-200 rounded-lg" @click="show=false">
            <x-zondicon-close-solid class="w-7 h-7 text-red-500" />
        </button>
    </div>
</div>
