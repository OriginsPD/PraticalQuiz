<div x-data="{ isOpen:false }"
     x-on:show-modal.window="isOpen = true"
     x-on:close-modal.window="isOpen = false">

    <x-alerts      x-on:show-alert.window="isAlert = false; setTimeout(() => { isAlert = false },2500)"
                   :message="session('success')">
        <x-alerts.close />
    </x-alerts>

    <x-table title="Schedule Information">
        <x-slot name="headerBtn">

            <x-table.button.top wire:click.prevent="addSchedule">

                Add Schedule

            </x-table.button.top>

        </x-slot>

        <x-slot name="head">

            <x-table.head> Teacher </x-table.head>
            <x-table.head> Course </x-table.head>
            <x-table.head> Start Date </x-table.head>
            <x-table.head> End Date </x-table.head>
            <x-table.head></x-table.head>

        </x-slot>



        @forelse($Schedules as $Schedule)

            <x-table.row>

                <x-table.cell> {{ $Schedule->courseTeacher->teacher->name }} </x-table.cell>

                <x-table.cell> {{ $Schedule->courseTeacher->course->course_nm }} </x-table.cell>

                <x-table.cell>

                    {{ $Schedule->start_time }}

                </x-table.cell>

                <x-table.cell>

                    {{ $Schedule->end_time }}

                </x-table.cell>

                <x-table.cell>

                    <x-table.button.action wire:click.prevent="editSchedule({{ $Schedule }})">
                        Edit
                    </x-table.button.action>

                </x-table.cell>

            </x-table.row>

        @empty



        @endforelse
    </x-table>


    <x-modal x-show="isOpen">

        <x-form wire:submit.prevent="{{ ($newSchedule) ? 'createSchedule' : 'alterSchedule' }}"
                @click.away="isOpen = false"
                grid="2" class="w-10/12">
            <x-slot name="title">
                @if($newSchedule)

                    <h1 class="text-2xl">Schedule Details</h1>
                @else
                    <h1 class="text-2xl"> Edit Schedule Details</h1>

                @endif

            </x-slot>

            <x-input.label for="courses" label="{{ ($newSchedule ? 'Select Schedules Courses' : 'Select New Courses') }}">

                <x-input.select wire:model="Schedule.course_teacher_id"
                                :error="$errors->first('Schedule.course_teacher_id')" >

                    @forelse($offeredCourses as $offeredCourse)
                        <option value="{{ $offeredCourse->id }}"> {{ $offeredCourse->course->course_nm }} </option>
                    @empty
                        <option selected> No Course </option>
                    @endforelse

                </x-input.select>

            </x-input.label>

            <x-input.label for="Schedule.start" label="Start Time">

                <x-input.text wire:model="Schedule.start" type="date"
                              :error="$errors->first('Schedule.start')"/>

            </x-input.label>

            <x-input.label for="Schedule.end" label="End Time">

                <x-input.text wire:model="Schedule.end" type="date"
                              :error="$errors->first('Schedule.end')"/>

            </x-input.label>


            @if($newSchedule)

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
