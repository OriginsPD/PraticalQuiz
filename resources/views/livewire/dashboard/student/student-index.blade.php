<div>

    <x-table title="Schedule Information">
        <x-slot name="headerBtn">
        </x-slot>

        <x-slot name="head">

            <x-table.head> Course </x-table.head>
            <x-table.head> Day </x-table.head>
            <x-table.head> Class Time </x-table.head>
            <x-table.head></x-table.head>

        </x-slot>



        @forelse($Schedules as $Schedule)

            <x-table.row>

                <x-table.cell> {{ $Schedule->courseTeacher->course->course_nm }} </x-table.cell>

                <x-table.cell>

                    {{ $Schedule->day }}

                </x-table.cell>

                <x-table.cell>

                    {{ $Schedule->time }}

                </x-table.cell>

            </x-table.row>

        @empty



        @endforelse
    </x-table>


</div>
