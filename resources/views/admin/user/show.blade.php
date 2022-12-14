<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Users') }}
    </x-slot>
    
    <x-slot name="breadcrumb">
        {{ __('View user') }}
    </x-slot>

    <x-slot name="href">
        {{ __(route('user.index')) }}
    </x-slot>

    <div class="w-full py-2">
        <h3 class="inline-block text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200 py-4 block sm:inline-block flex">User Data</h3>

        <div class="min-w-full border-b border-gray-200 shadow">
            <table class="table-fixed w-full text-sm">
                <tbody class="bg-white dark:bg-slate-800">
                    <tr>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ __('Name') }}</td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ __('Email') }}</td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{$user->email}}</td>
                    </tr>
                    <tr>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ __('Roles') }}</td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">

                        <div class="py-2">
                            <div class="grid grid-cols-4 gap-4">
                                @forelse ($roles as $role)
                                    <div class="col-span-4 sm:col-span-2 md:col-span-2">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="roles[]" value="{{ $role->name }}" {{ in_array($role->id, $userHasRoles) ? 'checked' : '' }} disabled="disabled" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            {{ $role->name }}
                                        </label>
                                    </div>
                                @empty
                                    ----
                                @endforelse
                            </div>
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ __('Created') }}</td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{$user->created_at}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-admin.wrapper>
