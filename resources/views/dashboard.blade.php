<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl text-purple-800">Bienvenido al gestor de tareas</h1>
                    <!-- @foreach ($tasks as $task)
                        <p class="mt-4 text-lg text-purple-800">
                            {{ $task->title }}  
                        <p>
                            {{ $task->description }}
                        </p>
                    @endforeach -->
                </div>
                @livewire('task-component', ['tasks' => $tasks])
            </div>
        </div>
    </div>
</x-app-layout>
