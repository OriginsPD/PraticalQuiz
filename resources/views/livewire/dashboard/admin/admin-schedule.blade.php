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
            <x-table.head> Day </x-table.head>
            <x-table.head> Class Time </x-table.head>
            <x-table.head></x-table.head>

        </x-slot>



        @forelse($Schedules as $Schedule)

            <x-table.row>

                <x-table.cell> {{ $Schedule->courseTeacher->teacher->name }} </x-table.cell>

                <x-table.cell> {{ $Schedule->courseTeacher->course->course_nm }} </x-table.cell>

                <x-table.cell>

                    {{ $Schedule->day }}

                </x-table.cell>

                <x-table.cell>

                    {{ $Schedule->time }}

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
                        <option value="{{ $offeredCourse->id }}"> {{ $offeredCourse->teacher->name }} - {{ $offeredCourse->course->course_nm  }} </option>
                    @empty
                        <option selected> No Course </option>
                    @endforelse

                </x-input.select>

            </x-input.label>

            <x-input.label for="Schedule.day" label="Day">

                <x-input.select wire:model="Schedule.day" type="day"
                                :error="$errors->first('Schedule.day')">

                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>

                </x-input.select>

            </x-input.label>

            <x-input.label for="Schedule.time" label="Class Time">

                <x-input.text wire:model="Schedule.time" type="time"
                              :error="$errors->first('Schedule.time')"/>

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
