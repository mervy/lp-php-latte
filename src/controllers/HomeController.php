<?php


namespace LPWithLatte\controllers;

use Exception;
use LPWithLatte\library\View;
use LPWithLatte\library\SendEmail;
use LPWithLatte\library\Validator;

class HomeController
{

    /**
     * Render the 'home.latte' view.
     *
     * This function is the action for the 'index' route and is responsible for rendering the
     * 'home.latte' view. This view is the main view of the landing page.
     *
     * @return void
     */
    public function index()
    {
        // Render the 'home.latte' view
        View::render('home.latte');
    }

    /**
     * Process the form submission and send the email.
     *
     * This function is the action for the 'send' route and is responsible for processing the form
     * submission and sending the email to the specified recipient.
     *
     * @return void
     * @throws Exception if there is an error sending the email
     */
    public function send()
    {
        // Create a new instance of the Validator class
        $validator = new Validator();

        // Sanitize the $_POST data
        $data = $validator->sanitize($_POST);

        // Define the validation rules for the form fields
        $rules = [
            'name' => 'required', // Name field is required
            'email' => 'required|email', // Email field is required and must be a valid email
            'message' => 'required' // Message field is required
        ];

        // Validate the data against the defined rules
        if (!$validator->validate($data, $rules)) {
            // If the validation fails, return the validation errors as a JSON response
            echo json_encode(['errors' => $validator->getErrors()]);
            return;
        }

        // Create a new instance of the SendEmail class
        $email = new SendEmail(
            $data['email'], // recipient email address
            'Contato do site', // email subject
            $data['message'], // email body
            'From ' . $data['email'] // email headers
        );

        try {
            // Send the email
            $email->send();

            // Return a success message as a JSON response
            echo json_encode(['success' => 'Obrigado pelo contato. Em breve retornaremos.']);
        } catch (Exception $e) {
            // If there is an error sending the email, return an error message as a JSON response
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}