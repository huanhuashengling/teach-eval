<div>
    @if(isset($userData))
    <label for="participator_user_list" class="{{$errors->has('participator_user_list') ? 'text-red-400' : ''}} block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" >{{ __('选择完成任务的名单') }}</label>
        <div class="grid grid-cols-3 sm:grid-cols-3 gap-1 md:grid-cols-8 lg:grid-cols-10">
        @foreach ($userData as $user)
            <livewire:person :user="$user" :key="time().$user->id" :tasksId="$tasksId" />
        @endforeach
        </div>
        <div class="flex justify-end mt-4">
            <button type="button" wire:click="triggerReverseSelect" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">反选</button>
            <button type="button" wire:click="triggerAllSelect" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">全选</button>
            <button type="button" wire:click="triggerUnSelect" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">取消选择</button>
            <!-- <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">{{ __('登记') }}</button> -->
        </div>
        @endif
</div>
