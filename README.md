# BDU AI Students Scratch Project and Assignments

Welcome to the BDU AI Students Scratch Project! This repository is designed to help students learn and practice AI concepts through hands-on projects. Please follow the instructions below to get started with the project and **assignments**.

## Getting Started

Clone project onto your computer: [https://github.com/ImAbuSayed/BDU-Ai-Students-Scratch-Project](https://github.com/ImAbuSayed/BDU-Ai-Students-Scratch-Project)

## AI Todo List Project Structure

This project contains an AI-enhanced Todo List application built with Laravel and Livewire. It demonstrates the integration of OpenAI's GPT model for task suggestions and improvements.

Key files:

- `app/Livewire/AiToDoList.php`: Contains the main logic for the Todo List and AI integration.
- `resources/views/livewire/ai-to-do-list.blade.php`: The view file for the Todo List.
- `app/Models/Task.php`: The Task model.
- `database\migrations\2024_10_17_092958_create_tasks_table.php`: The migration for the Task model.

## AI Todo List Features

- Generate task suggestions (using OpenAI's GPT model) from a input task description and title for a new task otherwise, it will generate a task based on the existing task.
- Add a new task
- Edit an existing task
- Delete a task
- Toggle task completion
- Improve task description by using OpenAI's GPT model.

## Setup Instructions

1. Clone your forked repository:
   ```
   git clone https://github.com/YOUR_USERNAME/BDU-Ai-Students-Scratch-Project.git
   ```
2. Navigate to the project directory:
   ```
   cd BDU-Ai-Students-Scratch-Project
   ```
3. Install dependencies:
   ```
   composer install
   npm install
   ```
4. Copy the `.env.example` file to `.env` and configure your database settings.
5. Generate an application key:
   ```
   php artisan key:generate
   ```
6. Run migrations:
   ```
   php artisan migrate
   ```
7. Add your OpenAI API key to the `.env` file:
   ```
   OPENAI_API_KEY=your_api_key_here
   ```
8. Start the development server:
   ```
   php artisan serve
   ```

## Project Assignments

1. **AI-powered Text Summarizer**
   Assigned to: Bakhtiar Muiz (1801045) and Md. Faishal Ahmed (1801003)

   Description: Create a single-page application that simulates text summarization using predefined rules.

   Features:

   - Input field for users to paste or type long text
   - Option to select summary length (e.g., 3, 5, or 7 sentences)
   - Generate button to create the summary
   - Display area for the summarized text

   Example Use Case:
   A user pastes a long paragraph, and the application extracts the most important sentences based on factors like sentence position and keyword frequency.
2. **AI-based Article Generator**
   Assigned to: Saurav Kundu (1801022) and Tasnim Rahman (1801011)

   Description: Develop a web application that generates simple articles using predefined templates and user inputs.

   Features:

   - Input fields for article topic, key points, and desired length
   - Selection for writing style (e.g., formal, casual, technical)
   - Generate button to create the article
   - Display area for the generated article

   Example Use Case:
   A user enters "Benefits of Exercise" as the topic, lists three key points, and selects a casual style. The application generates a short article by filling in a template with the provided information.
3. **AI-based Recipe Generator**
   Assigned to: Mohammad Armaan (1801046) and MD ABID HASSAN SAJIB (1802007)

   Description: Create an application that generates simple recipes based on user-specified ingredients using a predefined database.

   Features:

   - Input fields for available ingredients (up to 5)
   - Dropdown for cuisine type (e.g., Italian, Indian, Mexican)
   - Generate button to create the recipe
   - Display area for the generated recipe (ingredients list and basic instructions)

   Example Use Case:
   A user inputs "chicken, tomatoes, onions" as ingredients and selects "Italian" cuisine. The application matches these inputs with a simple chicken cacciatore recipe from its database.
4. **AI Text Paraphraser**
   Assigned to: MARIA AFRIN BINDU (1802033) and MOHAMMAD SEFAT KHAN (1802036)

   Description: Build an application that rephrases given text using simple synonym replacement and sentence structure changes.

   Features:

   - Input field for original text
   - Options for paraphrasing level (e.g., light, moderate, heavy)
   - Generate button to create the paraphrased text
   - Display area for the paraphrased version

   Example Use Case:
   A user enters a sentence, and the application replaces some words with synonyms and slightly alters the sentence structure to create a paraphrased version.
5. **AI-powered Question Generator**
   Assigned to: Md. Manjil Hassan (1802011) and Moontaha Zaman (1802025)

   Description: Develop an application that generates simple questions from given text content using keyword extraction and predefined question templates.

   Features:

   - Input field for text content
   - Options for question types (e.g., who, what, when, where, why)
   - Number of questions to generate (1-5)
   - Generate button to create questions
   - Display area for generated questions

   Example Use Case:
   A user pastes a short paragraph about a historical event. The application identifies key information (dates, names, places) and generates relevant questions using templates like "When did [event] occur?"

For all projects:

- Use Laravel for the backend and Blade templates for the frontend.
- Implement proper error handling and input validation.
- Create a user-friendly interface with clear instructions.
- Include a README.md file with setup instructions and usage guidelines.
- Focus on implementing the core functionality without complex AI algorithms.
- Use simple logic, predefined rules, or small databases to simulate AI-like behavior.

Remember to keep the code well-organized and commented. These projects will help BDU students understand the basics of web development and introduce them to concepts that mimic AI functionality, preparing them for more advanced AI integration in the future.

## Submitting Your Assignment

You can submit your assignment using either Git command line or GitHub Desktop. Choose the method you're most comfortable with.

### Using Git Command Line

1. Clone the original repository (if you haven't already):
   ```
   git clone https://github.com/ImAbuSayed/BDU-Ai-Students-Scratch-Project.git
   ```
2. Navigate to the project directory:
   ```
   cd BDU-Ai-Students-Scratch-Project
   ```
3. Create and switch to a new branch with your ID and name:
   ```
   git checkout -b assignment/YOUR_ID_YOUR_NAME
   ```
4. Create a new directory with your ID and name:
   ```
   mkdir YOUR_ID_YOUR_NAME
   ```
5. Add your project files to this directory.
6. Stage your changes:
   ```
   git add .
   ```
7. Commit your changes:
   ```
   git commit -m "Add assignment: YOUR_PROJECT_NAME"
   ```
8. Push your branch to the original repository:
   ```
   git push origin assignment/YOUR_ID_YOUR_NAME
   ```
9. Go to the original repository on GitHub and create a pull request from your branch.

### Using GitHub Desktop

1. Open GitHub Desktop and clone the original repository:

   - Click on "File" > "Clone Repository"
   - Select the "URL" tab
   - Enter: https://github.com/ImAbuSayed/BDU-Ai-Students-Scratch-Project.git
   - Choose where to save the repository locally
   - Click "Clone"
2. Create a new branch:

   - Click on the current branch dropdown (usually says "main" or "master")
   - Click "New Branch"
   - Name it "assignment/YOUR_ID_YOUR_NAME/YOUR_PROJECT_NAME" for example: "assignment/1802033_Sefat_Khan/ai-recipe-generator"
   - Click "Create Branch"
3. Open the repository in your file explorer.
4. Create a new directory with your ID and name, and add your project files to this directory.
5. Back in GitHub Desktop, you should see your changes.
6. Enter a summary and description for your commit.
7. When you're ready to submit your project, Click "Commit to assignment/YOUR_ID_YOUR_NAME/YOUR_PROJECT_NAME" with a commit message of "Complete assignment: YOUR_PROJECT_NAME".
8. Click "Publish branch" to push your changes to GitHub.
9. Click "Create Pull Request" to open the pull request on GitHub.

Make sure to include a README.md file in your project directory explaining how to set up and run your project.

## Project Requirements

For each assignment, students should:

1. Use the OpenAI API to implement the AI functionality.
2. Create a simple web interface using Laravel and Livewire.
3. Implement error handling and input validation.
4. Write clear comments explaining the code.
5. Include a brief explanation of how the AI model is being used in the project.

## Evaluation Criteria

Projects will be evaluated based on:

1. Functionality: Does the project work as intended?
2. Code Quality: Is the code well-organized and easy to read?
3. UI/UX: Is the interface user-friendly and intuitive?
4. Creativity: How well does the project utilize the AI capabilities?
5. Documentation: Is the README clear and comprehensive?

## Need Help?

If you have any questions or need assistance, please open an issue in this repository [https://github.com/ImAbuSayed/BDU-Ai-Students-Scratch-Project/issues](https://github.com/ImAbuSayed/BDU-Ai-Students-Scratch-Project/issues) if applicable. You can also contact me by [Email](mailto:hi@abusayed.com.bd).

Good luck with your projects!
