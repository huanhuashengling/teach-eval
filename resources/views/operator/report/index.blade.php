<x-wrapper>
    <x-slot name="title1">
        {{ __('教师任务') }}
    </x-slot>

    <x-slot name="title2">
        {{ __('党员任务') }}
    </x-slot>

    <x-slot name="participantTypesId">
        {{ __($participantTypesId) }}
    </x-slot>

    <x-slot name="startDate">
        {{ __($startDate) }}
    </x-slot>

    <x-slot name="endDate">
        {{ __($endDate) }}
    </x-slot>

    <div class="py-2">
        <div class="min-w-full border-b border-gray-200 shadow overflow-x-auto">
            <x-admin.grid.table>
                <x-slot name="head">
                    <tr>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => '姓名', 'attribute' => 'name'])
                        </x-admin.grid.th>

                        @foreach($tasks as $task)
                            <x-admin.grid.th>
                                @include('admin.includes.sort-link', ['label' => $task->name, 'attribute' => 'eval'])
                            </x-admin.grid.th>
                        @endforeach
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => '计分', 'attribute' => 'participant_types_id'])
                        </x-admin.grid.th>
                    </tr>
                </x-slot>
                <x-slot name="body">
                @foreach($usersData as $userData)
                @php
                    $count = 0;
                @endphp
                    <tr>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                {{ $userData->user->name }}
                            </div>
                        </x-admin.grid.td>
                        @foreach($userData->taskLogs as $taskLog)
                            @php
                                $count += $taskLog->eval;
                            @endphp
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
</x-wrapper>
