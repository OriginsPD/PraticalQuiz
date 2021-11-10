<div x-data="{ isOpen: false }"
    class="absolute w-full top-0 z-50">

    <div class="p-4 -mt-4 mx-auto max-w-screen-xl">

        <div class="flex items-center justify-between space-x-4 lg:space-x-10">

            <div class="flex  lg:w-0 lg:flex-1">

                <img class="w-20 h-20 bg-transparent fill text-white rounded-lg" src="https://cdn.freebiesupply.com/logos/large/2x/abc-01-logo-png-transparent.png"  alt="ABC"/>

            </div>


            <div class="items-center justify-end flex-1 hidden space-x-4 sm:flex">


                <a @click.prevent="isOpen=!isOpen"
                    class="px-5 py-2 text-sm font-medium text-white hover:underline "
                   href="#"> Sign up </a>

            </div>

        </div>

    </div>

    <div x-show="isOpen">

        @livewire('auth.register')

    </div>

</div>

