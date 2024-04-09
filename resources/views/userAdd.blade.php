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
              Toevoegen
            </a>
          </li>
        </ol>
      </nav>
    <div class="flex pb-8">
        <div class="mb-4">
            <span class="text-2xl text-black font-bold leading-none sm:text-3xl">Gebruikers</span>
            <h3 class="text-base font-normal text-[#328fff]">Een nieuwe gebruiker toevoegen</h3>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg">
        <form action="/gebruikers/toevoegen" method="POST">
           @csrf
           <div class="grid gap-6 mb-6 md:grid-cols-3">
               <div>
                   <label for="name" class="block mb-2 text-sm font-medium text-gray-800">Name <span class="text-red-500">*</span></label>
                   <input type="text" name="name" id="name" class="bg-white border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-none" placeholder="Name" required>
               </div>
               <div>
                   <label for="email" class="block mb-2 text-sm font-medium text-gray-800">Email <span class="text-red-500">*</span></label>
                   <input type="email" name="email" id="email" class="bg-white border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-none" placeholder="Email" required>
               </div>
               <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-800">Wachtwoord <span class="text-red-500">*</span></label>
                <input type="password" name="password" id="password" class="bg-white border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-none" placeholder="Wachtwoord" required>
                </div>
           </div>
       
           <button type="submit" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 focus:outline-none">Save</button>
       </form>
    </div>
    </x-admin-layout>