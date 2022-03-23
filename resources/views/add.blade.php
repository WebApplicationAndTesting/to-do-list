<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline">
            {{ __('ADD NEW TASK') }}
        </h2>
        <div class="hidden sm:flex items-center sm:ml-6 float-right">
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

                        -<x-jet-dropdown-link href="{{ route('profile.show') }}">
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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            
                <form method="POST" action="/task" >
                    <div class="form-dome">
                        <div class="form-group">
                            TASK
                            <input type="text" name="description" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-40 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Action'>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="grid-date-dome data-pad">
                            <div class="form-group">
                                START
                                <!-- <textarea name="date" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Date'></textarea>   -->
                                <input type="date" name="date" value="" placeholder="dd-mm-yyyy" min="1997-01-01" max="2030-12-31" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-12 py-2 px-3 font-medium  focus:outline-none focus:bg-white">
                                @if ($errors->has('date'))
                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                DEADLINE
                                <input type="date" name="deadline" value="" placeholder="DD-MM-YYYY" min="1997-01-01" max="2030-12-31" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-12 py-2 px-3 font-medium  focus:outline-none focus:bg-white">
                                <!-- <textarea name="deadline" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Deadline'></textarea>   -->
                                @if ($errors->has('deadline'))
                                    <span class="text-danger">{{ $errors->first('deadline') }}</span>
                                @endif
                            </div>
                            <div style="align-self: flex-end;" class="form-group">
                                <button type="submit" class="btn-dome1 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded h-12 font-dome1 fontcolor-dome1">CONFIRM</button>
                            </div>
                        </div>
                    </div>

                    
                    {{ csrf_field() }}

                    <!-- <div class="form-group">
                        <textarea name="price" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter price'></textarea>  
                        @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div> -->
                </form>
            </div>
        </div>
    </div>

    <!-- <script>
    $(document).ready(function() {

        $('#shareFB').click(function() {
            alert("wer");
            window.open('https://www.facebook.com/sharer/sharer.php?=');
        });
    })
</script> -->

</x-app-layout>

