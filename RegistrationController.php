<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class RegistrationController extends Controller
{
    public function registration()
    {
        return view('registration');
    }

    public function login()
    {
        return view('login');
    }
    public function HODdashboard(){
        return view('HODdashboard');
    }
    public function HRsdashboard(){
        return view('HRsdashboard');
    }
    public function Ldashboard(){
        return view('Ldashboard');
    }
    public function Sdashboard(){
        return view('Sdashboard');
    }

    public function register(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:100|alpha', // Only alphabetic characters
            'lname' => 'required|string|max:100|alpha',
            'email' => 'required|email|unique:registrations,email|max:255',
            'password' => [
                'required',
                'string',
                'min:6',
                'max:12',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,12}$/' // At least one uppercase, one lowercase, one number, and one special character
            ],
            // Ensure roles match the exact string without additional spaces or formatting inconsistencies
            'role' => 'required|string|in:Students,Human Resources(HRs),Head of departments,Lectures'
        ]);

        $register = new Registration();
        $register->fname = $request->fname;
        $register->lname =$request->lname;
        $register->email =$request->email;
        $register->password = Hash::make($request->password);
        $register->role =$request->role;
        $results=$register->save();
        if($results){
            return redirect()->route('login')->with('success', 'You have successfully registered. You can now login.' );
        }
        else{
            return back()->with('failed', 'Something went wrong');
        }
    }
    public function signin(Request $request){
    $request->validate([
        'email'=>'required',
        'password'=>'required|min:6|max:12'
    ]);
    
    $register = registration::where('email', '=', $request->email)->first();

    if ($register) {
        if (Hash::check($request->password, $register->password)) {
            // Store user ID in session
            Session::put('loginsId', $register->id);

            // Redirect based on role
            if ($register->role === 'Students') {
                return redirect()->route('Sdashboard'); // Redirect to Students(S) dashboard
            } 
            elseif($register->role =='Human Resources(HRs)') {
                return redirect()->route('HRsdashboard'); // Redirect to Human Resources(HRs) dashboard
            }
            elseif($register->role =='Head of departments'){
            return redirect()->route('HODdashboard');
        }
            elseif($register->role =='Lectures'){
            return redirect()->route('Ldashboard');
        }
     else {
        return back()->with('fail', 'The email is not registered');
    }     
    }
}
}
}
