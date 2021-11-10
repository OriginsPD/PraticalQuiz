<div x-data="{ isOpen:false }"
     x-on:show-modal.window="isOpen = true"
     x-on:close-modal.window="isOpen = false">

    <x-alerts :message="session('success')">
        <x-alerts.close />
    </x-alerts>

    <x-table title="Student Information">
        <x-slot name="headerBtn">

            <x-table.button.top wire:click.prevent="addStudent">

                Add Student

            </x-table.button.top>

        </x-slot>

        <x-slot name="head">

            <x-table.head> Name</x-table.head>
            <x-table.head> Class </x-table.head>
            <x-table.head> Courses </x-table.head>
            <x-table.head></x-table.head>

        </x-slot>



        @forelse($Students as $Student)

            <x-table.row>

                <x-table.cell> {{ ($Student->gender === 'Male') ? 'Mr.' : 'Ms.' }} {{ $Student->name }} </x-table.cell>

                <x-table.cell> {{ $Student->class }} </x-table.cell>

                <x-table.cell class="break-words">
                    {{ $Student->course->course_nm }}
                </x-table.cell>

                <x-table.cell>

                    <x-table.button.action wire:click.prevent="editStudent({{ $Student }})">
                        Edit
                    </x-table.button.action>

                </x-table.cell>

            </x-table.row>

        @empty

        @endforelse
    </x-table>


    <x-alerts :message="session('success')">

        <x-alerts.close/>
    </x-alerts>

    <x-modal x-show="isOpen">

        <x-form wire:submit.prevent="{{ ($newStudent) ? 'createStudent' : 'alterStudent' }}"
                @click.away="isOpen = false"
                grid="2" class="w-10/12">
            <x-slot name="title">
                @if($newStudent)

                    <h1 class="text-2xl">Student Details</h1>
                @else
                    <h1 class="text-2xl"> Edit Student Details</h1>

                @endif

            </x-slot>

            <x-input.label for="Student.name" label="Username">

                <x-input.text wire:model="Student.name" type="text"
                              :error="$errors->first('Student.name')"/>

            </x-input.label>

            <x-input.label for="Student.gender" label="Gender">

                <x-input.select wire:model="Student.gender" type="text"
                                :error="$errors->first('Student.gender')">

                    <option value="Male"> Male</option>
                    <option value="Female"> Female</option>

                </x-input.select>

            </x-input.label>

            <x-input.label for="Student.dob" label="Date of Birth">

                <x-input.text wire:model="Student.dob" type="date"
                              :error="$errors->first('Student.dob')"/>

            </x-input.label>

            <x-input.label for="Student.class" label="Class">

                <x-input.select wire:model="Student.class" type="text"
                                :error="$errors->first('Student.class')">

                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="A3">A3</option>
                    <option value="A4">A4</option>
                    <option value="A5">A5</option>
                    <option value="A6">A6</option>
                    <option value="A7">A7</option>
                    <option value="A8">A8</option>
                    <option value="A9">A9</option>
                    <option value="A10">A10</option>

                </x-input.select>

            </x-input.label>

            <x-input.label for="courses" label="{{ ($newStudent ? 'Select Students Course' : 'Select New Course') }}">

                <x-input.select wire:model="courses"
                                :error="$errors->first('courses')" >

                    @forelse($offeredCourses as $offeredCourse)
                        <option value="{{ $offeredCourse->id }}"> {{ $offeredCourse->course_nm }} </option>
                    @empty
                        <option selected> No Course </option>
                    @endforelse

                </x-input.select>

            </x-input.label>

            @if($newStudent)

                <x-input.label for="user.email" label="Email">

                    <x-input.text wire:model="user.email" type="email"
                                  :error="$errors->first('Student.dob')"/>

                </x-input.label>

                <x-input.label for="password" label="password">

                    <x-input.text wire:model="password" readonly type="text"
                                  :error="$errors->first('password')"/>

                </x-input.label>

            @endif


            @if($newStudent)

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
