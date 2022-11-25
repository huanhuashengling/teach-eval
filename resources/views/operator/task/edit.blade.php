<x-admin.wrapper>
        <x-slot name="title">
        {{ __('任务列表') }}
    </x-slot>

    <x-slot name="breadcrumb">
        {{ __('修改任务') }}
    </x-slot>

    <x-slot name="href">
        {{ __(route('task.index')) }}
    </x-slot>
    <div>
        <x-admin.form.errors />
    </div>

    <div class="w-full py-2 bg-white overflow-hidden">

        <form method="POST" action="{{ route('task.update', $task->id) }}">
        @csrf
        @method('PUT')

            <div class="py-2">
                <x-admin.form.label for="name" class="{{$errors->has('name') ? 'text-red-400' : ''}}">{{ __('任务内容') }}</x-admin.form.label>

                <x-admin.form.input id="name" class="{{$errors->has('name') ? 'border-red-400' : ''}}"
                                type="text"
                                name="name"
                                value="{{ old('name', $task->name) }}"
                                />
            </div>

            <div class="py-2">
                <label for="participant_types_id" class="{{$errors->has('participant_types_id') ? 'text-red-400' : ''}} block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">{{ __('请选择人员类型') }}</label>
                <select id="participant_types_id" name="participant_types_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $task->participant_types_id }}">
                    <option value="" selected>请选择人员类型</option>
                    @foreach ($participantTypes as $participantType)
                        <option value="{{$participantType->id}}" {{( $participantType->id == $task->participant_types_id)?"selected":"" }}>{{ $participantType->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="py-2">
                <label for="task_types_id" class="{{$errors->has('task_types_id') ? 'text-red-400' : ''}} block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">{{ __('选择任务类型') }}</label>
                <select id="task_types_id" name="task_types_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>选择任务类型</option>
                    @foreach ($taskTypes as $taskType)
                        <option value="{{$taskType->id}}" {{( $taskType->id == $task->task_types_id)?"selected":"" }}>{{ $taskType->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="py-2">
                <x-admin.form.label for="happen_at" class="{{$errors->has('happen_at') ? 'text-red-400' : ''}}">{{ __('发生日期') }}</x-admin.form.label>

                <x-admin.form.input id="happen_at" class="{{$errors->has('happen_at') ? 'border-red-400' : ''}}"
                                type="datetime-local"
                                name="happen_at"
                                value="{{ old('happen_at', $task->happen_at) }}"

                                />
            </div>

            <div class="flex justify-end mt-4">
                <x-admin.form.button>{{ __('更新') }}</x-admin.form.button>
            </div>
        </form>
    </div>
</x-admin.wrapper>
