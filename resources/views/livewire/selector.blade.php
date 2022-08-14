<div>
    <label for="task_selection" class="{{$errors->has('task_selection') ? 'text-red-400' : ''}} block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">{{ __('请选择任务') }}</label>
    <select id="task_selection" name="task_selection" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="selectTasksId">
        <option value="" selected>请选择任务</option>
        @foreach ($dataset as $data)
            <option value="{{$data->id}}">{{ $data->name }}</option>
        @endforeach
    </select>
</div>
