<x-admin-layout>
    <nav aria-label="breadcrumb">
        <ol class="flex w-full flex-wrap items-center rounded-md bg-blue-gray-50 bg-opacity-60 py-2 ">
          <li class="flex cursor-pointer items-center font-sans text-sm font-normal leading-normal text-gray-800 antialiased transition-colors duration-300 hover:text-pink-500">
            <a class="opacity-60" href="#">
              <span>Gebruikers</span>
            </a>
            <span class="pointer-events-none mx-2 select-none font-sans text-sm font-normal leading-normal text-blue-gray-500 antialiased">
              /
            </span>
          </li>
          <li class="flex cursor-pointer items-center font-sans text-sm font-normal leading-normal text-gray-200 antialiased transition-colors duration-300 hover:text-pink-500">
            <a
              class="font-medium text-blue-500 transition-colors hover:text-pink-500"
              href="#"
            >
              Lijst
            </a>
          </li>
        </ol>
      </nav>
    <div class="flex pb-8">
        <div class="mb-4">
            <span class="text-2xl text-black font-bold leading-none sm:text-3xl">Gebruikers</span>
            <h3 class="text-base font-normal text-[#328fff]">Overzicht van alle gebruikers</h3>
        </div>
    
        <div class="flex items-center mt-4 gap-x-3 ml-auto"> 
            <a href="/gebruikers/toevoegen" class="flex font-semibold text-lg items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-[#328fff] rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-800 dark:hover:bg-blue-500 dark:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
    
                <span>Toevoegen</span>
            </a>
        </div>
    </div>

    <livewire:lw-users/>

</x-admin-layout>