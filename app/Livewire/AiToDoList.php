<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use OpenAI;

class AiToDoList extends Component
{
    public $tasks;

    public $newTaskTitle = '';

    public $newTaskDescription = '';

    public $editingTaskId;

    public $editingTaskTitle;

    public $editingTaskDescription;

    public $aiSuggestion = '';

    public $aiSuggestedTitle = '';

    public $aiSuggestedDescription = '';

    public $isLoading = false;

    protected $rules = [
        'newTaskTitle' => 'required|min:3',
        'newTaskDescription' => 'nullable',
    ];

    public function mount()
    {
        $this->tasks = Task::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.ai-to-do-list');
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
        $this->refreshTasks();
    }

    public function toggleComplete($taskId)
    {
        $task = Task::find($taskId);
        $task->is_completed = ! $task->is_completed;
        $task->save();
        $this->refreshTasks();
    }

    public function editTask($taskId)
    {
        $this->editingTaskId = $taskId;
        $task = Task::find($taskId);
        $this->editingTaskTitle = $task->title;
        $this->editingTaskDescription = $task->description;
    }

    public function updateTask()
    {
        $this->validate([
            'editingTaskTitle' => 'required|min:3',
            'editingTaskDescription' => 'nullable',
        ]);

        $task = Task::find($this->editingTaskId);
        $task->title = $this->editingTaskTitle;
        $task->description = $this->editingTaskDescription;
        $task->save();

        $this->editingTaskId = null;
        $this->refreshTasks();
    }

    public function deleteTask($taskId)
    {
        Task::destroy($taskId);
        $this->refreshTasks();
    }

    public function getAiSuggestion()
    {
        $this->isLoading = true;
        $ApiKey = getenv('OPENAI_API_KEY');
        $client = OpenAI::client($ApiKey);

        $existingTasks = $this->tasks->pluck('title')->implode(', ');

        $prompt = '';
        if (! empty($this->newTaskTitle) || ! empty($this->newTaskDescription)) {
            $prompt = "Based on the following input:\nTitle: {$this->newTaskTitle}\nDescription: {$this->newTaskDescription}\n";
            $prompt .= 'Suggest an improved or related task with a title and description.';
        } else {
            $prompt = "Based on these existing tasks: $existingTasks, suggest a new relevant task with a title and description.";
        }

        $response = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful assistant that suggests tasks based on existing ones or input. Provide your response in JSON format with "title" and "description" fields.'],
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        $suggestion = json_decode($response->choices[0]->message->content, true);
        $this->aiSuggestedTitle = $suggestion['title'] ?? '';
        $this->aiSuggestedDescription = $suggestion['description'] ?? '';
        $this->aiSuggestion = "Title: {$this->aiSuggestedTitle}\n\nDescription: {$this->aiSuggestedDescription}";
        $this->isLoading = false;
    }

    public function useAiSuggestion()
    {
        $this->newTaskTitle = $this->aiSuggestedTitle;
        $this->newTaskDescription = $this->aiSuggestedDescription;
        $this->aiSuggestion = '';
        $this->aiSuggestedTitle = '';
        $this->aiSuggestedDescription = '';
    }

    public function improveTaskDescription($taskId)
    {
        $this->isLoading = true;
        $task = Task::find($taskId);

        $ApiKey = getenv('OPENAI_API_KEY');
        $client = OpenAI::client($ApiKey);

        $response = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful assistant that improves task descriptions. Provide your response in JSON format with "title" and "description" fields.'],
                ['role' => 'user', 'content' => "Improve this task title and description:\nTitle: {$task->title}\nDescription: {$task->description}"],
            ],
        ]);

        $improvement = json_decode($response->choices[0]->message->content, true);
        $task->title = $improvement['title'] ?? $task->title;
        $task->description = $improvement['description'] ?? $task->description;
        $task->save();
        $this->refreshTasks();
        $this->isLoading = false;
    }

    public function addAiSuggestion()
    {
        Task::create([
            'title' => $this->aiSuggestedTitle,
            'description' => $this->aiSuggestedDescription,
        ]);

        $this->aiSuggestion = '';
        $this->aiSuggestedTitle = '';
        $this->aiSuggestedDescription = '';
        $this->refreshTasks();
    }

    private function refreshTasks()
    {
        $this->tasks = Task::orderBy('created_at', 'desc')->get();
    }
}
