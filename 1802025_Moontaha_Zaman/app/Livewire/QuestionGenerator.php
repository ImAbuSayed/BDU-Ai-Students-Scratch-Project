<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class QuestionGenerator extends Component
{
    public $inputText;
    public $questionType;
    public $numQuestions = 1; // Default number of questions
    public $generatedQuestions = [];

    public function generateQuestions()
    {
        $this->generatedQuestions = [];

        if ($this->inputText) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => "Generate {$this->numQuestions} questions of type '{$this->questionType}' based on the following text:\n\n{$this->inputText}"
                    ],
                ],
            ]);

            $result = $response->json();

            // Extract generated questions from the API response
            if (isset($result['choices'][0]['message']['content'])) {
                // Split multiple questions into an array if they are in a single response
                $questions = explode("\n", trim($result['choices'][0]['message']['content']));
                $this->generatedQuestions = array_filter($questions, fn($q) => !empty($q)); // Filter out empty lines
            }
        }
    }

    public function render()
    {
        return view('livewire.question-generator');
    }
}
