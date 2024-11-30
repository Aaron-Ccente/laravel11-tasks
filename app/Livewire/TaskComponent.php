<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskComponent extends Component
{
    public $tasks;
    public $title;
    public $description;
    public $titleUpdate;
    public $descriptionUpdate;
    public $taskId; // Variable para almacenar el ID de la tarea a editar
    public $modal = false;
    public $modalUpdate = false;

    public function mount()
    {
        // Cargar todas las tareas del usuario autenticado
        $this->tasks = Task::where('user_id', Auth::user()->id)->get();
    }

    public function render()
    {
        return view('livewire.task-component');
    }

    private function clearFields()
    {
        $this->title = '';
        $this->description = '';
    }

    public function openCreateModal()
    {
        $this->clearFields();
        $this->modal = true;
    }

    public function closeCreateModal()
    {
        $this->modal = false;
        $this->clearFields();
    }

    public function createTask()
    {
        $newTask = new Task();
        $newTask->title = $this->title;
        $newTask->description = $this->description;
        $newTask->user_id = Auth::user()->id;
        $newTask->save();

        // Limpiar campos y cerrar el modal
        $this->clearFields();
        $this->modal = false;

        // Recargar la lista de tareas
        $this->tasks = Task::where('user_id', Auth::user()->id)->get();
    }

    public function openUpdateModal($taskId)
    {
        // Buscar la tarea seleccionada
        $task = Task::find($taskId);

        if ($task) {
            $this->taskId = $task->id; // Guardar el ID de la tarea a editar
            $this->titleUpdate = $task->title;
            $this->descriptionUpdate = $task->description;
            $this->modalUpdate = true;
        }
    }

    public function closeUpdateModal()
    {
        $this->modalUpdate = false;
        $this->clearFields();
    }

    public function updateTask()
    {
        // Buscar la tarea por ID y actualizarla
        $task = Task::find($this->taskId);

        if ($task) {
            $task->title = $this->titleUpdate;
            $task->description = $this->descriptionUpdate;
            $task->save();

            // Recargar la lista de tareas
            $this->tasks = Task::where('user_id', Auth::user()->id)->get();

            // Cerrar el modal y limpiar los campos
            $this->modalUpdate = false;
            $this->clearFields();
        }
    }
    public function deleteTask($taskId){
        Task::find($taskId)->delete();
        $this->tasks = Task::where('user_id', Auth::user()->id)->get();
    }
}
