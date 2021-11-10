<div x-data="{ isOpen:false }"
     x-on:show-modal.window="isOpen = true"
     x-on:close-modal.window="isOpen = false">


    <x-table title="Schedule Teacher">
        <x-slot name="headerBtn">
        </x-slot>

        <x-slot name="head">

            <x-table.head> Course Assigned</x-table.head>
            <x-table.head> Day</x-table.head>
            <x-table.head> Class Time</x-table.head>
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

                <x-table.cell>

                    <x-table.button.action wire:click.prevent="viewStudents({{ $Schedule->courseTeacher->course_id }})">
                        View Students
                    </x-table.button.action>

                </x-table.cell>

            </x-table.row>

        @empty



        @endforelse
    </x-table>

    <x-modal x-show="isOpen">

        <div class="w-full" @click.away="isOpen = false">
            <x-table title="Student Information">
                <x-slot name="headerBtn">
                </x-slot>

                <x-slot name="head">

                    <x-table.head> Name</x-table.head>
                    <x-table.head> Class</x-table.head>
                    <x-table.head> Courses</x-table.head>

                </x-slot>


                @forelse($Students as $Student)

                    <x-table.row>

                        <x-table.cell> {{ ($Student->gender === 'Male') ? 'Mr.' : 'Ms.' }} {{ $Student->name }} </x-table.cell>

                        <x-table.cell> {{ $Student->class }} </x-table.cell>

                        <x-table.cell class="break-words">
                            {{ $Student->course->course_nm }}
                        </x-table.cell>

                    </x-table.row>

                @empty

                @endforelse
            </x-table>
        </div>

    </x-modal>

</div>
