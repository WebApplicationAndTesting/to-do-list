<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight fontsize-dome31 inline">
            {{ __('MY TASK LIST') }}
            
        </h2>
        <div class="hidden sm:flex sm:items-center sm:ml-6 float-right">
            <x-jet-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button class="flex text-sm border-2 border-color-d1 rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                    @else
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    @endif
                </x-slot>

                <x-slot name="content">
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Account') }}
                    </div>

                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </x-jet-dropdown-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-jet-dropdown-link>
                    @endif

                    <div class="border-t border-gray-100"></div>

                    <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                            {{ __('Team Settings') }}
                        </x-jet-dropdown-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                {{ __('Create New Team') }}
                            </x-jet-dropdown-link>
                        @endcan

                        <div class="border-t border-gray-100"></div>

                        <!-- Team Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-jet-switchable-team :team="$team" />
                        @endforeach

                        <div class="border-t border-gray-100"></div>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-dropdown-link>
                    </form>
                </x-slot>
            </x-jet-dropdown>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-7">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-7">
                    
                    <table class="w-full text-md rounded mb-4">
                        <thead>
                            <tr class="border-b fontsize-dome30">
                                <th class="text-left p-3 px-5">Task</th>
                                <th class="text-left p-3 px-5">Date</th>
                                <th class="text-left p-3 px-5">Deadline</th>
                                <th class="text-left p-3 px-5"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach(auth()->user()->tasks as $task)
                            <tr class="border-b hover:bg-orange-100 font-dome1">
                                <td class="text-left p-3 px-5">
                                    {{$task->description}}
                                </td>
                                <td class="text-left p-3 px-5">
                                    {{$task->date}}
                                </td>
                                <!-- <td>
                                    {{$task->time}}
                                </td> -->
                                <td class="text-left p-3 px-5">
                                    {{$task->deadline}}
                                </td>
                                <td class="p-3 px-5 font-dome1">
                                    <form action="/task/{{$task->id}}" class="inline-block">
                                        <button type="submit" name="delete" formmethod="POST" class="text-sm btn-dome1 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Done</button>
                                        {{ csrf_field() }}
                                    </form>
                                    <a href="/task/{{$task->id}}" name="edit" class="mr-3 text-sm btn-dome2 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                    
                </div>
                <div class="flex justify-center"> 
                    <div class="text-right mt-2">
                        <a href="/task" class="btn-dome3 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-3xl">ADD NEW TASK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
