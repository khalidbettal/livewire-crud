
<div class=" my-10 flex max-md:my-16  justify-center md:w-full">
    <section class="border rounded shadow-lg p-4 max-md:w-screen md:w-10/12 bg-gray-200">
        <h1 class="text-center text-3xl my-5">SignUp to Get Started</h1>
        <hr>
        <form class="my-4" wire:submit.prevent="submit">
            <div class="flex justify-around max-md:my-3 md:my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="name" class="p-2 rounded border shadow-sm w-full" wire:model="form.name"
                        placeholder="Name" />
                    @error('form.name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex justify-around max-md:my-3 md:my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="email" class="p-2 rounded border shadow-sm w-full" placeholder="Email"
                        wire:model="form.email" />
                    @error('form.email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex justify-around max-md:my-3 md:my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="password" class="p-2 rounded border shadow-sm w-full" placeholder="Password"
                        wire:model="form.password" />
                    @error('form.password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex justify-around max-md:my-3 md:my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="passsword" class="p-2 rounded border shadow-sm w-full" placeholder="Confirm Password"
                        wire:model="form.password_confirmation" />
                        @error('form.password_confirmation') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex justify-around max-md:my-3 md:my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="submit" value="Register"
                        class="p-2 bg-gray-800 text-white w-full rounded tracking-wider cursor-pointer" />
                </div>
            </div>
        </form>
    </section>
</div>

