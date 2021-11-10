<div x-data="{ isOpen:false }"
     x-on:show-modal.window="isOpen = true"
     x-on:close-modal.window="isOpen = false"
    class="flex-1 flex flex-col overflow-auto">

    <x-table title="Courses Information">
        <x-slot name="headerBtn">
            <x-table.button.top wire:click.prevent="addCourse">

                Add Courses

            </x-table.button.top>
        </x-slot>

        <x-slot name="head">

            <x-table.head> Courses </x-table.head>

            <x-table.head></x-table.head>

        </x-slot>



        @forelse($offeredCourses as $course)

            <x-table.row>

                <x-table.cell>{{ $course->course_nm }} </x-table.cell>

                <x-table.cell>

                    <x-table.button.action wire:click.prevent="editCourse({{ $course }})">
                        Edit
                    </x-table.button.action>

                </x-table.cell>

            </x-table.row>

        @empty

        @endforelse
    </x-table>



    <x-table title="Student Information">
        <x-slot name="headerBtn">

        </x-slot>

        <x-slot name="head">

            <x-table.head> Name</x-table.head>
            <x-table.head> Class </x-table.head>
            <x-table.head> Courses </x-table.head>


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



    <x-table title="Teacher Information">
        <x-slot name="headerBtn">

        </x-slot>

        <x-slot name="head">

            <x-table.head> Name</x-table.head>
            <x-table.head> Courses Assigned</x-table.head>

        </x-slot>
        @forelse($teachers as $teacher)

            <x-table.row>

                <x-table.cell> {{ ($teacher->gender === 'Male') ? 'Mr.' : 'Ms.' }} {{ $teacher->name }} </x-table.cell>

                <x-table.cell class="break-words">
                    @foreach($teacher->courseTeacher as $assigned)

                        {{ $assigned->course->course_nm }}

                    @endforeach
                </x-table.cell>

            </x-table.row>

        @empty

        @endforelse
    </x-table>


    <x-modal x-show="isOpen">

        <x-form wire:submit.prevent="{{ ($newCourse) ? 'createCourse' : 'alterCourse' }}"
                @click.away="isOpen = false"
                grid="2" class="w-10/12">
            <x-slot name="title">
                @if($newCourse)

                    <h1 class="text-2xl">Course Details</h1>
                @else
                    <h1 class="text-2xl"> Edit Course Details</h1>

                @endif

            </x-slot>

            <x-input.label for="Course.course_nm" label="Courses Name">

                <x-input.text wire:model="Course.course_nm" type="text"
                              :error="$errors->first('Course.course_nm')"/>

            </x-input.label>


            @if($newCourse)

                <x-input.submit color="blue">

                    Create

                </x-input.submit>


            @else


                <x-input.submit color="blue">

                    Save Changes

                </x-input.submit>


            @endif

        </x-form>


    </x-modal>


</div>
