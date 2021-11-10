<div class="w-5/12 ">

    <x-form wire:submit.prevent="authUser" grid="">

        <x-slot name="title">

            <h1 class="w-full text-center text-4xl
                    font-extrabold text-blue-600">Login</h1>

        </x-slot>

        <x-input.label for="user.email" label="Email">

            <x-input.text wire:model="user.email"
                          :error="$errors->first('user.email')"/>

        </x-input.label>

        <x-input.label for="password" label="Password">

            <x-input.text wire:model="password" type="password"
                          :error="$errors->first('password')"/>

        </x-input.label>

        <x-input.submit color="blue">

            Login

        </x-input.submit>

    </x-form>

</div>
