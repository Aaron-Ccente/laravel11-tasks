

<div class="px-20 pb-16 relative overflow-x-auto shadow-md sm:rounded-lg">

    <button class="mt-3 w-42 bg-green-800 text-white px-4 py-2 rounded-md hover:bg-green-700 mb-5"
    wire:click = "openCreateModal">Agregar Tarea</button>

    <table class="text-center w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-gray-700 uppercase bg-purple-50 dark:bg-purple-700 dark:text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Título
                </th>
                <th scope="col" class="px-6 py-3">
                    Descripción
                </th>
                <th scope="col" class="px-6 py-3 w-2/5">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$task->title}}
                </th>
                <td class="px-6 py-4 text-left">
                    {{$task->description}}
                </td>
                <td class="px-6 py-4">
                    <button class="w-32 bg-yellow-800 text-white px-4 py-2 rounded-md hover:bg-yellow-700"
                        wire:click.prevent = "openUpdateModal({{ $task->id }})">Editar</button>
                    <button class="w-32 bg-red-800 text-white px-4 py-2 rounded-md hover:bg-red-700"
                        wire:click.prevent = "deleteTask({{ $task->id }})">Borrar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if ($modal)
     
    <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
        <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
        <div class="w-full">
            <div class="m-8 my-20 max-w-[400px] mx-auto">
            <div>
                <h1 class="mb-4 text-3xl font-extrabold">Crear nueva tarea</h1>
                
                <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Name</label>
                        <input type="text" name="title" id="title" wire:model="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Name of task" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Description</label>
                        <input type="text" name="description" id="description" wire:model="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Description of task" required="">
                    </div>
                </div>
                </form>
            </div>
            <div class="flex flex-row">
                <button class="p-3 bg-black rounded-full text-white w-full font-semibold"
                        wire:click.prevent = "createTask">Crear tarea</button>
                <button class="p-3 bg-white border rounded-full w-full font-semibold"
                        wire:click.prevent = "closeCreateModal">Cancelar</button>
            </div>
            </div>
        </div>
        </div>
    </div>
    @endif

    @if ($modalUpdate)
     
     <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
         <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
         <div class="w-full">
             <div class="m-8 my-20 max-w-[400px] mx-auto">
             <div>
                 <h1 class="mb-4 text-3xl font-extrabold">Actualizar tarea</h1>
                 
                 <form class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Name</label>
                    <input type="text" 
                            name="title" 
                            id="title" 
                            wire:model="titleUpdate" 
                            value="{{ $titleUpdate }}" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                            required>
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Description</label>
                            <input type="text" 
                            name="description" 
                            id="description" 
                            wire:model="descriptionUpdate" 
                            value="{{ $descriptionUpdate }}" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                            required>
                    </div>
                    </div>
                </form>

             </div>
             <div class="flex flex-row">
                 <button class="p-3 bg-black rounded-full text-white w-full font-semibold"
                         wire:click.prevent = "updateTask">Actualizar</button>
                 <button class="p-3 bg-white border rounded-full w-full font-semibold"
                         wire:click.prevent = "closeUpdateModal">Cancelar</button>
             </div>
             </div>
         </div>
         </div>
     </div>
     @endif
</div>

