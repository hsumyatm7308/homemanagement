<script src="https://cdn.tailwindcss.com"></script>


<div
class="xl:w-72 w-48 flex-shrink-0 border-r border-gray-200 dark:border-gray-800 h-full overflow-y-auto lg:block hidden p-5">
<div class="text-xs text-gray-400 tracking-wider">USERS</div>
<div class="relative mt-2">
  <input type="text"
    class="pl-8 h-9 bg-transparent border border-gray-300 dark:border-gray-700 dark:text-white w-full rounded-md text-sm"
    placeholder="Search" />
  <svg viewBox="0 0 24 24"
    class="w-4 absolute text-gray-400 top-1/2 transform translate-x-0.5 -translate-y-1/2 left-2"
    stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
    <circle cx="11" cy="11" r="8"></circle>
    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
  </svg>
</div>
<div class="space-y-4 mt-3">

  @foreach($users as $user)
  <button class="bg-white p-3 w-full flex flex-col rounded-md dark:bg-gray-800 shadow">
    <a href="">
      <div class="flex xl:flex-row flex-col items-center font-medium text-gray-900 dark:text-white pb-2 mb-2 xl:border-b border-gray-200 border-opacity-75 dark:border-gray-700 w-full">
        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-0.3.5&q=80&fm=jpg&crop=faces&fit=crop&h=200&w=200&s=046c29138c1335ef8edee7daf521ba50" class="w-7 h-7 mr-2 rounded-full" alt="profile" />
        <span>{{$user->name}}</span>
    </div>
    <div class="flex items-center w-full">
        <div class="text-xs py-1 px-2 leading-none dark:bg-gray-900 bg-blue-100 text-blue-500 rounded-md">Design</div>
        <div class="ml-auto text-xs text-gray-500">$1,902.00</div>
    </div>
    </a>
  </button>
@endforeach


</div>
</div>
