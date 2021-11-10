<div x-data="{ isOpen:false }"
     x-on:show-modal.window="isOpen = true"
     x-on:close-modal.window="isOpen = false">

    <x-alerts      x-on:show-alert.window="isAlert = false; setTimeout(() => { isAlert = false },2500)"
                   :message="session('success')">
        <x-alerts.close />
    </x-alerts>

    <x-table title="Teacher Information">
        <x-slot name="headerBtn">

            <x-table.button.top wire:click.prevent="addTeacher">

                Add Teacher

            </x-table.button.top>

        </x-slot>

        <x-slot name="head">

            <x-table.head> Name</x-table.head>
            <x-table.head> Courses Assigned</x-table.head>
            <x-table.head></x-table.head>

        </x-slot>
        @forelse($teachers as $teacher)

            <x-table.row>

                <x-table.cell> {{ ($teacher->gender === 'Male') ? 'Mr.' : 'Ms.' }} {{ $teacher->name }} </x-table.cell>

                <x-table.cell class="break-words">
                    @foreach($teacher->courseTeacher as $assigned)

                        {{ $assigned->course->course_nm }}

                    @endforeach
                </x-table.cell>

                <x-table.cell>

                    <x-table.button.action wire:click.prevent="editTeacher({{ $teacher }})">
                        Edit
                    </x-table.button.action>

                </x-table.cell>

            </x-table.row>

        @empty

        @endforelse
    </x-table>


    <x-modal x-show="isOpen">

        <x-form wire:submit.prevent="{{ ($newTeacher) ? 'createTeacher' : 'alterTeacher' }}"
                @click.away="isOpen = false"
                grid="2" class="w-10/12">
            <x-slot name="title">
                @if($newTeacher)

                    <h1 class="text-2xl">Teacher Details</h1>
                @else
                    <h1 class="text-2xl"> Edit Teacher Details</h1>

                @endif

            </x-slot>

            <x-input.label for="teacher.name" label="Username">

                <x-input.text wire:model="teacher.name" type="text"
                              :error="$errors->first('teacher.name')"/>

            </x-input.label>

            <x-input.label for="teacher.gender" label="Gender">

                <x-input.select wire:model="teacher.gender" type="text"
                                :error="$errors->first('teacher.gender')">

                    <option value="Male"> Male</option>
                    <option value="Female"> Female</option>

                </x-input.select>

            </x-input.label>

            <x-input.label for="teacher.dob" label="Date of Birth">

                <x-input.text wire:model="teacher.dob" type="date"
                              :error="$errors->first('teacher.dob')"/>

            </x-input.label>

            <x-input.label for="courses" label="{{ ($newTeacher ? 'Select Teachers Courses' : 'Select New Courses') }}">

                <x-input.select wire:model="courses"
                                :error="$errors->first('courses')" multiple>

                    @forelse($offeredCourses as $offeredCourse)
                        <option value="{{ $offeredCourse->id }}"> {{ $offeredCourse->course_nm }} </option>
                    @empty
                        <option selected> No Courese </option>
                    @endforelse

                </x-input.select>

            </x-input.label>

            @if($newTeacher)

            <x-input.label for="user.email" label="Email">

                <x-input.text wire:model="user.email" type="email"
                              :error="$errors->first('teacher.dob')"/>

            </x-input.label>

            <x-input.label for="password" label="password">

                <x-input.text wire:model="password" readonly type="text"
                              :error="$errors->first('password')"/>

            </x-input.label>

            @endif


            @if($newTeacher)

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
