<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use OpenAI;

class AiToDoList extends Component
{
    public $task;
    public $newTaskTitle = '';
    public $newTaskDescription = '';
    public $editingTaskID;
    public $editingTaskTitle;
    public $editingTaskDescription;

    public $aiSuggestions = '';

    protected $rules = [
        'newTaskTitle' => 'required',
        'newTaskDescription' => 'required',
    ];

    public function mount()
    {
        $this->task = Task::all();
    }

    public function addTask()
    {
        $this->validate();

        Task::create([
            'title' => $this->newTaskTitle,
            'description' => $this->newTaskDescription,
        ]);

        $this->newTaskTitle = '';
        $this->newTaskDescription = '';

        $this->task = Task::all();

    }

    public function toggleComplete($taskID)
    {
        $task = Task::find($taskID);

        $task->completed = !$task->completed;

        $task->save();

        $this->task = Task::all();
    }

    public function editTask($taskID)
    {
        $this->editingTaskID = $taskID;

        $task = Task::find($taskID);

        $this->editingTaskTitle = $task->title;
        $this->editingTaskDescription = $task->description;

    }

    public function updateTask()
    {
        $this->validate([
            'editingTaskTitle' => 'required',
            'editingTaskDescription' => 'required',
        ]);

        $task = Task::find($this->editingTaskID);

        $task->title = $this->editingTaskTitle;
        $task->description = $this->editingTaskDescription;

        $task->save();

        $this->editingTaskID = null;
        $this->editingTaskTitle = null;
        $this->editingTaskDescription = null;

        $this->task = Task::all();
    }

    public function deleteTask($taskID)
    {
        Task::find($taskID)->delete();
        $this->task = Task::all();
    }

    public function getAiSuggestion()
    {
        $ApiKey = getenv('OPENAI_API_KEY');
        $client = OpenAI::client($ApiKey);

        $existingTasks = $this->tasks->pluck('title')->implode(', ');

        $response = $client->chat->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [

                [
                    'role' => 'system',
                    'content' => "You are a helpful assistant that suggest tasks based on existing ones."
                ],

                [
                    'role' => 'user',
                    'content' => "Based on these existing tasks: $existingTasks, suggest me a new relevent task."
                ],

            ]
        ]);

        $this->aiSuggestions = $response->choices[0]->message->content;
    }

    public function improveTaskDescription($taskID)
    {

    }

    public function render()
    {
        return view('livewire.ai-to-do-list');
    }
}
