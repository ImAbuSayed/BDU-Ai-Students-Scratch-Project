<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ArticleGenerator extends Component
{
    public $topic;
    public $keyPoints = '';
    public $articleLength = 200; // Default length in words
    public $writingStyle = 'formal'; // Default style
    public $generatedArticle;
    public $isLoading = false;

    protected $rules = [
        'topic' => 'required|min:3',
        'keyPoints' => 'required|string',
        'articleLength' => 'required|integer|min:50|max:1000',
        'writingStyle' => 'required|in:formal,casual,technical',
    ];

    public function generateArticle()
    {
        $this->validate();

        // Set loading state to true
        $this->isLoading = true;

        // Prepare prompt for the API
        $keyPointsText = $this->keyPoints;
        $prompt = "Write an article about '{$this->topic}' in a {$this->writingStyle} style. Include the following key points: {$keyPointsText}. The article should be approximately {$this->articleLength} words.";

        // Send request to OpenAI
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt
                ],
            ],
        ]);

        // Retrieve the generated content
        $this->generatedArticle = $response->json()['choices'][0]['message']['content'] ?? 'No content generated.';

        // Reset loading state
        $this->isLoading = false;
    }

    public function render()
    {
        return view('livewire.article-generator');
    }
}
