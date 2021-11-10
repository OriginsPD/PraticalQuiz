
    <x-modal>

        <x-form wire:submit.prevent="createStudent"
                @click.away="isOpen = false"
            grid="3" class="w-9/12">

            <x-slot name="title">
                Register
            </x-slot>

            <x-input.label for="user.username" label="Username">

                <x-input.text wire:model="user.username" type="text"
                              :error="$errors->first('user.username')" />

            </x-input.label>

            <x-input.label for="user.dob" label="Date Of Birth">

                <x-input.text wire:model="user.dob" type="date"
                              :error="$errors->first('user.dob')" />

            </x-input.label>

            <x-input.label for="user.gender" label="Please Select Your Gender">

                <x-input.select wire:model="user.gender"
                                :error="$errors->first('user.gender')" >

                    <option value="Male"> Male </option>
                    <option value="female"> Female </option>

                </x-input.select>

            </x-input.label >

            <x-input.label
                           for="user.email" label="Email Address">

                <x-input.text wire:model="user.email" type="email"
                              :error="$errors->first('user.email')" />

            </x-input.label>

            <x-input.label for="class" label="Choose Class">

                <x-input.select wire:model="class" type="text"
                                :error="$errors->first('class')">

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

            <x-input.label for="courses" label="Available Courses">

                <x-input.select wire:model="courses"
                                :error="$errors->first('courses')" >

                    @forelse($offeredCourses as $offeredCourse)
                        <option value="{{ $offeredCourse->id }}"> {{ $offeredCourse->course_nm }} </option>
                    @empty
                        <option selected> No Course </option>
                    @endforelse

                </x-input.select>

            </x-input.label>

            <x-input.label for="password" label="Create A Unique Password">

                <x-input.text wire:model="password" type="password"
                              :error="$errors->first('password')" />

            </x-input.label>

            <x-input.label for="password_confirmation" label="Confirm Password">

                <x-input.text wire:model="password_confirmation" type="password"
                              :error="$errors->first('password_confirmation')" />

            </x-input.label>

            <x-input.submit color="blue">

                Register Now

            </x-input.submit>


        </x-form>

    </x-modal>


