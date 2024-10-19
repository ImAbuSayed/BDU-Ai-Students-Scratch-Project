<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-xl">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">AI-Enhanced Todo List</h1>

    <form wire:submit.prevent="addTask" class="mb-8">
        <div class="flex flex-col space-y-4">
            <input type="text" wire:model="newTaskTitle" placeholder="Add a new task" class="border border-gray-300 p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <textarea wire:model="newTaskDescription" placeholder="Task description (optional)" class="border border-gray-300 p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 h-24"></textarea>
            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out flex-1">Add Task</button>
                <button type="button" wire:click="getAiSuggestion" class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-300 ease-in-out flex-1 flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    Get AI Suggestion
                </button>
            </div>
        </div>
    </form>

    @if($isLoading)
        <div class="flex justify-center items-center mb-8">
            <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-blue-500"></div>
        </div>
    @endif

    @if($aiSuggestion)
        <div class="bg-yellow-100 p-4 mb-8 rounded-md">
            <h3 class="font-bold text-lg mb-2">AI Suggestion:</h3>
            <p class="text-gray-700 mb-2"><strong>Title:</strong> {{ $aiSuggestedTitle }}</p>
            <p class="text-gray-700"><strong>Description:</strong> {{ $aiSuggestedDescription }}</p>
            <div class="flex space-x-4 mt-4">
                <button wire:click="addAiSuggestion" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out flex-1">Add This Task</button>
                <button wire:click="useAiSuggestion" class="bg-purple-500 text-white px-4 py-2 rounded-md hover:bg-purple-600 transition duration-300 ease-in-out flex-1">Use as Input</button>
            </div>
        </div>
    @endif

    <ul class="space-y-4">
        @foreach($tasks as $task)
            <li class="bg-gray-50 p-6 rounded-lg shadow-md transition duration-300 ease-in-out hover:shadow-lg">
                @if($editingTaskId === $task->id)
                    <input type="text" wire:model="editingTaskTitle" class="border border-gray-300 p-2 mb-2 w-full rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <textarea wire:model="editingTaskDescription" class="border border-gray-300 p-2 mb-2 w-full rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 h-24"></textarea>
                    <button wire:click="updateTask" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">Save</button>
                @else
                    <h3 class="font-bold text-xl mb-2 {{ $task->is_completed ? 'line-through text-gray-500' : 'text-gray-800' }}">{{ $task->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ $task->description }}</p>
                    <div class="flex flex-wrap gap-2">
                        <button wire:click="toggleComplete({{ $task->id }})" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-300 ease-in-out">
                            {{ $task->is_completed ? 'Undo' : 'Complete' }}
                        </button>
                        <button wire:click="editTask({{ $task->id }})" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-300 ease-in-out">Edit</button>
                        <button wire:click="deleteTask({{ $task->id }})" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300 ease-in-out">Delete</button>
                        <button wire:click="improveTaskDescription({{ $task->id }})" class="bg-purple-500 text-white px-4 py-2 rounded-md hover:bg-purple-600 transition duration-300 ease-in-out">Improve Description</button>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
</div>
