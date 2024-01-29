

<div class="h-16 lg:flex w-full border-b border-gray-200 dark:border-gray-800 hidden px-10">
    <div class="flex h-full text-gray-600 dark:text-gray-400">
      <a href="#"
        class="cursor-pointer h-full border-b-2 border-transparent inline-flex items-center mr-8">Company</a>
      <a href="{{route('users.index')}}"
        class="cursor-pointer h-full border-b-2 border-blue-500 text-blue-500 dark:text-white dark:border-white inline-flex mr-8 items-center">Users</a>
      <a href="{{route('dailycosts.index')}}" class="cursor-pointer h-full border-b-2 border-transparent inline-flex items-center mr-8">Daily Cost</a>
      <a href="#" class="cursor-pointer h-full border-b-2 border-transparent inline-flex items-center">Currency
        Exchange</a>
    </div>
    <div class="ml-auto flex items-center space-x-7">
      <a href="{{route('dailycosts.create')}}">
        <button class="h-8 px-3 rounded-md shadow text-white bg-blue-500">Create</button>
      </a>

      <button class="flex items-center relative" onclick="document.getElementById('modal').classList.toggle('hidden');">
        <span class="relative flex-shrink-0">
          <img class="w-7 h-7 rounded-full"
            src="https://images.unsplash.com/photo-1521587765099-8835e7201186?ixlib=rb-1.2.1&q=80&fm=jpg&crop=faces&fit=crop&h=200&w=200&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
            alt="profile" />
          <span
            class="absolute right-0 -mb-0.5 bottom-0 w-2 h-2 rounded-full bg-green-500 border border-white dark:border-gray-900"></span>
        </span>
        <span class="ml-2">{{Auth::user()->name}}</span>
        <svg viewBox="0 0 24 24" class="w-4 ml-1 flex-shrink-0" stroke="currentColor" stroke-width="2" fill="none"
          stroke-linecap="round" stroke-linejoin="round">
          <polyline points="6 9 12 15 18 9"></polyline>
        </svg>

      </button>

     
      

    </div>


    <div id="modal" class="w-52 bg-[#1b263b] rounded-lg absolute right-10 top-14 z-10 hidden">
      <ul class="p-2">
        <li class="hover:bg-[#0d1b2a] transition duration-200 "><a href="{{route('profile.edit')}}" class="flex justify-start items-center p-3 space-x-3 ">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
        </svg>
        <span>Profile</span>
      </a></li>
        <li class="border-b border-b-[#415a77] hover:bg-[#0d1b2a] transition duration-200 "><a href="" class="flex justify-start items-center p-3 space-x-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
          </svg> 
          <span> Setting</span>
        </a></li>
        <li class="hover:bg-[#0d1b2a] transition duration-200 mt-2"><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex justify-start items-center p-3 space-x-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V6.75a4.5 4.5 0 1 1 9 0v3.75M3.75 21.75h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H3.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
          </svg>
          <span>Log out</span>            
        </a></li>
      </ul>
      <form  id="logout-form" action="{{route('logout')}}" method="POST" hidden>    
        @csrf
      </form>
    </div>
    
</div>


