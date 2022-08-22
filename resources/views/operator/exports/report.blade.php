    <div class="py-2">
        <div class="min-w-full border-b border-gray-200 shadow overflow-x-auto">
            <x-admin.grid.table>
                <x-slot name="head">
                    <tr>
                        <x-admin.grid.th>
                            姓名
                        </x-admin.grid.th>

                        @foreach($tasks as $task)
                            <x-admin.grid.th>
                                {{ $task->name }}
                            </x-admin.grid.th>
                        @endforeach
                        <x-admin.grid.th>
                            计分
                        </x-admin.grid.th>
                    </tr>
                </x-slot>
                <x-slot name="body">
                @foreach($usersData as $userData)
                    <tr>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                {{ $userData->user->name }}
                            </div>
                        </x-admin.grid.td>
                        @foreach($userData->taskLogs as $taskLog)
                            <x-admin.grid.td>
                                <div class="text-sm text-gray-900">
                                    {{ $taskLog->eval }}
                                </div>
                            </x-admin.grid.td>
                        @endforeach
                        <x-admin.grid.td>
                                <div class="text-sm text-gray-900">
                                    {{ $userData->count }}
                                </div>
                            </x-admin.grid.td>
                    </tr>
                    @endforeach
                </x-slot>
            </x-admin.grid.table>
        </div>

    </div>