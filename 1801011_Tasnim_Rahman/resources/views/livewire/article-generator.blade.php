<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-xl">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">AI Article Generator</h1>

    <!-- Form to generate article -->
    <form wire:submit.prevent="generateArticle" class="mb-8">
        <div class="flex flex-col space-y-4">
            <input 
                type="text" 
                wire:model="topic" 
                placeholder="Article Topic" 
                class="border border-gray-300 p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            />

            <textarea 
                wire:model="keyPoints" 
                placeholder="Key Points (separated by commas)" 
                class="border border-gray-300 p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 h-40"
            ></textarea>

            <select 
                wire:model="writingStyle" 
                class="border border-gray-300 p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="formal">Formal</option>
                <option value="casual">Casual</option>
                <option value="technical">Technical</option>
            </select>

            <!-- Button to trigger article generation -->
            <button 
                type="submit" 
                class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out"
            >
                Generate Article
            </button>

            <!-- Loading spinner that shows during processing -->
            <div wire:loading class="flex justify-center items-center mt-4">
                <svg class="animate-spin h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291l-3.577 3.576A8.015 8.015 0 014 12H0c0 3.283 1.28 6.253 3.39 8.485L6 17.292z"></path>
                </svg>
                <span class="ml-2 text-blue-500">Generating article, please wait...</span>
            </div>
        </div>
    </form>

    <!-- Display the generated article -->
    @if($generatedArticle)
        <div class="bg-yellow-100 p-4 mb-8 rounded-md">
            <h3 class="font-bold text-lg mb-2">Generated Article:</h3>
            <p class="text-gray-700">{{ $generatedArticle }}</p>
        </div>
    @endif
</div>
