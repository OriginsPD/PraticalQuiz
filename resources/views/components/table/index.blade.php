@props([
    'title' => false,
    'useBtn' => false,
])

<div class="xl:mb-0 px-4 mx-auto mt-12 w-11/12">

    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">

        <div class="rounded-t mb-0 px-4 py-3 border-0">

            <div class="flex flex-wrap items-center">

                <div class="relative w-full px-4 max-w-full flex-grow flex-1">

                    <h3 class="font-semibold text-base text-blueGray-700">

                        {{ $title }}

                    </h3>

                </div>

                {{ $headerBtn }}

            </div>

        </div>

        <div class="block w-full overflow-x-auto">

            <table class="items-center bg-transparent w-full border-collapse ">

                <thead>

                <tr>

                    {{ $head }}

                </tr>

                </thead>

                <tbody>

                    {{ $slot }}

                </tbody>

            </table>

        </div>

    </div>

</div>

