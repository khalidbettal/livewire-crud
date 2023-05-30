
<nav class="border-b bg-purple-600 mx-12"
>
    <div x-data="{showMenu : false,
    dropDown : false
}" class="container max-w-screen-lg mx-auto flex justify-between h-14"

>
        <!-- Brand-->
        <a href="#" class="flex items-center cursor-pointer hover:bg-purple-800 px-2 ml-3">
            <!-- Logo-->
            <div class="rounded bg-red-400 text-white font-bold w-10 h-10 flex justify-center text-3xl pt-0.5">K</div>
            <div class="text-white text-xl font-serif ml-2">halid bettal</div>
        </a>
        <!-- Navbar Toggle Button -->
        <button @click="showMenu = !showMenu" 
        class=" md:hidden text-gray-700 p-2 rounded hover:border focus:border focus:bg-gray-100 my-2 mr-5" type="button" aria-controls="navbar-main" aria-expanded="false" aria-label="Toggle navigation">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
        <!-- Nav Links-->
        <ul 
        class="md:flex text-gray-700 text-base mr-3 origin-top "
        x-transition
        :class="{ 'block absolute top-14  border-b bg-white w-full py-6 ': showMenu, 'hidden': !showMenu}"
        x-on:mouseleave="timeout = setTimeout(() => { showMenu = false }, 500)"
        id="navbar-main" x-cloak>
            <li class="px-3 cursor-pointer font-semibold hover:bg-purple-800  flex items-center" :class="showMenu && 'py-4 border-b '">
                <a href="/" class="md:text-white ">Home</a>
            </li>
            {{--  --}}
            @guest
                
            <li class="px-3 cursor-pointer font-semibold hover:bg-purple-800 flex items-center" :class="showMenu && 'py-4 border-b'">
                <a href="/login" class="md:text-white">login</a>
            </li>
            <li class="px-3 cursor-pointer font-semibold hover:bg-purple-800 flex items-center " :class="showMenu && 'py-4 border-b'">
                <a href="/register" class="md:text-white">Register</a>
            </li>
            @endguest
            {{--  --}}
            @auth
               <livewire:lougout  />   
            @endauth
            {{--  --}}
    <li x-on:mouseenter="dropDown = true; clearTimeout(timeout)"
         x-on:mouseleave="timeout = setTimeout(() => { dropDown = false }, 500)"
         class="px-3 cursor-pointer font-semibold hover:bg-purple-800 flex items-center  relative" 
          :class="showMenu && 'py-1'">
             <a href="#" class="md:text-white">About</a>
             <svg :class="dropDown && 'rotate-180'" 
             class="w-4 h-4 ml-2" aria-hidden="true" fill="none" 
             stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path 
             stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
<section 
      class=" border z-10  bg-white divide-y divide-gray-100 rounded-lg shadow md:w-44 dark:bg-gray-700 absolute md:top-14 md:-right-10 left-0"
       :class="dropDown ? ' top-11 w-52' : 'hidden'">
    <a href="#" class=" border-b text-gray-700 block px-4 py-2 text-sm hover:bg-purple-300" 
    role="menuitem" tabindex="-1" id="menu-item-0">Account settings</a>
    <a href="#" class="border-b text-gray-700 block px-4 py-2 text-sm hover:bg-purple-300" 
    role="menuitem" tabindex="-1" id="menu-item-1">Support</a>
    <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-purple-300" 
    role="menuitem" tabindex="-1" id="menu-item-2">License</a>
</section>
</li>
        </ul>
    </div>
</nav>