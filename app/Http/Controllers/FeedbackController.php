<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\View\View;

// Controller for feedbakc view and model
class FeedbackController extends Controller
{
    /**
     * Show the list of all feedback.
     */
    function index(Request $request): View
    {
        $search = $request->input('q');

        $query = Feedback::query();

        if ($search) {
            $query->search($search);
        }

        $request->flash();

        return view('admin.indexFeedbacks', ['feedbacks' => $query->orderByDesc('created_at')->paginate(15)]);
    }

    /**
     * Create the form for new feedback
     */
    function create(): View
    {
        return view('admin.createFeedback');
    }

    /**
     * Store the feedback after validating data.
     */
    function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Feedback::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'content' => $request->input('content'),
            'type' => $request->input('type')
        ]);

        $alert = ['type' => 'success', 'title' => 'Success!', 'message' => 'Feedback Registered Successfully!'];

        return redirect()->route('createFeedback')->with('alert', $alert);
    }

    /**
     * Delete the feedback.
     */
    function delete($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        
        $alert = ['type' => 'info', 'title' => 'Deleted!', 'message' => 'Courier Deleted Successfully!'];
        
        return redirect()->route('indexFeedback')->with('alert', $alert); // Redirect to the courier index page after deletion
    }
    
    /**
     * Create feedback form for customers.
     */
    function createFeedback(): View
    {
        return view('pages.feedback');
    }

    /**
     * Store the feedback by customers.
     */
    function storeFeedback(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Feedback::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'content' => $validatedData['message'],
            'type' => $request->input('type')
        ]);

        $alert = ['type' => 'success', 'title' => 'Success!', 'message' => 'Feedback Registered Successfully!'];

        return back()->with('alert', $alert);
    }
}
