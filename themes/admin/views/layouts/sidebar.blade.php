<nav aria-label="alternative nav" id="side_bar">
    <div class="bg-gray-800 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 content-center">

        <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                <li class="flex-1" x-data="{ open: false }" @mouseleave="open = false" class="relative">
                    <!-- Dropdown toggle button -->
                    
                    <a @mouseover="open = true" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500" ><em class="fas fa-tasks pr-0 md:pr-3"></em>Assignment's <svg class="w-6 h-6 text-white text-white-800" style="float: right;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg></a>
                    
                    <!-- Dropdown menu -->
                    <div x-show="open" class="absolute right-0 w-48 py-2 bg-gray-100 rounded-md shadow-xl">
                    <a href="{{ route('admin.addTask') }}" class="block px-4 py-2 text-sm text-gray-300 text-gray-700 hover:bg-gray-400 hover:text-white">
                        Add Task
                    </a>
                    <a href="{{route('admin.viewTask')}}" class="block px-4 py-2 text-sm text-gray-300 text-gray-700 hover:bg-gray-400 hover:text-white">
                        View Task
                    </a>
                    </div>
                </li>
                <li class="flex-1" x-data="{ open: false }" @mouseleave="open = false" class="relative">
                    <!-- Dropdown toggle button -->
                    
                    <a @mouseover="open = true" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-blue-500" ><i class="fab fa-product-hunt pr-0 md:pr-3"></i>Items <svg
                        class="w-6 h-6 text-white text-white-800" style="float: right;"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                        fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                        />
                    </svg></a>
                    
                    <!-- Dropdown menu -->
                    <div x-show="open" class="absolute right-0 w-48 py-2 bg-gray-100 rounded-md shadow-xl">
                    <a href="{{ route('admin.addItem') }}" class="block px-4 py-2 text-sm text-gray-300 text-gray-700 hover:bg-gray-400 hover:text-white">
                        Add Item
                    </a>
                    <a href="{{ route('admin.viewItem') }}" class="block px-4 py-2 text-sm text-gray-300 text-gray-700 hover:bg-gray-400 hover:text-white">
                        View Item
                    </a>
                    </div>
                </li>
                
                <li class="flex-1" x-data="{ open: false }" @mouseleave="open = false" class="relative">
                    <!-- Dropdown toggle button -->
                    
                    <a @mouseover="open = true" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500" ><em class="fa fa-users pr-0 md:pr-3"></em>Children's <svg class="w-6 h-6 text-white text-white-800" style="float: right;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/> </svg></a>
                    
                    <!-- Dropdown menu -->
                    <div x-show="open" class="absolute right-0 w-48 py-2 bg-gray-100 rounded-md shadow-xl">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-300 text-gray-700 hover:bg-gray-400 hover:text-white"> Add Children</a>
                    <a href="{{route('admin.viewChildren')}}" class="block px-4 py-2 text-sm text-gray-300 text-gray-700 hover:bg-gray-400 hover:text-white">
                        View Children
                    </a>
                    </div>
                </li>
                <li class="mr-3 flex-1">
                    <a href="#" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500">
                        <i class="fa fa-wallet pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Purchess</span>
                    </a>
                </li>
                
                
            </ul>
        </div>


    </div>
    
</nav>
<nav aria-label="alternative nav" id="bottom_bar">
    <div class="bg-gray-800 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 content-center">

        <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                <li class="mr-3 flex-1">
                    <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                        <i class="fas fa-tasks pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Tasks</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                        <i class="fab fa-product-hunt pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Items</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-blue-600">
                        <i class="fas fa-users pr-0 md:pr-3 text-blue-600"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Children's</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="#" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500">
                        <i class="fa fa-wallet pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Purchess</span>
                    </a>
                </li>
            </ul>
        </div>


    </div>
</nav>