<div>

    <x-modal x-show="isOpen"  >

        <x-form wire:submit="createStudent"
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

            <x-input.label colspan="col-span-full"
                           for="user.email" label="Email Address">

                <x-input.text wire:model="user.email" type="email"
                              :error="$errors->first('user.email')" />

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

</div>
