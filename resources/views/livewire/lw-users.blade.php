<div class="mx-auto">
    <div class="p-4 bg-white rounded-t-lg justify-between items-center">
        
        <div class="sm:flex sm:items-center sm:justify-between">
            <div class="flex items-center ">
                <div class='flex items-center justify-center'>
                  <nav class="hidden space-x-10 md:flex">
                     <div class="relative" x-data="{ open: false }">
                      <button @click="open = !open" type="button" class="text-md font-semibold flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-gray-800 hover:bg-gray-300 border transition-colors duration-200 rounded-lg sm:w-auto gap-x-2" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: currentColor;"><path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 12c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg>
                        <span>Bulk Actie</span>
                      </button>
              
                      <div 
                          x-show="open" 
                          x-transition:enter="transition ease-out duration-200"
                          x-transition:enter-start="opacity-0 scale-90"
                          x-transition:enter-end="opacity-100 scale-100"
                          x-transition:leave="transition ease-in duration-200"
                          x-transition:leave-start="opacity-100 scale-100"
                          x-transition:leave-end="opacity-0 scale-90"
                          class="absolute left-1/2 z-50 mt-3 -translate-x-1/2 transform px-2 sm:px-0">
              
                          <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                          <div class="relative grid bg-white p-4">
                              <button wire:click="userDelete" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
                              
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" style="fill: red;"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path></svg>                              
                              <div class="ml-2">
                                  <p class="text-sm text-red-500">Verwijderen</p>
                              </div>
                            </button>
                          </div>
                          </div>
                      </div>
                     </div>
                  </nav>
              </div>
            </div>
  
            <div>
                <div class="flex items-center gap-x-3">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search" wire:model.live.debounce="search" class="bg-gray-100 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5" placeholder="Search for items">
                    </div>
                    <div class="flex pl-0 mt-3 space-x-1 sm:pl-2 sm:mt-0">
                        <a href="#" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" style="fill: currentColor;"><path d="M13 20v-4.586L20.414 8c.375-.375.586-.884.586-1.415V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v2.585c0 .531.211 1.04.586 1.415L11 15.414V22l2-2z"></path></svg>                        
                        </a>
                    </div>
  
                </div>
            </div>
    
        </div>
  
    </div>
    
    @if (!empty($check))
    <div class="bg-white border-t border-blue-500 py-2">
        <span class="ml-4 text-md text-blue-500">{{ count($check) }} record(s) geselecteerd</span>
    </div>
    @endif
  
    <div class="relative overflow-x-auto shadow-md rounded-b-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 border-b border-blue-500 uppercase bg-white">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-gray-800">
                        Naam
                    </th>
                    <th scope="col" class="px-6 py-3 text-gray-800">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 text-gray-800">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-gray-800">
                        Geregistreerd op
                    </th>
                    <th scope="col" class="px-6 py-3 text-gray-800">
                        Deactiveren
                    </th>
                    <th scope="col" class="px-6 py-3 text-gray-800">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="bg-white hover:bg-gray-300">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="check" type="checkbox" name="checked[]" wire:model.live.debounce="check" value="" class="w-4 h-4 text-yellow-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="check" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap">
                        {{ $user['name'] }}
                    </th>
                    <td class="px-6 py-4 text-gray-800">
                        {{ $user['email'] }}
                    </td>
                    <td class="px-6 py-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: green;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                    </td>
                    <td class="px-6 py-4">
                        {{ $user['created_at'] }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                            <input type="checkbox" wire:model.live.debounce="" name="block[]" value="" id="" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer">
                            <label for="block" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                        </div>    
                    </td>
                    <td class="px-6 py-4 text-right text-md">
                        <a href="" class="font-semibold text-yellow-600 hover:underline"><i class='bx bxs-edit mr-1'></i>Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  
</div>
