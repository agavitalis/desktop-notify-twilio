<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;


class PostController extends Controller
{
  /**
   * Saves a new post to the database
  */

  public function savePost(Request $request) {

    if($request->isMethod('GET')){
        return view('publish');
    }

    $data = $request->only(['title', 'body']);
    $post = Post::create($data);

    event(new \App\Events\PostCreated($post));

    //send SMS
    $accountSid = config('services.twilio')['TWILIO_ACCOUNT_SID'];
    $authToken = config('services.twilio')['TWILIO_AUTH_TOKEN'];
    $twilioPhoneNumber = config('services.twilio')['TWILIO_PHONE_NUMBER'];
    $client = new Client($accountSid, $authToken);

    try{
        // Use the client to do fun stuff like send text messages!
        $client->messages->create(
            // the number you'd like to send the message to
            $request->phone,
            array(
              // A Twilio phone number assigned  at twilio.com/console
              'from' => $twilioPhoneNumber,
              // the body of the text message you'd like to send
              'body' => 'Hey! A new post was just created',
          )
      );
      } catch (Exception $e) {
          echo "Error: " . $e->getMessage();
      }

      return redirect('/')->with('success', 'Your post just got published and user notified!');

  }

   /**
   * Fetchs all Post in the database
   */
  public function getPosts() {

    $posts = Post::all();
    return view('welcome', compact('posts'));

  }


}