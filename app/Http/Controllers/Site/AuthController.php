<?php

namespace App\Http\Controllers\site;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\UserResetPassword;
use App\Models\User;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function getLogin(){
        return view('site.auth.login');
    }

    public function postLogin(LoginRequest $request){

        if (auth()->attempt(['email' => request('email'), 'password' => request('password')])) {
            return redirect('/');
        } else {
            session()->flash('error', 'incorrect information login');
            return redirect(url('login'));
        }

    }

    public function getRegister(){
        return view('site.auth.register');
    }

    public function postRegister(RegisterRequest $request){

        try{
            DB::beginTransaction();

            $data = $request->except('password_confirmation');
            $data['password'] =bcrypt($request->password);
            User::create($data);

            DB::commit();
            return redirect(url('login'))->with(['success' => 'create account successfully']);
        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->back()->with(['error'=>' there is a problem please try again later']);

        }
    }

    public function forgotPassword(){
        return view('site.auth.forgotPassword');
    }

    public function forgotPasswordPost(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email )->first();
        if (!empty($user)) {
            $token = app('auth.password.broker')->createToken($user);
            $data = DB::table('password_resets')->insert([
                        'email' => $user->email,
                        'token' => $token,
                        'created_at' => Carbon::now()
            ]);

            Mail::to($user->email)->send(new UserResetPassword(['data' => $user, 'token' => $token]));
            session()->flash('success', 'check your inbox');
            return back();
        }
        return back();
    }

    public function reset_password ($token)
    {

        $check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
        if (!empty($check_token)) {
            return view('site.auth.resetPassword', compact('check_token'));
        } else {
            return redirect(url('forgotPassword'));
        }

    }

    public function reset_password_post ($token)
    {
        $this->validate(request(), [
            'password' => 'required|confirmed',
        ]);

        $check_token = DB::table('password_resets')->where('token', $token)
            ->where('created_at', '>', Carbon::now()->subHours(2))->first();

        if (!empty($check_token)) {

            $user = User::where('email', $check_token->email)->update([
                'email' => $check_token->email,
                'password' => bcrypt(request('password'))
            ]);
            DB::table('password_resets')->where('email', request('email'))->delete();
            auth()->attempt(['email' => $check_token->email, 'password' => request('password')], true);
            return redirect(url('/'));
        } else {
            return redirect(url('forgotPassword'));
        }
    }
}
