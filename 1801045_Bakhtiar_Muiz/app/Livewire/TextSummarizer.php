<?php

namespace App\Livewire;

use Livewire\Component;
use OpenAI;

class TextSummarizer extends Component
{
    public $inputText;
    public $summaryLength = 3; // Default to 3 sentences
    public $summarizedText;

    public function generateSummary()
    {
        $ApiKey = env('OPENAI_API_KEY'); // Make sure your API key is set in the .env file
        $client = OpenAI::client($ApiKey); // Create a client instance

        // Continue with the request as previously described
        $response = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => "Summarize the following text in {$this->summaryLength} sentences:\n\n{$this->inputText}"
                ],
            ],
        ]);

        $this->summarizedText = $response->choices[0]->message->content;
    }

    public function render()
    {
        return view('livewire.text-summarizer'); // Bypass layout
    }
}
