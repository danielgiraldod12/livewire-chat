{{--<div>--}}
{{--    <div>--}}
{{--        <input type="submit" wire:click="logout({{Auth::user()->id}})" value="salir">--}}
{{--        <div class='chatbox__user-list'>--}}
{{--            <h1>Users Online</h1>--}}
{{--            @foreach($users as $item)--}}
{{--                <div class='chatbox__user--busy'>--}}
{{--                    <p>{{$item->name}}</p>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <div class="chatbox__messages">--}}
{{--            @foreach($messages as $message)--}}
{{--                <div class="chatbox__messages__user-message">--}}
{{--                    <div class="chatbox__messages__user-message--ind-message">--}}
{{--                        <p class="name">{{$message->name}}</p>--}}
{{--                        <br/>--}}
{{--                        <p class="message">{{$message->message}}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <section>--}}
{{--            <input type="text" class="input" wire:model.defer="inputMessage" placeholder="Type Message">--}}
{{--            <input type="submit" class="submit cursor-pointer" wire:click="sendMessage({{Auth::user()->id}})">--}}
{{--        </section>--}}
{{--    </div>--}}
{{--</div>--}}

<div>
    <div class="flex flex-row h-full w-full overflow-x-hidden" style="width: 100vw;">
        <div class="flex flex-col py-8 pl-6 pr-2 w-64 bg-white flex-shrink-0">
            <div class="flex flex-row items-center justify-center h-12 w-full">
                <div
                    class="flex items-center justify-center rounded-2xl text-indigo-700 bg-indigo-100 h-10 w-10">
                    <svg
                        class="w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                        ></path>
                    </svg>
                </div>
                <div class="ml-2 font-bold text-2xl">QuickChat</div>
            </div>
            <div class="flex flex-col mt-8">
                <h1 class="text-center text-3sm mb-2">Sala N°: {{$room->room_code}}</h1>
                <x-jet-danger-button class="mb-4 w-full h-12" wire:click="logout({{Auth::user()}})">Salir
                </x-jet-danger-button>
                <div class="flex flex-row items-center justify-between text-xs">
                    <span class="font-bold">Active Users</span>
                    <span
                        class="flex items-center justify-center bg-gray-300 h-5 w-5 rounded-full"
                    >{{$users->count()}}</span>
                </div>
                <div class="flex flex-col space-y-1 mt-4 -mx-2 h-48 overflow-y-auto">
                    @foreach($users as $item)
                        @if($item->state == 1)
                            @if($item->id == Auth::user()->id)
                                <div
                                    class="flex flex-row items-center bg-blue-100 hover:bg-blue-200 rounded-xl p-2">
                                    <div
                                        class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                                        {{strtoupper($item->name[0])}}
                                    </div>
                                    <div class="ml-2 text-sm font-semibold">{{$item->name}}</div>
                                </div>
                            @else
                                <div
                                    class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2">
                                    <div
                                        class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                                        {{strtoupper($item->name[0])}}
                                    </div>
                                    <div class="ml-2 text-sm font-semibold">{{$item->name}}</div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex flex-col flex-auto h-full p-6" id="divChat">
            <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full p-4">
                <div class="flex flex-col h-full overflow-x-auto mb-4">
                    <div class="flex flex-col h-full">
                        <div class="grid grid-cols-12 gap-y-2">
                            @foreach($messages as $message)
                                @if($message->statusMessage == 1)
                                    @if($message->type == 1)
                                        @if($message->userId == Auth::user()->id)
                                            <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                                <div class="flex items-center justify-start flex-row-reverse">
                                                    <div
                                                        class="flex items-center justify-center mt-6 h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                                                    >
                                                        {{strtoupper($message->name[0])}}
                                                    </div>

                                                    <div class="block">
                                                        <h1 class="text-right text-sm mr-4 mb-1">{{$message->name}}</h1>

                                                        <div class="flex">
                                                            <div class="relative mr-3 mt-2" x-data="{open: false}">
                                                                <button x-on:click="open = !open"
                                                                        class="focus:outline-none text-gray-700 ml-2 px-1 hover:bg-gray-300 rounded-xl shadow">
                                                                    <i class="fas fa-ellipsis-v text-gray-500 hover:text-gray-600"></i>
                                                                </button>
                                                                <!-- Dropdown Body -->
                                                                <div x-on:click.away="open = false"
                                                                     class="rounded absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl"
                                                                     x-show="open">
                                                                    <a
                                                                        x-on:click="open = false"
                                                                        wire:click="DeleteMessageForMe({{$message}})"
                                                                        class="cursor-pointer
                                                                    transition-colors duration-200 block px-3 py-1 text-sm text-gray-900 rounded hover:bg-indigo-200">
                                                                        Eliminar para mi</a>
                                                                    <a
                                                                        x-on:click="open = false"
                                                                        wire:click="DeleteMessageForBoth({{$message}})"
                                                                        class="cursor-pointer
                                                                    transition-colors duration-200 block px-3 py-1 text-sm text-gray-900 rounded hover:bg-indigo-200">
                                                                        Eliminar para todos</a>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="relative mr-3 text-3sm bg-indigo-100 py-2 px-4 shadow rounded-xl flex">
                                                                <div class="text-right col-span-1">
                                                                    {{$message->message}}
                                                                </div>
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                                <div class="flex flex-row items-center">
                                                    <div
                                                        class="flex items-center justify-center h-10 w-10 rounded-full mt-6 bg-indigo-500 flex-shrink-0"
                                                    >
                                                        {{strtoupper($message->name[0])}}
                                                    </div>
                                                    <div class="block">
                                                        <h1 class="text-left text-sm mb-1 ml-4 ">{{$message->name}}</h1>
                                                        <div class="ml-3 bg-white py-2 px-4 shadow rounded-xl">
                                                            <h1 class="">{{$message->message}}</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @elseif($message->type == 3 && $message->id_user == null)
                                        <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                            <div class="flex flex-row items-center">
                                                <div
                                                    class="relative ml-3 bg-red-200 py-2 px-4 shadow rounded-xl ">
                                                    <div>{{$message->message}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                            <div class="flex flex-row items-center">
                                                <div
                                                    class="relative ml-3 bg-green-200 py-2 px-4 shadow rounded-xl ">
                                                    <div>{{$message->message}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @elseif($message->statusMessage == 2 && $message->userId == Auth::user()->id)
                                    <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                        <div class="flex items-center justify-start flex-row-reverse">
                                            <div
                                                class="flex items-center justify-center mt-6 h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                                            >
                                                {{strtoupper($message->name[0])}}
                                            </div>
                                            <div class="block">
                                                <h1 class="text-right text-sm mr-4 mb-1">{{$message->name}}</h1>
                                                <div
                                                    class="relative mr-3 text-3sm bg-indigo-100 py-2 px-4 shadow rounded-xl flex">
                                                    <div class="text-right col-span-1">
                                                        <h1 class="text-gray-600 italic">Has eliminado este mensaje...</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($message->statusMessage == 3 && $message->userId == Auth::user()->id)
                                    <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                        <div class="flex items-center justify-start flex-row-reverse">
                                            <div
                                                class="flex items-center justify-center mt-6 h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                                            >
                                                {{strtoupper($message->name[0])}}
                                            </div>
                                            <div class="block">
                                                <h1 class="text-right text-sm mr-4 mb-1">{{$message->name}}</h1>
                                                <div
                                                    class="relative mr-3 text-3sm bg-indigo-100 py-2 px-4 shadow rounded-xl flex">
                                                    <div class="text-right col-span-1">
                                                        <h1 class="text-gray-600 italic">Este mensaje ha sido eliminado...</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($message->statusMessage == 3 && $message->userId != Auth::user()->id)
                                    <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                        <div class="flex flex-row items-center">
                                            <div
                                                class="flex items-center justify-center h-10 w-10 rounded-full mt-6 bg-indigo-500 flex-shrink-0"
                                            >
                                                {{strtoupper($message->name[0])}}
                                            </div>
                                            <div class="block">
                                                <h1 class="text-left text-sm mb-1 ml-4 ">{{$message->name}}</h1>
                                                <div class="ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                                    <h1 class="text-gray-600 italic">Este mensaje ha sido eliminado...</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($message->statusMessage == 2 && $message->userId != Auth::user()->id)
                                    <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                        <div class="flex flex-row items-center">
                                            <div
                                                class="flex items-center justify-center h-10 w-10 rounded-full mt-6 bg-indigo-500 flex-shrink-0"
                                            >
                                                {{strtoupper($message->name[0])}}
                                            </div>
                                            <div class="block">
                                                <h1 class="text-left text-sm mb-1 ml-4 ">{{$message->name}}</h1>
                                                <div class="ml-3 bg-white py-2 px-4 shadow rounded-xl">
                                                    <h1 class="">{{$message->message}}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                                    <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                    </div>
                        </div>
                    </div>
                </div>
                <form action="" wire:submit.prevent="sendMessage({{Auth::user()->id}})">
                    <div class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4">
                        <div>
                            <button
                                class="flex items-center justify-center text-gray-400 hover:text-gray-600">
                            </button>
                        </div>
                        <div class="flex-grow ml-4">
                            <div class="relative w-full">
                                <input autocomplete="off" id="message" wire:model="inputMessage"
                                       type="text"
                                       class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10"/>
                            </div>
                        </div>
                        <div class="ml-4">

                            <button id="send" type="submit"
                                    class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                                <span>Send</span>
                                <span class="ml-2">
                  <svg
                      class="w-4 h-4 transform rotate-45 -mt-px"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                  </svg>
                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>


</div>
